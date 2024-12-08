<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role == 'teacher') {
            $appointments = Appointment::whereHas('consultation', function ($query) {
                $query->where('teacher_id', Auth::user()->teacher->id);
            })
                ->where('status', 'confirmed')
                ->with(['user', 'consultation'])
                ->paginate(10);
            return view('dashboard.teachers.appointments.index', compact('appointments'));
        } else {
            abort(403, 'Unauthorized action.');
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
    public function store(StoreAppointmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
        $request->validated();

        try {
            $appointment->update([
                "status" => $request->status,
                "notes" => $request->notes,
            ]);

            return redirect()->route('consultations.show', $appointment->consultation)->with('success', 'Appointment status updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('consultations.show', $appointment->consultation)->with('error', $e->getMessage());
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
