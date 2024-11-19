<?php

namespace App\Http\Controllers;

use App\Models\ClassroomSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroomSubjectRequest;
use App\Http\Requests\UpdateClassroomSubjectRequest;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;

class ClassroomSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == "admin") {
            // Get main data with pagination and eager loading relationships
            $classroomSubjects = ClassroomSubject::with(['classroom', 'subject', 'teacher.user'])->where('status', 'active')
                ->latest()
                ->paginate(10);

            // Get statistics for dashboard cards
            $totalSchedules = ClassroomSubject::count();
            $activeSchedules = ClassroomSubject::where('status', 'active')->count();
            $totalCredits = ClassroomSubject::sum('credit');
            $totalClassrooms = Classroom::count();

            // Get all teachers for reference
            $teachers = Teacher::all();

            return view("dashboard.admin.classroomSubjects.index", compact(
                "classroomSubjects",
                "teachers",
                "activeSchedules",
                "totalSchedules",
                "totalCredits",
                "totalClassrooms"
            ));
        }

        // Redirect or throw exception if not admin
        return redirect()->route('dashboard')->with('error', 'Unauthorized access');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::user()->role == "admin") {
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $classrooms = Classroom::all();

            return view("dashboard.admin.classroomSubjects.create", compact("subjects", "teachers", "classrooms"));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomSubjectRequest $request)
    {
        $request->validated();

        $classroomId = $request->input('classroom_id');
        $teacherId = $request->input('teacher_id');
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');

        $classroomConflict = ClassroomSubject::where('classroom_id', $classroomId)
            ->where('day', $request->day)
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
            ->where('day', $request->day)
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
            $classroomSubject = ClassroomSubject::create([
                'classroom_id' => $classroomId,
                'teacher_id' => $teacherId,
                'status' => 'active',
                'subject_id' => $request->subject_id,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'day' => $request->day,
                'credit' => $request->credit,
            ]);

            return redirect()->route('classroom-subjects.index')->with('success', 'Classroom subject created successfully.');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the classroom subject.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ClassroomSubject $classroomSubject)
    {
        //
        if (Auth::user()->role == "admin") {
            return view("dashboard.admin.classroomSubjects.show", compact("classroomSubject"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassroomSubject $classroomSubject)
    {
        //
        if (Auth::user()->role == "admin") {
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $classrooms = Classroom::all();


            return view("dashboard.admin.classroomSubjects.edit", compact(
                "subjects",
                "teachers",
                'classrooms',
                'classroomSubject'
            ));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomSubjectRequest $request, ClassroomSubject $classroomSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassroomSubject $classroomSubject)
    {
        //
    }

    public function getTeachers(Request $request)
    {
        try {
            $subjectId = Request::query('subject_id');
            if (!$subjectId) {
                return response()->json(['error' => 'subject_id is required'], 400);
            }

            // Ambil data teachers dengan relasi user
            $teachers = Teacher::where('subject_id', $subjectId)
                ->with('user:id,name') // Ambil hanya kolom `id` dan `name` dari tabel `users`
                ->get()
                ->map(function ($teacher) {
                    return [
                        'id' => $teacher->id,
                        'name' => $teacher->user->name, // Ambil name dari relasi user
                    ];
                });

            return response()->json($teachers);
        } catch (\Exception $e) {
            // Log error untuk analisis
            Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
