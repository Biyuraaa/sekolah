<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Classroom;
use App\Models\ClassroomStudent;
use App\Models\ClassroomSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{
    //

    public function index()
    {
        if (Auth::user()->role == "student") {
            $studentId = Auth::user()->student->id;

            $classroomStudent = ClassroomStudent::where("student_id", $studentId)
                ->where('status', 'ongoing')
                ->first();

            if ($classroomStudent) {
                $classroom = Classroom::with('classroomSubjects.subject')
                    ->where('id', $classroomStudent->classroom_id)
                    ->first();

                if ($classroom) {
                    // Mempersiapkan data untuk view
                    return view("dashboard.students.attendances.index", [
                        'classroom' => $classroom,
                        'classroomSubjects' => $classroom->classroomSubjects
                    ]);
                } else {
                    return redirect()->route('dashboard');
                }
            }
        }
    }

    public function show(ClassroomSubject $classroomSubject)
    {
        if (Auth::user()->role == 'student') {
            $student = Auth::user()->student;

            $absences = $classroomSubject->weeks()
                ->with(['absences' => function ($query) use ($student) {
                    $query->where('student_id', $student->id);
                }])
                ->get()
                ->map(function ($week) {
                    $absence = $week->absences->first();
                    return [
                        'week' => $week,
                        'status' => $absence ? $absence->status : null,
                    ];
                });

            $totalMeetings = $absences->count();
            $presentCount = $absences->where('status', 'present')->count();
            $absenceCount = $absences->where('status', 'absent')->count();
            $lateCount = $absences->where('status', 'late')->count();

            return view('dashboard.students.attendances.show', compact(
                'classroomSubject',
                'absences',
                'totalMeetings',
                'presentCount',
                'absenceCount',
                'lateCount'
            ));
        }
    }
}
