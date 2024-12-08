<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role == "teacher") {
            $consultations = Consultation::where('teacher_id', Auth::user()->teacher->id)
                ->get();
            return view('dashboard.teachers.consultations.index', compact('consultations'));
        } else if (Auth::user()->role == 'student') {

            $teacherIds = Auth::user()->student->classrooms()
                ->with('classroomSubjects.teacher')
                ->get()
                ->pluck('classroomSubjects.*.teacher.id')
                ->flatten()
                ->unique();

            $consultations = Consultation::whereIn('teacher_id', $teacherIds)
                ->where('status', 'active')
                ->paginate(10);

            return view('dashboard.students.consultations.index', compact('consultations'));
        } else if (Auth::user()->role == 'parent') {
            $teacherIds = Auth::user()->parent->student->classrooms()
                ->with('classroomSubjects.teacher')
                ->get()
                ->pluck('classroomSubjects.*.teacher.id')
                ->flatten()
                ->unique();

            $consultations = Consultation::whereIn('teacher_id', $teacherIds)
                ->where('status', 'active')
                ->paginate(10);

            return view('dashboard.parents.consultations.index', compact('consultations'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::user()->role == "teacher") {
            return view('dashboard.teachers.consultations.create');
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsultationRequest $request)
    {
        //
        $validated = $request->validated();

        if (Auth::user()->role != 'teacher') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
        }
        try {

            Consultation::create([
                'teacher_id' => $validated['teacher_id'],
                'date' => $validated['date'],
                'location' => $validated['location'],
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
                'max_appointments' => $validated['max_appointments'],
            ]);

            return redirect()->route('consultations.index')->with('success', 'Jadwal konsultasi berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        $teacherId = Auth::user()->teacher->id;
        $totalConsultations = Consultation::where('teacher_id', $teacherId)->count();

        $todayConsultations = Consultation::where('teacher_id', $teacherId)
            ->whereDate('date', Carbon::today())
            ->count();

        $pendingConsultations = Appointment::whereIn('consultation_id', function ($query) use ($teacherId) {
            $query->select('id')
                ->from('consultations')
                ->where('teacher_id', $teacherId);
        })->where('status', 'pending')->count();

        $completedConsultations = Appointment::whereIn('consultation_id', function ($query) use ($teacherId) {
            $query->select('id')
                ->from('consultations')
                ->where('teacher_id', $teacherId);
        })->where('status', 'confirmed')->count();

        return view('dashboard.teachers.consultations.show', compact(
            'totalConsultations',
            'todayConsultations',
            'pendingConsultations',
            'completedConsultations',
            'consultation'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        //
        if (Auth::user()->role == "teacher") {
            return view('dashboard.teachers.consultations.edit', compact('consultation'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsultationRequest $request, Consultation $consultation)
    {
        //
        $validated = $request->validated();

        if (Auth::user()->role != 'teacher') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
        }
        try {

            $consultation->update([
                'date' => $validated['date'],
                'location' => $validated['location'],
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
                'max_appointments' => $validated['max_appointments'],
                'status' => $validated['status'],
            ]);

            return redirect()->route('consultations.index')->with('success', 'Jadwal konsultasi berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        //
    }

    public function request(Request $request, Consultation $consultation)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'purpose' => 'nullable|string'
        ]);

        try {

            $consultation->appointments()->create([
                'user_id' => $request->user_id,
                'purpose' => $request->purpose,
                'status' => 'pending'
            ]);

            return redirect()->route('consultations.index')->with('success', ' ');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->route('consultations.index')->with('error', $e->getMessage());
        }
    }

    public function showRequest()
    {
        if (Auth::user()->role != 'teacher') {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses.');
        }

        $teacher = Auth::user()->teacher;

        $consultations = Consultation::with(['appointments.user'])
            ->where('teacher_id', $teacher->id)
            ->whereHas('appointments', function ($query) {
                $query->where('status', 'pending');
            })
            ->get();

        $appointments = $consultations->appointments;
        dd($consultations);

        return view('dashboard.teachers.consultations.request', compact('consultations'));
    }
}
