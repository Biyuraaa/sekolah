<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassroomStudent;
use App\Models\ClassroomSubject;
use App\Models\Exam;
use App\Models\StudentScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeExamController extends Controller
{
    //

    public function index()
    {
        if (Auth::user()->role == "teacher") {
            $teacherId = Auth::user()->teacher->id;

            $exams = Exam::join('exam_classrooms', 'exams.id', '=', 'exam_classrooms.exam_id')
                ->join('classrooms', 'exam_classrooms.classroom_id', '=', 'classrooms.id')
                ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
                ->join('classroom_subjects', function ($join) use ($teacherId) {
                    $join->on('classrooms.id', '=', 'classroom_subjects.classroom_id')
                        ->on('subjects.id', '=', 'classroom_subjects.subject_id')
                        ->where('classroom_subjects.teacher_id', '=', $teacherId);
                })
                ->select(
                    'exams.id as exam_id',
                    'classroom_subjects.id as classroom_subject_id',
                    'classrooms.year_level',
                    'classrooms.group_numbers',
                    'exams.date',
                    'exams.start_time',
                    'exams.end_time',
                    'subjects.name as subject_name',
                    'exams.type'
                )
                ->orderBy('exams.date', 'desc')
                ->orderBy('exams.start_time', 'asc')
                ->get();
            return view('dashboard.teachers.gradeExams.index', compact('exams'));
        } else if (Auth::user()->role == 'student') {
            $classroomStudents = ClassroomStudent::where('student_id', Auth::user()->student->id)->get();
            $classroomStudentIds = $classroomStudents->pluck('id')->toArray();

            $studentScores = StudentScore::whereIn('classroom_student_id', $classroomStudentIds)
                ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal dan waktu penciptaan
                ->get();

            return view('dashboard.students.gradeExams.index', compact('studentScores'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
        }
    }
    public function show(Exam $exam, ClassroomSubject $classroomSubject)
    {
        $studentScores = StudentScore::where('exam_id', $exam->id)
            ->where('classroom_subject_id', $classroomSubject->id)
            ->with(['classroomStudent.student', 'classroomSubject.subject'])
            ->get();

        if ($studentScores->isEmpty()) {
            $classroomStudents = ClassroomStudent::where('classroom_id', $classroomSubject->classroom_id)->get();

            foreach ($classroomStudents as $classroomStudent) {
                StudentScore::create([
                    'exam_id' => $exam->id,
                    'classroom_student_id' => $classroomStudent->id,
                    'classroom_subject_id' => $classroomSubject->id,
                    'score' => 0,
                    'notes' => null,
                ]);
            }

            $studentScores = StudentScore::where('exam_id', $exam->id)
                ->where('classroom_subject_id', $classroomSubject->id)
                ->with(['classroomStudent.student', 'classroomSubject.subject'])
                ->get();
        }

        return view('dashboard.teachers.gradeExams.show', compact('exam', 'classroomSubject', 'studentScores'));
    }


    public function update(Request $request, StudentScore $studentScore)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:100',
            'notes' => 'nullable|string|max:1000',
        ]);

        $studentScore->update([
            'score' => $request->score,
            'notes' => $request->notes,
        ]);

        return response()->json(['success' => true]);
    }
}
