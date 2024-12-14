<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        if (Auth::user()->role == "admin") {
            $classrooms = Classroom::all();
            return view("dashboard.admin.index", compact(
                "classrooms"
            ));
        } else if (Auth::user()->role == "teacher") {
            return view("dashboard.teachers.index");
        } else if (Auth::user()->role == "parent") {
            return view("dashboard.parents.index");
        } else if (Auth::user()->role == "student") {
            return view("dashboard.students.index");
        }
    }
}
