<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FacilityScheduleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamClassroomController;
use App\Http\Controllers\ClassroomSubjectController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GradeExamController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\WeekController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::middleware(['auth', 'verified'])->prefix('/dashboard')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('teachers', TeacherController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('students', StudentController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('positions', PositionController::class);
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('/attendances/{classroomSubject}', [AttendanceController::class, 'show'])->name('attendances.show');
    Route::resource('facilities', FacilityController::class);
    Route::put('consultations/{consultation}/request', [ConsultationController::class, 'request'])->name('consultations.request');
    Route::get('consultations/request', [ConsultationController::class, 'showRequest'])->name('consultations.showRequest');
    Route::resource('consultations', ConsultationController::class);
    Route::put('appoinments/{appointment}/confirm', [ConsultationController::class, 'confirm'])->name('appointments.confirm');
    Route::resource('appointments', AppointmentController::class);
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::post('/payments/{payment}/update-status', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');
    Route::resource('facilitySchedules', FacilityScheduleController::class);
    Route::prefix('/classrooms/{classroom}/schedules')->group(function () {
        Route::get('/create', [ClassroomController::class, 'createSchedule'])->name('classrooms.schedules.create');
        Route::post('/', [ClassroomController::class, 'storeSchedule'])->name('classrooms.schedules.store');
        Route::get('/{classroomSubject}/days/{classroomSubjectDay}/edit', [ClassroomController::class, 'editSchedule'])->name('classrooms.schedules.edit');
        Route::put('/{classroomSubject}/days/{classroomSubjectDay}', [ClassroomController::class, 'updateSchedule'])->name('classrooms.schedules.update');
        Route::delete('/{classroomSubjectDay}', [ClassroomController::class, 'deleteSchedule'])->name('classrooms.schedules.delete');
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

    Route::post('/update-absence-status/{studentId}/{weekId}', [AbsenceController::class, 'updateAbsenceStatus']);

    Route::patch('/submissions/{submission}/grade', [SubmissionController::class, 'grade'])->name('submissions.grade');
    Route::patch('/submissions/{submission}/submit', [SubmissionController::class, 'submit'])->name('submissions.submit');
    Route::resource('submissions', SubmissionController::class);
    Route::resource('examClassrooms', ExamClassroomController::class);

    Route::get('/gradeExams', [GradeExamController::class, 'index'])->name('gradeExams.index');
    Route::get('/gradeExams/{exam}/subjectClassrooms/{classroomSubject}', [GradeExamController::class, 'show'])->name('gradeExams.show');
    Route::post('/gradeExams/{studentScore}', [GradeExamController::class, 'update'])->name('gradeExams.update');


    Route::prefix('/classroomSubjects/{classroomSubject}/')->group(function () {
        Route::get('/task/{task}/assign', [ClassroomSubjectController::class, 'assign'])->name('classroomSubjects.tasks.assign');
        Route::get('/weeks/{week}/absences', [WeekController::class, 'showAbsences'])->name('weeks.absences.show');
        Route::patch('/weeks/{week}/absences/{absence}', [WeekController::class, 'updateAbsences'])->name('weeks.absences.update');
        Route::get('/weeks/{week}/createMaterial', [WeekController::class, 'createMaterial'])->name('weeks.materials.create');
        Route::get('/weeks/{week}/materials/{material}/edit', [WeekController::class, 'editMaterial'])->name('weeks.materials.edit');
        Route::put('/weeks/{week}/materials/{material}', [WeekController::class, 'updateMaterial'])->name('weeks.materials.update');
        Route::delete('/weeks/{week}/materials/{material}', [WeekController::class, 'destroyMaterial'])->name('weeks.materials.destroy');
        Route::post('/weeks/{week}/materials', [WeekController::class, 'storeMaterial'])->name('weeks.materials.store');
        Route::get('/weeks/{week}/createTask', [WeekController::class, 'createTask'])->name('weeks.tasks.create');
        Route::post('/weeks/{week}/tasks', [WeekController::class, 'storeTask'])->name('weeks.tasks.store');
        Route::get('/weeks/{week}/tasks/{task}/edit', [WeekController::class, 'editTask'])->name('weeks.tasks.edit');
        Route::get('/weeks/{week}/tasks/{task}', [WeekController::class, 'showTask'])->name('weeks.tasks.show');
        Route::put('/weeks/{week}/tasks/{task}', [WeekController::class, 'updateTask'])->name('weeks.tasks.update');
        Route::delete('/weeks/{week}/tasks/{task}', [WeekController::class, 'destroyTask'])->name('weeks.tasks.destroy');
        Route::resource('weeks', controller: WeekController::class);
    });
    Route::prefix('exams/{exam}/examClassrooms')->group(function () {
        Route::get('/create', [ExamController::class, 'createExamClassroom'])->name('exams.examClassrooms.create');
        Route::post('/', [ExamController::class, 'storeExamClassroom'])->name('exams.examClassrooms.store');
        Route::get('/{examClassroom}/edit', [ExamController::class, 'editExamClassroom'])->name('exams.examClassrooms.edit');
        Route::put('/{examClassroom}', [ExamController::class, 'updateExamClassroom'])->name('exams.examClassrooms.update');
        Route::get('/{examClassroom}', [ExamController::class, 'showExamClassroom'])->name('exams.examClassrooms.show');
        Route::delete('/{examClassroom}', [ExamController::class, 'deleteExamClassroom'])->name('exams.examClassrooms.destroy');
    });

    Route::resource('classrooms', ClassroomController::class);
    Route::get('/classroomSubjects/getTeachers', [ClassroomSubjectController::class, 'getTeachers'])->name('classroomSubjects.getTeachers');
    Route::resource('classroomSubjects', ClassroomSubjectController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
