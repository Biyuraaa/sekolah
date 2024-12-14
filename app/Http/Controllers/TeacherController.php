<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role == "admin") {
            // Mendapatkan semua data guru
            $teachers = Teacher::paginate(10);

            // Menghitung total guru
            $totalTeachers = Teacher::count();

            // Menghitung jumlah guru aktif dan bersertifikasi
            $activeTeachers = Teacher::active()->count();

            // Menghitung total mata pelajaran
            $totalSubjects = Subject::count();

            // Mengirim data ke view
            return view("dashboard.admin.teachers.index", compact(
                "teachers",
                "totalTeachers",
                "activeTeachers",
                "totalSubjects"
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
            // Mendapatkan semua data mata pelajaran
            $subjects = Subject::all();
            $positions = Position::all();

            // Mengirim data ke view
            return view("dashboard.admin.teachers.create", compact("subjects", "positions"));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        //

        $request->validated();

        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('images/users', $imageName, 'public');
            }

            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "phone_number" => $request->phone_number,
                "date_of_birth" => $request->date_of_birth,
                "address" => $request->address,
                "image" => $imageName,
                'role' => 'teacher',
            ]);

            Teacher::create([
                "user_id" => $user->id,
                "subject_id" => $request->subject_id,
                "status" => "active",
                "position_id" => $request->position_id,
            ]);

            return redirect()->route("teachers.index")->with("success", "Guru berhasil ditambahkan");
        } catch (\Exception $e) {
            return redirect()->route("teachers.create")->with("error", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
        return view("dashboard.admin.teachers.show", compact("teacher"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
        $subjects = Subject::all();
        $positions = Position::all();
        return view("dashboard.admin.teachers.edit", compact("teacher", "subjects", "positions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
