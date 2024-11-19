<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassroomSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\ClassroomStudent;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role == "admin") {
            $classrooms = Classroom::paginate(10);
            $subjects = Subject::all();
            $teachers = Teacher::all();
            return view("dashboard.admin.classrooms.index", compact("classrooms", "subjects", "teachers"));
        } else {
            $classrooms = Classroom::all();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::user()->role == "admin") {
            $teachers = Teacher::all();
            return view("dashboard.admin.classrooms.create", compact("teachers"));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {

        //
        $request->validated();

        try {
            Classroom::create($request->all());
            return redirect()->route("classrooms.index")->with("success", "Class created successfully");
        } catch (\Exception $e) {
            return redirect()->route("classrooms.create")->with("error", "An error occurred");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //

        if (Auth::user()->role == "admin") {
            $students = $classroom->classroomStudents;
            $subjects = $classroom->classroomSubjects;

            return view("dashboard.admin.classrooms.show", compact("classroom", "students", "subjects"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
        if (Auth::user()->role == "admin") {
            $teachers = Teacher::all();
            return view("dashboard.admin.classrooms.edit", compact("classroom", "teachers"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        //

        $request->validated();
        try {
            $classroom->update($request->all());
            return redirect()->route("classrooms.index")->with("success", " Class updated successfully");
        } catch (\Exception $e) {
            return redirect()->route("classrooms.edit")->with("error", "An error occurred");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        //
    }

    public function createSchedule(Classroom $classroom)
    {
        if (Auth::user()->role == "admin") {
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $classroomId = $classroom->id;

            return view("dashboard.admin.classrooms.createSchedule", compact("subjects", "teachers", "classroomId"));
        }
    }

    public function storeSchedule(Request $request, Classroom $classroom)
    {
        if (Auth::user()->role == "admin") {
            $validated = $request->validate([
                "teacher_id" => "required|exists:teachers,id",
                "subject_id" => "required|exists:subjects,id",
                "classroom_id" => "required|exists:classrooms,id",
                "day" => "required|in:monday,tuesday,wednesday,thursday,friday",
                "start_time" => "required",
                "end_time" => "required|after:start_time",
                "credit" => "required|string",
            ], [
                'teacher_id.required' => 'Teacher is required.',
                'subject_id.required' => 'Subject is required.',
                'start_time.date_format' => 'Start time must be in HH:mm format.',
                'end_time.after' => 'End time must be after start time.',
            ]);

            $classroomId = $request->input('classroom_id');
            $teacherId = $request->input('teacher_id');
            $startTime = $request->input('start_time');
            $endTime = $request->input('end_time');
            // Validate schedule conflict for the classroom
            $classroomConflict = ClassroomSubject::where('classroom_id', $classroomId)
                ->where('day', $request->day) // Periksa hanya untuk hari yang sama
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('start_time', [$startTime, $endTime])
                        ->orWhereBetween('end_time', [$startTime, $endTime])
                        ->orWhere(function ($q) use ($startTime, $endTime) {
                            $q->where('start_time', '<=', $startTime)
                                ->where('end_time', '>=', $endTime);
                        });
                })
                ->exists();

            if ($classroomConflict) {
                return response()->json([
                    'message' => 'Schedule conflict detected in the classroom for the same day.'
                ], 422);
            }


            if ($classroomConflict) {
                return response()->json([
                    'message' => 'Schedule conflict detected in the classroom.'
                ], 422);
            }

            // Validate schedule conflict for the teacher
            $teacherConflict = ClassroomSubject::where('teacher_id', $teacherId)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('start_time', [$startTime, $endTime])
                        ->orWhereBetween('end_time', [$startTime, $endTime])
                        ->orWhere(function ($q) use ($startTime, $endTime) {
                            $q->where('start_time', '<=', $startTime)
                                ->where('end_time', '>=', $endTime);
                        });
                })
                ->exists();

            if ($teacherConflict) {
                return response()->json([
                    'message' => 'Schedule conflict detected for the teacher.'
                ], 422);
            }

            // Create the classroom subject
            try {
                ClassroomSubject::create([
                    'classroom_id' => $classroomId,
                    'teacher_id' => $teacherId,
                    'subject_id' => $request->subject_id,
                    'start_time' => $startTime,
                    'end_time' => $endTime,
                    'day' => $request->day,
                    'credit' => $request->credit,
                ]);

                return redirect()->route('classrooms.show', $classroomId)->with('success', '' . $request->subject_id . ' schedule created successfully');
            } catch (\Exception $e) {
                return redirect()->route('classrooms.createSchedule', $classroomId)->with('error', 'An error occurred');
            }
        }
    }

    public function editSchedule(Classroom $classroom, ClassroomSubject $classroomSubject)
    {
        if (Auth::user()->role == "admin") {
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $classroomId = $classroom->id;

            return view("dashboard.admin.classrooms.editSchedule", compact("subjects", "teachers", "classroomId", 'classroomSubject'));
        }
    }

    public function updateSchedule(Request $request, Classroom $classroom, ClassroomSubject $classroomSubject)
    {
        if (Auth::user()->role !== "admin") {
            return response()->json(['message' => 'Unauthorized access'], 403);
        }

        $validated = $request->validate([
            "teacher_id" => "required|exists:teachers,id",
            "subject_id" => "required|exists:subjects,id",
            "classroom_id" => "required|exists:classrooms,id",
            "day" => "required|in:monday,tuesday,wednesday,thursday,friday",
            "start_time" => "required",
            "end_time" => "required|after:start_time",
            "credit" => "required|string",
        ], [
            'teacher_id.required' => 'Teacher is required.',
            'subject_id.required' => 'Subject is required.',
            'start_time.date_format' => 'Start time must be in HH:mm format.',
            'end_time.after' => 'End time must be after start time.',
        ]);

        $classroomId = $validated['classroom_id'];
        $teacherId = $validated['teacher_id'];
        $startTime = $validated['start_time'];
        $endTime = $validated['end_time'];

        $classroomConflict = ClassroomSubject::where('classroom_id', $classroomId)
            ->where('day', $request->day)
            ->where('id', '!=', $classroomSubject->id)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime])
                    ->orWhere(function ($q) use ($startTime, $endTime) {
                        $q->where('start_time', '<=', $startTime)
                            ->where('end_time', '>=', $endTime);
                    });
            })
            ->exists();

        if ($classroomConflict) {
            return response()->json([
                'message' => 'Schedule conflict detected in the classroom.'
            ], 422);
        }

        // Validate schedule conflict for the teacher
        $teacherConflict = ClassroomSubject::where('teacher_id', $teacherId)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime])
                    ->orWhere(function ($q) use ($startTime, $endTime) {
                        $q->where('start_time', '<=', $startTime)
                            ->where('end_time', '>=', $endTime);
                    });
            })
            ->exists();

        if ($teacherConflict) {
            return response()->json([
                'message' => 'Schedule conflict detected for the teacher.'
            ], 422);
        }

        try {
            $classroomSubject->update([
                'teacher_id' => $teacherId,
                'classroom_id' => $classroomId,
                'subject_id' => $validated['subject_id'],
                'start_time' => $startTime,
                'end_time' => $endTime,
                'day' => $validated['day'],
                'credit' => $validated['credit'],
            ]);

            return redirect()
                ->route('classrooms.show', $classroomId)
                ->with('success', 'Schedule updated successfully for subject ID: ' . $validated['subject_id']);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Schedule update failed: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to update schedule. Please try again later.'
            ], 500);
        }
    }


    public function showSchedule(Classroom $classroom, ClassroomSubject $classroomSubject)
    {
        if (Auth::user()->role == "admin") {

            return view("dashboard.admin.classrooms.showSchedule", compact("classroom", "classroomSubject"));
        }
    }

    public function createStudent(Classroom $classroom)
    {
        if (Auth::user()->role == "admin") {
            // Ambil ID siswa dari tabel classroom_students yang terkait dengan classroom tertentu
            $classroomStudentIds = $classroom->classroomStudents()->pluck('student_id')->toArray();

            // Ambil siswa yang tidak ada di classroom_students atau memiliki status graduated atau not_graduated di tabel classroom_students
            $students = Student::whereNotIn('id', function ($query) use ($classroom) {
                $query->select('student_id')
                    ->from('classroom_students')
                    ->where('classroom_id', $classroom->id)
                    ->whereNotIn('status', ['graduated', 'not_graduated']);
            })->get();

            return view("dashboard.admin.classrooms.createStudent", compact("classroom", "students"));
        }

        abort(403, 'Unauthorized action.');
    }

    public function storeStudent(Request $request, Classroom $classroom)
    {
        if (Auth::user()->role == 'admin') {
            // Validasi input
            $request->validate([
                'student_id' => 'required|exists:students,id',
            ]);

            $studentId = $request->input('student_id');

            // Cek apakah siswa sudah terdaftar di kelas ini
            $exists = ClassroomStudent::where('classroom_id', $classroom->id)
                ->where('student_id', $studentId)
                ->exists();

            if ($exists) {
                return redirect()
                    ->back()
                    ->with('error', 'Student is already assigned to this classroom.');
            }

            ClassroomStudent::create([
                'classroom_id' => $classroom->id,
                'student_id' => $studentId,
            ]);

            return redirect()
                ->route('classrooms.show', $classroom->id)
                ->with('success', 'Student successfully added to the classroom.');
        }

        abort(403, 'Unauthorized action.');
    }
}
