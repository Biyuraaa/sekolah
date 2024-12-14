<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassroomSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\ClassroomStudent;
use App\Models\ClassroomSubjectDay;
use App\Models\ClassroomSubjectDayHour;
use App\Models\ScheduleHour;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $classrooms = Classroom::orderBy('academic_year', 'desc')
                ->orderBy('year_level')
                ->orderBy('group_numbers')
                ->paginate(10);
            $subjects = Subject::all();
            $teachers = Teacher::all();
            return view("dashboard.admin.classrooms.index", compact(
                "classrooms",
                "subjects",
                "teachers"
            ));
        } else if (Auth::user()->role == 'teacher') {
            $teacherId = Auth::user()->teacher->id;

            $classrooms = Classroom::where('teacher_id', $teacherId)
                ->orderBy('academic_year', 'desc')
                ->orderBy('year_level')
                ->orderBy('group_numbers')
                ->paginate(10);

            $totalClassrooms = $classrooms->count();
            $totalActiveClassrooms = $classrooms->where('status', 'active')->count();
            $totalInactiveClassrooms = $classrooms->where('status', 'inactive')->count(); // Baru
            $totalStudents = $classrooms->loadCount('classroomStudents')->sum('classroom_students_count'); // Baru
            $averageStudentsPerClass = $totalClassrooms > 0 ? round($totalStudents / $totalClassrooms, 2) : 0; // Baru

            return view("dashboard.teachers.classrooms.index", compact(
                "classrooms",
                "totalClassrooms",
                "totalActiveClassrooms",
                "totalInactiveClassrooms",
                "totalStudents",
                "averageStudentsPerClass"
            ));
        } else {
            $studentId = Auth::user()->student->id;

            $activeClassroom = Classroom::whereHas('classroomStudents', function ($query) use ($studentId) {
                $query->where('student_id', $studentId)
                    ->where('status', 'ongoing');
            })->with([
                'classroomStudents' => function ($query) use ($studentId) {
                    $query->where('student_id', $studentId);
                },
                'classroomSubjects.subject',
                'classroomSubjects.classroomSubjectDays.classroomSubjectDayHours.scheduleHour',
            ])->first();

            if (!$activeClassroom) {
                return redirect()->route('dashboard')->with('error', 'Tidak ada kelas aktif saat ini.');
            }

            $subjectCount = $activeClassroom->classroomSubjects->count();
            $teacherCount = $activeClassroom->classroomSubjects->unique('teacher_id')->count();

            $schedule = $activeClassroom->classroomSubjects->flatMap(function ($subject) {
                return $subject->classroomSubjectDays->flatMap(function ($day) {
                    return $day->classroomSubjectDayHours;
                });
            });

            $groupedSchedule = $schedule
                ->groupBy(function ($item) {
                    return $item->classroomSubjectDay->day . '-' . $item->classroomSubjectDay->classroomSubject->subject->name;
                })
                ->map(function ($items) {
                    $startTime = Carbon::parse($items->min('scheduleHour.start_time'))->format('H:i');
                    $endTime = Carbon::parse($items->max('scheduleHour.end_time'))->format('H:i');
                    $day = $items->first()->classroomSubjectDay->day;
                    $subject = $items->first()->classroomSubjectDay->classroomSubject->subject->name;
                    $teacher = $items->first()->classroomSubjectDay->classroomSubject->teacher->user;

                    return [
                        'day' => $day,
                        'start_time' => $startTime,
                        'end_time' => $endTime,
                        'subject' => $subject,
                        'teacher' => $teacher,
                    ];
                })
                ->groupBy('day')
                ->sortKeys();

            return view('dashboard.students.classrooms.index', compact(
                'activeClassroom',
                'subjectCount',
                'groupedSchedule',
                'teacherCount'
            ));
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
            $schedules = $classroom->classroomSubjects()
                ->with(['subject', 'teacher.user', 'classroomSubjectDays.classroomSubjectDayHours.scheduleHour'])
                ->get()
                ->flatMap(function ($subject) {
                    return $subject->classroomSubjectDays->map(function ($day) use ($subject) {
                        return [
                            'day' => $day->day,
                            'subject' => $subject->subject,
                            'teacher' => $subject->teacher,
                            'status' => $subject->status,
                            'start_time' => $day->classroomSubjectDayHours->first()->scheduleHour->start_time,
                            'end_time' => $day->classroomSubjectDayHours->last()->scheduleHour->end_time,
                            'classroomSubjectDay_id' => $day->id,
                            'classroomSubject_id' => $subject->id,
                        ];
                    });
                })
                ->groupBy('day')
                ->sortBy(function ($schedules, $day) {
                    return array_search($day, ['monday', 'tuesday', 'wednesday', 'thursday', 'friday']);
                });


            return view("dashboard.admin.classrooms.show", compact(
                "schedules",
                "students",
                "subjects",
                'classroom'
            ));
        } else if (Auth::user()->role == "teacher") {
            $classroomSubjects = $classroom->classroomSubjects()
                ->with(['subject', 'teacher.user', 'classroomSubjectDays.classroomSubjectDayHours.scheduleHour'])
                ->get()
                ->flatMap(function ($subject) {
                    return $subject->classroomSubjectDays->map(function ($day) use ($subject) {
                        return [
                            'day' => $day->day,
                            'subject' => $subject->subject,
                            'teacher' => $subject->teacher,
                            'status' => $subject->status,
                            'start_time' => $day->classroomSubjectDayHours->first()->scheduleHour->start_time,
                            'end_time' => $day->classroomSubjectDayHours->last()->scheduleHour->end_time,
                            'classroomSubjectDay_id' => $day->id,
                            'classroomSubject_id' => $subject->id,
                        ];
                    });
                })
                ->groupBy('day')
                ->sortBy(function ($schedules, $day) {
                    return array_search($day, ['monday', 'tuesday', 'wednesday', 'thursday', 'friday']);
                });
            $classroomStudents = $classroom->classroomStudents;
            $examClassrooms = $classroom->examClassrooms;

            return view("dashboard.teachers.classrooms.show", compact(
                "classroom",
                "classroomStudents",
                "classroomSubjects",
                "classroomStudents",
                "examClassrooms"
            ));
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
                "start_hour" => "required|integer|min:1",
                "end_hour" => "required|integer|min:1|gt:start_hour",
            ], [
                'teacher_id.required' => 'Teacher is required.',
                'subject_id.required' => 'Subject is required.',
                'classroom_id.required' => 'Classroom is required.',
                'day.required' => 'Day is required.',
                'day.in' => 'Day must be one of: Monday, Tuesday, Wednesday, Thursday, Friday.',
                'start_hour.required' => 'Start hour is required.',
                'start_hour.integer' => 'Start hour must be a valid number.',
                'end_hour.required' => 'End hour is required.',
                'end_hour.integer' => 'End hour must be a valid number.',
            ]);

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


    public function editSchedule(Classroom $classroom, ClassroomSubject $classroomSubject, ClassroomSubjectDay $classroomSubjectDay)
    {
        if (Auth::user()->role == "admin") {
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $classroomId = $classroom->id;

            return view("dashboard.admin.classrooms.editSchedule", compact(
                "subjects",
                "teachers",
                "classroomId",
                'classroomSubject',
                'classroomSubjectDay',
            ));
        }
    }

    public function updateSchedule(Request $request, Classroom $classroom, ClassroomSubject $classroomSubject, ClassroomSubjectDay $classroomSubjectDay)
    {
        if (Auth::user()->role !== "admin") {
            return response()->json(['message' => 'Unauthorized access'], 403);
        }

        $validated = $request->validate([
            "teacher_id" => "required|exists:teachers,id",
            "subject_id" => "required|exists:subjects,id",
            "classroom_id" => "required|exists:classrooms,id",
            "day" => "required|in:monday,tuesday,wednesday,thursday,friday",
            "start_hour" => "required|integer|min:1",
            "end_hour" => "required|integer|min:1|gt:start_hour",
        ], [
            'teacher_id.required' => 'Teacher is required.',
            'subject_id.required' => 'Subject is required.',
            'classroom_id.required' => 'Classroom is required.',
            'day.required' => 'Day is required.',
            'day.in' => 'Day must be one of: Monday, Tuesday, Wednesday, Thursday, Friday.',
            'start_hour.required' => 'Start hour is required.',
            'start_hour.integer' => 'Start hour must be a valid number.',
            'end_hour.required' => 'End hour is required.',
            'end_hour.integer' => 'End hour must be a valid number.',
        ]);

        $classroomId = $validated['classroom_id'];
        $teacherId = $validated['teacher_id'];
        $day = $validated['day'];
        $startHour = $validated['start_hour'];
        $endHour = $validated['end_hour'];

        $classroomConflict = ClassroomSubjectDayHour::whereHas('classroomSubjectDay', function ($query) use ($classroomId, $day, $classroomSubject) {
            $query->whereHas('classroomSubject', function ($q) use ($classroomId, $classroomSubject) {
                $q->where('classroom_id', $classroomId)->where('id', '!=', $classroomSubject->id);
            })->where('day', $day);
        })->whereHas('scheduleHour', function ($query) use ($startHour, $endHour) {
            $query->whereBetween('hour_number', [$startHour, $endHour]);
        })->exists();

        if ($classroomConflict) {
            return redirect()->back()->with('error', 'Schedule conflict detected in the classroom.');
        }

        $teacherConflict = ClassroomSubjectDayHour::whereHas('classroomSubjectDay', function ($query) use ($teacherId, $day, $classroomSubject) {
            $query->whereHas('classroomSubject', function ($q) use ($teacherId, $classroomSubject) {
                $q->where('teacher_id', $teacherId)->where('id', '!=', $classroomSubject->id);
            })->where('day', $day);
        })->whereHas('scheduleHour', function ($query) use ($startHour, $endHour) {
            $query->whereBetween('hour_number', [$startHour, $endHour]);
        })->exists();

        if ($teacherConflict) {
            return redirect()->back()->with('error', 'Schedule conflict detected for the teacher.');
        }

        try {
            // Hapus jadwal lama
            $classroomSubjectDay->update([
                'day' => $day,
            ]);

            $classroomSubjectDay->classroomSubjectDayHours()->delete();

            for ($hour = $startHour; $hour <= $endHour; $hour++) {
                $scheduleHour = ScheduleHour::where('hour_number', $hour)->first();
                $classroomSubjectDay->classroomSubjectDayHours()->create([
                    'schedule_hour_id' => $scheduleHour->id,
                ]);
            }

            // Update data ClassroomSubject
            $classroomSubject->update([
                'teacher_id' => $teacherId,
                'subject_id' => $validated['subject_id'],
                'status' => 'active',
            ]);

            return redirect()->route('classrooms.show', $classroomId)
                ->with('success', 'Schedule updated successfully.');
        } catch (\Exception $e) {
            Log::error('Schedule update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update schedule. Please try again later.');
        }
    }



    public function showSchedule(Classroom $classroom, ClassroomSubject $classroomSubject)
    {
        if (Auth::user()->role == "admin") {
            $totalTeachingHours = $classroom->getTotalTeachingHoursForSubject($classroomSubject);

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

            return view("dashboard.admin.classrooms.showSchedule", compact(
                "classroom",
                "classroomSubject",
                "totalTeachingHours",
                "classroomSubjectDays"
            ));
        } else {
            $totalTeachingHours = $classroom->getTotalTeachingHoursForSubject($classroomSubject);

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

            return view("dashboard.teachers.classrooms.classroomSubjects.show", compact(
                "classroom",
                "classroomSubject",
                "totalTeachingHours",
                "classroomSubjectDays"
            ));
        }
    }


    public function deleteSchedule(Classroom $classroom, ClassroomSubjectDay $classroomSubjectDay)
    {
        if (Auth::user()->role !== "admin") {
            return redirect()->route('classrooms.schedules.show', $classroom->id)
                ->with('error', 'You are not authorized to delete schedules.');
        }

        try {
            // Begin transaction
            DB::beginTransaction();

            $classroomSubjectDay->classroomSubjectDayHours()->delete();

            $classroomSubjectDay->delete();
            // Delete the classroom_subject

            // Commit transaction
            DB::commit();

            return redirect()->route('classrooms.show', $classroom->id)
                ->with('success', 'Schedule deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error :' . $e->getMessage());
            // Rollback in case of error
            DB::rollback();

            return redirect()->route('classrooms.show', $classroom->id)
                ->with('error', 'Failed to delete schedule. ' . $e->getMessage());
        }
    }

    public function createStudent(Classroom $classroom)
    {
        if (Auth::user()->role == "admin") {
            $classroomStudentIds = ClassroomStudent::where('classroom_id', $classroom->id)
                ->whereNotIn('status', ['graduated', 'not_graduated'])
                ->pluck('student_id')
                ->toArray();

            $students = Student::whereNotIn('students.id', $classroomStudentIds)
                ->join('users', 'students.user_id', '=', 'users.id')
                ->orderBy('users.name')
                ->select('students.*')
                ->get();

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
