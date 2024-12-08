<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Classroom;
use App\Models\ClassroomStudent;
use App\Models\ClassroomSubject;
use App\Models\ExamClassroom;
use App\Models\StudentScore;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $exams = Exam::paginate(5);
        $totalExams = Exam::count();
        $utsCount = Exam::where("type", "uts")->count();
        $uasCount = Exam::where("type", "uas")->count();
        return view("dashboard.admin.exams.index", compact(
            "exams",
            "totalExams",
            "utsCount",
            "uasCount",
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $subjects = Subject::all();

        return view("dashboard.admin.exams.create", compact("subjects"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        //

        $request->validated();

        try {
            Exam::create($request->all());

            return redirect()->route("exams.index")->with("success", "Berhasil menambahkan data ujian");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Gagal menambahkan data ujian: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
        return view("dashboard.admin.exams.show", compact("exam"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
        $subjects = Subject::all();
        return view("dashboard.admin.exams.edit", compact("exam", "subjects"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }

    public function createExamClassroom(Exam $exam)
    {
        $teachers = Teacher::all();

        $classrooms = Classroom::whereDoesntHave('examClassrooms', function ($query) use ($exam) {
            $query->where('exam_id', $exam->id);
        })->get();

        return view("dashboard.admin.exams.examClassrooms.create", compact(
            "exam",
            "teachers",
            "classrooms"
        ));
    }

    public function storeExamClassroom(Request $request, Exam $exam)
    {
        if (Auth::user()->role == "admin") {

            $request->validate(
                [
                    "classroom_id" => "required|exists:classrooms,id",
                    "teacher_id" => "required|exists:teachers,id",
                    "room" => "required|string",
                ]
            );
            try {
                ExamClassroom::create(
                    [
                        "exam_id" => $exam->id,
                        "classroom_id" => $request->classroom_id,
                        "teacher_id" => $request->teacher_id,
                        "room" => $request->room,
                    ]
                );
                $classroomStudents = ClassroomStudent::where('classroom_id', $request->classroom_id)->get();

                foreach ($classroomStudents as $classroomStudent) {
                    StudentScore::create([
                        "exam_id" => $exam->id,
                        "classroom_subject_id" => ClassroomSubject::where('classroom_id', $request->classroom_id)->first()->id,
                        "classroom_student_id" => $classroomStudent->id,
                        "score" => 0,
                        "notes" => null,
                    ]);
                }


                return redirect()->route('exams.show', $exam)->with("success", "Berhasil menambahkan ruang ujian");
            } catch (\Exception $e) {
                Log::error("Error" . $e->getMessage());
                return redirect()->route("exams.examClassrooms.create", $exam)->with("error", "Gagal menambahkan ruang ujian");
            }
        }
    }

    public function editExamClassroom(Exam $exam, ExamClassroom $examClassroom)
    {
        $classrooms = Classroom::all();

        $teachers = Teacher::all();
        return view('dashboard.admin.exams.examClassrooms.edit', [
            'exam' => $exam,
            'examClassroom' => $examClassroom,
            'classrooms' => $classrooms,
            'teachers' => $teachers
        ]);
    }
    public function showExamClassroom(Exam $exam, ExamClassroom $examClassroom)
    {
        $examClassroom = ExamClassroom::with([
            'exam',
            'classroom.classroomStudents.student.user',
            'exam.subject',
            'classroom.classroomStudents.studentScores' => function ($query) use ($examClassroom) {
                $query->where('exam_id', $examClassroom->exam_id); // Gunakan `exam_id` dari ExamClassroom
            }
        ])->findOrFail($examClassroom->id);

        $studentScores = $examClassroom->classroom->classroomStudents->map(function ($classroomStudent) use ($examClassroom) {
            $student = $classroomStudent->student;
            $score = $classroomStudent->studentScores->where('exam_id', $examClassroom->exam_id)->first();

            return [
                'student' => $student->user->name,
                'score' => $score->score ?? 0,
                'notes' => $score ? $score->notes : '-',
            ];
        });

        $teachers = Teacher::all();

        return view('dashboard.admin.exams.examClassrooms.show', [
            'exam' => $exam,
            'examClassroom' => $examClassroom,
            'studentScores' => $studentScores,
            'teachers' => $teachers,
        ]);
    }


    public function updateExamClassroom(Request $request, Exam $exam, ExamClassroom $examClassroom)
    {
        if (Auth::user()->role == 'admin') {
            $request->validate([
                'teacher_id' => 'required|exists:teachers,id',
                'room' => 'required|string'
            ]);

            try {
                $examClassroom->update([
                    'teacher_id' => $request->teacher_id,
                    'room' => $request->room
                ]);

                return redirect()->route('exams.show', $exam)->with('success', 'Berhasil mengubah ruang ujian');
            } catch (\Exception $e) {
                Log::error('Error' . $e->getMessage());
                return redirect()->route('exams.examClassrooms.edit', [$exam, $examClassroom])->with('error', $e->getMessage());
            }
        } else {
            return redirect()->route('exams.show', $exam)->with('error', 'Anda tidak memiliki akses');
        }
    }

    public function destroyExamClassroom(Exam $exam, ExamClassroom $examClassroom)
    {
        if (Auth::user()->role == 'admin') {
            try {
                $examClassroom->delete();

                return redirect()->route('exams.show', $exam)->with('success', 'Berhasil menghapus ruang ujian');
            } catch (\Exception $e) {
                Log::error('Error' . $e->getMessage());
                return redirect()->route('exams.show', $exam)->with('error', 'Gagal menghapus ruang ujian');
            }
        } else {
            return redirect()->route('exams.show', $exam)->with('error', 'Anda tidak memiliki akses');
        }
    }
}
