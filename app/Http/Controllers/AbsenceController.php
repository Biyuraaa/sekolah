<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbsenceRequest;
use App\Http\Requests\UpdateAbsenceRequest;
use App\Models\Classroom;
use App\Models\ClassroomStudent;
use App\Models\ClassroomSubject;
use App\Models\Student;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
    public function store(StoreAbsenceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Absence $absence) {}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsenceRequest $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        //
    }

    public function updateAbsenceStatus($studentId, $weekId, Request $request)
    {
        $student = Student::findOrFail($studentId);
        $week = Week::findOrFail($weekId);

        $absence = Absence::where('student_id', $student->id)
            ->where('week_id', $week->id)
            ->firstOrFail();

        $absence->status = $request->input('status', 'present');
        $absence->save();

        return response()->json([
            'success' => true,
            'studentName' => $student->user->name,
            'status' => $absence->status,
        ]);
    }
}
