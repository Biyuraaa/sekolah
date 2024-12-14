<?php

namespace App\Http\Controllers;

use App\Models\ClassroomSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroomSubjectRequest;
use App\Http\Requests\UpdateClassroomSubjectRequest;
use App\Models\Classroom;
use App\Models\ClassroomSubjectDayHour;
use App\Models\ScheduleHour;
use App\Models\Subject;
use App\Models\Task;
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
        if (Auth::user()->role == "teacher") {
            $teacherId = Auth::user()->teacher->id;

            $classroomSubjects = ClassroomSubject::with([
                'classroom',
                'subject',
                'teacher.user',
                'classroomSubjectDays.classroomSubjectDayHours.scheduleHour'
            ])->where('teacher_id', $teacherId)
                ->get()
                ->map(function ($subject) {
                    $schedules = $subject->classroomSubjectDays
                        ->sortBy('day')
                        ->mapWithKeys(function ($day) {
                            $hours = $day->classroomSubjectDayHours
                                ->sortBy('scheduleHour.hour_number');

                            $mergedHours = [];
                            $currentStart = null;
                            $currentEnd = null;

                            foreach ($hours as $hour) {
                                if (!$currentStart) {
                                    $currentStart = $hour->scheduleHour->start_time;
                                    $currentEnd = $hour->scheduleHour->end_time;
                                } elseif ($hour->scheduleHour->start_time == $currentEnd) {
                                    $currentEnd = $hour->scheduleHour->end_time;
                                } else {
                                    $mergedHours[] = $currentStart . ' - ' . $currentEnd;
                                    $currentStart = $hour->scheduleHour->start_time;
                                    $currentEnd = $hour->scheduleHour->end_time;
                                }
                            }

                            if ($currentStart && $currentEnd) {
                                $mergedHours[] = $currentStart . ' - ' . $currentEnd;
                            }

                            return [$day->day => $mergedHours];
                        });

                    return [
                        'id' => $subject->id,
                        'classroom' => $subject->classroom,
                        'subject' => $subject->subject,
                        'teacher' => $subject->teacher,
                        'schedules' => $schedules,
                        'status' => $subject->status,
                    ];
                });


            $totalSchedules = $classroomSubjects->count();
            $activeSchedules = $classroomSubjects->where('status', 'active')->count();
            $totalClassrooms = Classroom::count();

            $teachers = Teacher::all();

            return view("dashboard.admin.classroomSubjects.index", compact(
                "classroomSubjects",
                "teachers",
                "activeSchedules",
                "totalSchedules",
                "totalClassrooms"
            ));
        } else {
            $student = Auth::user()->student;
            $classroomId = $student->classroomStudents()
                ->where('student_id', $student->id)
                ->where('status', 'ongoing')
                ->value('classroom_id');

            $classroomSubjects = ClassroomSubject::with(['subject', 'teacher'])
                ->where('classroom_id', $classroomId)
                ->get();

            return view("dashboard.students.classroomSubjects.index", compact('classroomSubjects'));
        }
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

        if (Auth::user()->role == "admin") {
            $request->validated();

            $day = $request->day;
            $startHour = $request->start_hour;
            $endHour = $request->end_hour;
            $classroomId = $request->classroom_id;
            $teacherId = $request->teacher_id;

            // Validasi Konflik Classroom
            $classroomConflict = ClassroomSubjectDayHour::whereHas('classroomSubjectDay', function ($query) use ($classroomId, $day) {
                $query->whereHas('classroomSubject', function ($q) use ($classroomId) {
                    $q->where('classroom_id', $classroomId);
                })->where('day', $day);
            })->whereHas('scheduleHour', function ($query) use ($startHour, $endHour) {
                $query->whereBetween('hour_number', [$startHour, $endHour]);
            })->exists();

            if ($classroomConflict) {
                return redirect()->back()->with('error', 'Schedule conflict detected in the classroom.');
            }

            // Validasi Konflik Teacher
            $teacherConflict = ClassroomSubjectDayHour::whereHas('classroomSubjectDay', function ($query) use ($teacherId, $day) {
                $query->whereHas('classroomSubject', function ($q) use ($teacherId) {
                    $q->where('teacher_id', $teacherId);
                })->where('day', $day);
            })->whereHas('scheduleHour', function ($query) use ($startHour, $endHour) {
                $query->whereBetween('hour_number', [$startHour, $endHour]);
            })->exists();

            if ($teacherConflict) {
                return redirect()->back()->with('error', ' Schedule conflict detected for the teacher.');
            }

            // Create schedule
            try {
                $classroomSubject = ClassroomSubject::where('classroom_id', $classroomId)
                    ->where('teacher_id', $teacherId)
                    ->where('subject_id', $request->subject_id)
                    ->where('status', 'active')
                    ->first();

                if ($classroomSubject) {
                    $classroomSubjectDay = $classroomSubject->classroomSubjectDays()->create([
                        'day' => $day,
                    ]);

                    for ($hour = $startHour; $hour <= $endHour; $hour++) {
                        $scheduleHour = ScheduleHour::where('hour_number', $hour)->first();
                        $classroomSubjectDay->classroomSubjectDayHours()->create([
                            'schedule_hour_id' => $scheduleHour->id,
                        ]);
                    }
                } else {
                    $classroomSubject = ClassroomSubject::create([
                        'classroom_id' => $classroomId,
                        'teacher_id' => $teacherId,
                        'subject_id' => $request->subject_id,
                        'status' => 'active',
                    ]);
                    $classroomSubjectDay = $classroomSubject->classroomSubjectDays()->create([
                        'day' => $day,
                    ]);

                    for ($hour = $startHour; $hour <= $endHour; $hour++) {
                        $scheduleHour = ScheduleHour::where('hour_number', $hour)->first();
                        $classroomSubjectDay->classroomSubjectDayHours()->create([
                            'schedule_hour_id' => $scheduleHour->id,
                        ]);
                    }
                }



                return redirect()->route('classrooms.show', $classroomId)->with('success', 'Schedule created successfully');
            } catch (\Exception $e) {
                Log::error('Failed to create schedule: ' . $e->getMessage());
                return redirect()->route('classrooms.schedules.create', $classroomId)->with('error', 'An error occurred while creating the schedule');
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ClassroomSubject $classroomSubject)
    {
        //
        if (Auth::user()->role == "teacher") {
            $classroom = $classroomSubject->classroom;
            $weeks = $classroomSubject->weeks()->with(['materials', 'tasks'])->get();
            $classroomSubjectDays = $classroomSubject->classroomSubjectDays()
                ->with('classroomSubjectDayHours.scheduleHour')
                ->get()
                ->groupBy('day')
                ->map(function ($dayGroup) {
                    return $dayGroup->map(function ($day) {
                        $hours = $day->classroomSubjectDayHours->sortBy('scheduleHour.hour_number');
                        $mergedHours = [];
                        $currentStart = null;
                        $currentEnd = null;

                        foreach ($hours as $hour) {
                            if (!$currentStart) {
                                $currentStart = $hour->scheduleHour->start_time;
                                $currentEnd = $hour->scheduleHour->end_time;
                            } elseif ($hour->scheduleHour->start_time == $currentEnd) {
                                $currentEnd = $hour->scheduleHour->end_time;
                            } else {
                                $mergedHours[] = [
                                    'start_time' => $currentStart,
                                    'end_time' => $currentEnd,
                                ];
                                $currentStart = $hour->scheduleHour->start_time;
                                $currentEnd = $hour->scheduleHour->end_time;
                            }
                        }

                        // Tambahkan rentang terakhir
                        if ($currentStart && $currentEnd) {
                            $mergedHours[] = [
                                'start_time' => $currentStart,
                                'end_time' => $currentEnd,
                            ];
                        }

                        return [
                            'day' => $day->day,
                            'hours' => $mergedHours,
                        ];
                    });
                });
            return view("dashboard.teachers.classroomSubjects.show", compact(
                "classroom",
                "classroomSubject",
                "classroomSubjectDays",
                "weeks"
            ));
        } else if (Auth::user()->role == "student") {
            $classroom = $classroomSubject->classroom;
            $weeks = $classroomSubject->weeks()->with(['materials', 'tasks'])->get();
            $classroomSubjectDays = $classroomSubject->classroomSubjectDays()
                ->with('classroomSubjectDayHours.scheduleHour')
                ->get()
                ->groupBy('day')
                ->map(function ($dayGroup) {
                    return $dayGroup->map(function ($day) {
                        $hours = $day->classroomSubjectDayHours->sortBy('scheduleHour.hour_number');
                        $mergedHours = [];
                        $currentStart = null;
                        $currentEnd = null;

                        foreach ($hours as $hour) {
                            if (!$currentStart) {
                                $currentStart = $hour->scheduleHour->start_time;
                                $currentEnd = $hour->scheduleHour->end_time;
                            } elseif ($hour->scheduleHour->start_time == $currentEnd) {
                                $currentEnd = $hour->scheduleHour->end_time;
                            } else {
                                $mergedHours[] = [
                                    'start_time' => $currentStart,
                                    'end_time' => $currentEnd,
                                ];
                                $currentStart = $hour->scheduleHour->start_time;
                                $currentEnd = $hour->scheduleHour->end_time;
                            }
                        }

                        // Tambahkan rentang terakhir
                        if ($currentStart && $currentEnd) {
                            $mergedHours[] = [
                                'start_time' => $currentStart,
                                'end_time' => $currentEnd,
                            ];
                        }

                        return [
                            'day' => $day->day,
                            'hours' => $mergedHours,
                        ];
                    });
                });

            return view(
                "dashboard.students.classroomSubjects.show",
                compact(
                    "classroom",
                    "classroomSubject",
                    "classroomSubjectDays",
                    "weeks"
                )
            );
        } else {
            return redirect("dashboard");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassroomSubject $classroomSubject)
    {
        if (Auth::user()->role == "admin") {
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $classrooms = Classroom::all();


            return view("dashboard.admin.classroomSubjects.edit", compact(
                "subjects",
                "teachers",
                "classrooms",
                'classroomSubject',
                'classroomSubjectDay',
                'totalTeachingHours'
            ));
        }
        //
        if (Auth::user()->role == "admin") {
            $subjects = Subject::all();
            $teachers = Teacher::all();


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

    public function assign(ClassroomSubject $classroomSubject, Task $task)
    {
        $submission = $task->submissions()->where('student_id', Auth::user()->student->id)->first();
        return view('dashboard.students.classroomSubjects.assign', compact(
            'classroomSubject',
            'task',
            'submission'
        ));
    }
}
