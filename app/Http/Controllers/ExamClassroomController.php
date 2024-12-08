<?php

namespace App\Http\Controllers;

use App\Models\ExamClassroom;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamClassroomRequest;
use App\Http\Requests\UpdateExamClassroomRequest;
use Illuminate\Support\Facades\Auth;

class ExamClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role == "teacher") {
            $teacherId = Auth::user()->teacher->id;

            $examClassrooms = ExamClassroom::where("teacher_id", $teacherId)
                ->with(['exam', 'classroom'])
                ->get();

            return view("dashboard.teachers.examClassrooms.index", compact("examClassrooms"));
        } else {
            $studentId = Auth::user()->student->id;

            // Mendapatkan jadwal ujian berdasarkan kelas siswa
            $examClassrooms = ExamClassroom::whereHas('classroom', function ($query) use ($studentId) {
                $query->whereHas('students', function ($query) use ($studentId) {
                    $query->where('student_id', $studentId)
                        ->where('status', 'ongoing');
                });
            })->with(['exam', 'classroom'])
                ->get();

            return view('dashboard.students.examClassrooms.index', compact('examClassrooms'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamClassroomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamClassroom $examClassroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamClassroom $examClassroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamClassroomRequest $request, ExamClassroom $examClassroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamClassroom $examClassroom)
    {
        //
    }
}
