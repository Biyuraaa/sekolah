<?php

namespace App\Http\Controllers;

use App\Models\Week;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWeekRequest;
use App\Http\Requests\UpdateWeekRequest;
use App\Models\Absence;
use App\Models\ClassroomSubject;
use App\Models\Material;
use App\Models\Student;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClassroomSubject $classroomSubject)
    {
        $weeks = $classroomSubject->weeks;
        return view('weeks.index', compact('weeks', 'classroomSubject'));
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
    public function store(StoreWeekRequest $request, ClassroomSubject $classroomSubject)
    {
        $validatedData = $request->validated();

        try {
            DB::transaction(function () use ($validatedData, $classroomSubject) {
                $week = $classroomSubject->weeks()->create($validatedData);

                $students = DB::table('classroom_students')
                    ->join('students', 'classroom_students.student_id', '=', 'students.id')
                    ->where('classroom_students.classroom_id', $classroomSubject->classroom_id)
                    ->where('classroom_students.status', 'ongoing')
                    ->select('students.id as student_id')
                    ->get();

                $absences = $students->map(fn($student) => [
                    'student_id' => $student->student_id,
                    'week_id' => $week->id,
                    'status' => 'absent',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('absences')->insert($absences->toArray());
            });

            return redirect()->route('classroomSubjects.show', $classroomSubject)
                ->with('success', 'Week created successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->route('classroomSubjects.show', $classroomSubject)
                ->with('error', 'Failed to create week. Please try again.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Week $week)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Week $week)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeekRequest $request, Week $week)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Week $week)
    {
        //
    }

    public function createMaterial(ClassroomSubject $classroomSubject, Week $week)
    {
        return view('dashboard.teachers.classroomSubjects.weeks.materials.create', compact('week', 'classroomSubject'));
    }
    public function editMaterial(ClassroomSubject $classroomSubject, Week $week, Material $material)
    {
        return view('dashboard.teachers.classroomSubjects.weeks.materials.edit', compact(
            'week',
            'classroomSubject',
            'material'
        ));
    }

    public function storeMaterial(Request $request, ClassroomSubject $classroomSubject, Week $week)
    {
        // Validasi input
        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "file" => "nullable|file"
        ]);

        try {
            $fileName  = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');

                $fileName = Str::slug($request->input("title"), '_') . '.' . $file->getClientOriginalExtension();

                $filePath = $file->storeAs('files/materials', $fileName, 'public');
            }
            $week->materials()->create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $fileName,
            ]);
            return redirect()
                ->route('classroomSubjects.show', $classroomSubject)
                ->with('success', 'Materi berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('weeks.materials.create', [$classroomSubject, $week])->with('error', $e->getMessage());
        }
    }


    public function updateMaterial(Request $request, ClassroomSubject $classroomSubject, Week $week, Material $material)
    {
        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "file" => "nullable|file"
        ]);

        try {
            $material->title = $request->input("title");
            $material->description = $request->input("description");

            if ($request->hasFile("file")) {
                $uploadedFile = $request->file("file");
                if ($material->file_path && Storage::exists('files/materials/' . $material->file_path)) {
                    Storage::delete('files/materials/' . $material->file_path);
                }
                $newFileName = Str::slug($request->input("title"), '_') . '.' . $uploadedFile->getClientOriginalExtension();

                $uploadedFile->storeAs('files/materials', $newFileName, 'public');
                $material->file_path = $newFileName;
            }
            $material->save();

            return redirect()->route('classroomSubjects.show', $classroomSubject)->with('success', 'Material updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('classroomSubjects.edit', [$classroomSubject, $week, $material])->with('error', 'Failed to update material. ' . $e->getMessage());
        }
    }

    public function destroyMaterial(ClassroomSubject $classroomSubject, Week $week, Material $material)
    {
        try {
            $material->delete();
            return redirect()->route('classroomSubjects.show', $classroomSubject)->with('success', ' Material deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('classroomSubjects.show', $classroomSubject)->with('error', value: 'Failed to delete material. ' . $e->getMessage());
        }
    }



    public function createTask(ClassroomSubject $classroomSubject, Week $week)
    {
        return view('dashboard.teachers.classroomSubjects.weeks.tasks.create', compact(
            'week',
            'classroomSubject'
        ));
    }

    public function storeTask(Request $request, ClassroomSubject $classroomSubject, Week $week)
    {
        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "file" => "nullable|file",
            "due_date_input" => "required|date",
            "due_time_input" => "required|date_format:H:i",
        ]);

        try {
            $fileName = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = Str::slug($request->input("title"), '_') . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('files/tasks', $fileName, 'public');
            }

            $dueDate = Carbon::createFromFormat(
                'Y-m-d H:i',
                $request->due_date_input . ' ' . $request->due_time_input
            );

            DB::transaction(function () use ($request, $week, $fileName, $dueDate) {
                $task = $week->tasks()->create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'file_path' => $fileName,
                    "due_date" => $dueDate,
                ]);

                $students = $week->classroomSubject->classroom->students;

                $submissions = $students->map(function ($student) use ($task) {
                    return [
                        'task_id' => $task->id,
                        'student_id' => $student->id,
                        'status' => 'not_submitted',
                        'grade' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                });

                DB::table('submissions')->insert($submissions->toArray());
            });

            return redirect()
                ->route('classroomSubjects.show', $classroomSubject)
                ->with('success', 'Tugas berhasil disimpan dan submissions telah dibuat.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()
                ->route('weeks.tasks.create', [$classroomSubject, $week])
                ->with('error', 'Terjadi kesalahan saat menyimpan tugas. Silakan coba lagi.');
        }
    }


    public function EditTask(ClassroomSubject $classroomSubject, Week $week, Task $task)
    {
        return view('dashboard.teachers.classroomSubjects.weeks.tasks.edit', compact(
            'week',
            'classroomSubject',
            'task'
        ));
    }

    public function updateTask(Request $request, ClassroomSubject $classroomSubject, Week $week, Task $task)
    {
        $request->validate([
            "title" => "required|string",
            "description" => "nullable|string",
            "file" => "nullable|file|max:10240", // Maksimum file size 10MB
            "due_date_input" => "required|date",
            "due_time_input" => "required|date_format:H:i",
        ]);

        try {
            $fileName = $task->file_path;
            if ($request->hasFile('file')) {
                $file = $request->file('file');

                if ($task->file_path && Storage::disk('public')->exists('files/tasks/' . $task->file_path)) {
                    Storage::disk('public')->delete('files/tasks/' . $task->file_path);
                }

                $fileName = Str::slug($request->input("title"), '_') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('files/tasks', $fileName, 'public');
            }

            $dueDate = Carbon::createFromFormat(
                'Y-m-d H:i',
                $request->due_date_input . ' ' . $request->due_time_input
            );

            // Update the task
            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $fileName,
                "due_date" => $dueDate,
            ]);

            return redirect()
                ->route('classroomSubjects.show', $classroomSubject)
                ->with('success', 'Tugas berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()
                ->route('weeks.tasks.edit', [$classroomSubject, $week, $task])
                ->with('error', 'Terjadi kesalahan saat memperbarui tugas. Silakan coba lagi.');
        }
    }

    public function destroyTask(ClassroomSubject $classroomSubject, Week $week, Task $task)
    {
        try {
            // Check if the task has an associated file and delete it
            if ($task->file_path && Storage::disk('public')->exists('files/tasks/' . $task->file_path)) {
                Storage::disk('public')->delete('files/tasks/' . $task->file_path);
            }

            // Delete the task
            $task->delete();

            return redirect()
                ->route('classroomSubjects.show.', [$classroomSubject])
                ->with('success', 'Tugas berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()
                ->route('classroomSubjects.show', [$classroomSubject])
                ->with('error', 'Terjadi kesalahan saat menghapus tugas. Silakan coba lagi.');
        }
    }

    public function showTask(ClassroomSubject $classroomSubject, Week $week, Task $task)
    {
        $students = $task->submissions->map(function ($submission) {
            return $submission->student;
        });

        $submissions = $task->submissions;

        return view('dashboard.teachers.classroomSubjects.weeks.tasks.show', compact(
            'week',
            'classroomSubject',
            'task',
            "students",
            "submissions"
        ));
    }

    public function showAbsences(ClassroomSubject $classroomSubject, Week $week)
    {
        // Ambil data absensi dengan relasi student dan user
        $absences = Absence::with(['student.user'])->where('week_id', $week->id)->get();


        // Kirim data ke view
        return view('dashboard.teachers.classroomSubjects.weeks.absences.show', [
            'classroomSubject' => $classroomSubject,
            'week' => $week,
            'absences' => $absences,
        ]);
    }
}
