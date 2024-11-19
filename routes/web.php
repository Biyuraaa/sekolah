<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomSubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->prefix('/dashboard')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('teachers', TeacherController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('students', StudentController::class);
    Route::resource('positions', PositionController::class);
    Route::prefix('/classrooms/{classroom}/schedules')->group(function () {
        Route::get('/create', [ClassroomController::class, 'createSchedule'])->name('classrooms.schedules.create');
        Route::post('/', [ClassroomController::class, 'storeSchedule'])->name('classrooms.schedules.store');
        Route::get('/{classroomSubject}/edit', [ClassroomController::class, 'editSchedule'])->name('classrooms.schedules.edit');
        Route::put('/{classroomSubject}', [ClassroomController::class, 'updateSchedule'])->name('classrooms.schedules.update');
        Route::delete('/{classroomSubject}', [ClassroomController::class, 'deleteSchedule'])->name('classrooms.schedules.delete');
        Route::get('/{classroomSubject}', [ClassroomController::class, 'showSchedule'])->name('classrooms.schedules.show');
    });
    Route::prefix('/classrooms/{classroom}/students')->group(function () {
        Route::get('/create', [ClassroomController::class, 'createStudent'])->name('classrooms.students.create');
        Route::post('/', [ClassroomController::class, 'storeStudent'])->name('classrooms.students.store');
        Route::get('/{classroomStudents}/edit', [ClassroomController::class, 'editStudent'])->name('classrooms.students.edit');
        Route::put('/{classroomStudents}', [ClassroomController::class, 'updateStudent'])->name('classrooms.students.update');
        Route::delete('/{classroomStudents}', [ClassroomController::class, 'deleteStudent'])->name('classrooms.students.delete');
        Route::get('/{classroomStudents}', [ClassroomController::class, 'showStudent'])->name('classrooms.students.show');
    });
    Route::resource('classrooms', ClassroomController::class);
    Route::get('/classroomSubjects/getTeachers', [ClassroomSubjectController::class, 'getTeachers'])->name('classroomSubjects.getTeachers');
    Route::resource('classroom-subjects', ClassroomSubjectController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
