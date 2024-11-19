<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = Subject::paginate(10);
        $totalSubjects = Subject::count();
        $totalCreditHours = Subject::sum('credit_hours');
        $totalTeachers = Teacher::count(); // Menghitung jumlah total guru.
        $averageCreditHours = number_format(Subject::avg('credit_hours'), 1);
        $creditHoursDistribution = Subject::select('credit_hours', DB::raw('count(*) as count'))
            ->groupBy('credit_hours')
            ->get();

        return view("dashboard.admin.subjects.index", compact(
            "subjects",
            "totalSubjects",
            "totalCreditHours",
            "totalTeachers",
            "averageCreditHours",
            "creditHoursDistribution"
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::user()->role == "admin") {
            return view("dashboard.admin.subjects.create");
        } else {
            return redirect()->route("dashboard");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        //
        $request->validated();

        try {
            DB::beginTransaction();
            Subject::create($request->all());
            DB::commit();
            return redirect()->route("subjects.index")->with("success", "Mata pelajaran berhasil ditambahkan.");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("subjects.index")->with("error", "Mata pelajaran gagal ditambahkan.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
        if (Auth::user()->role == "admin") {
            return view("dashboard.admin.subjects.show", compact("subject"));
        } else {
            return redirect()->route("dashboard");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
        if (Auth::user()->role == "admin") {
            return view("dashboard.admin.subjects.edit", compact("subject"));
        } else {
            return redirect()->route("dashboard");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        //
        $request->validated();

        try {
            DB::beginTransaction();
            $subject->update($request->all());
            DB::commit();
            return redirect()->route("subjects.index")->with("success", "Mata pelajaran berhasil diperbarui.");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("subjects.index")->with("error", "Mata pelajaran gagal diperbarui.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();

        return redirect()->route("subjects.index")->with("success", "Mata pelajaran berhasil dihapus.");
    }
}
