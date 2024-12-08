<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomFactory> */
    use HasFactory;

    protected $table = 'classrooms';

    protected $fillable = [
        'year_level',
        'group_numbers',
        'batch_name',
        'academic_year',
        'teacher_id',
    ];


    public function classroomStudents()
    {
        return $this->hasMany(ClassroomStudent::class);
    }

    public function classroomSubjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'classroom_students', 'classroom_id', 'student_id')
            ->withPivot('status')
            ->withTimestamps();
    }



    public function examClassrooms()
    {
        return $this->hasMany(ExamClassroom::class);
    }

    // Classroom.php
    public function getTotalTeachingHoursAttribute()
    {
        return $this->classroomSubjects()
            ->join('classroom_subject_days', 'classroom_subjects.id', '=', 'classroom_subject_days.classroom_subject_id')
            ->join('classroom_subject_day_hours', 'classroom_subject_days.id', '=', 'classroom_subject_day_hours.classroom_subject_day_id')
            ->join('schedule_hours', 'classroom_subject_day_hours.schedule_hour_id', '=', 'schedule_hours.id')
            ->selectRaw('SUM(TIMESTAMPDIFF(MINUTE, schedule_hours.start_time, schedule_hours.end_time)) AS total_minutes')
            ->value('total_minutes') / 60; // Mengonversi menit ke jam
    }

    public function getTotalTeachingHoursForSubject(ClassroomSubject $classroomSubject)
    {
        return $this->classroomSubjects()
            ->where('subject_id', $classroomSubject->subject->id) // Filter berdasarkan ID mata pelajaran tertentu
            ->join('classroom_subject_days', 'classroom_subjects.id', '=', 'classroom_subject_days.classroom_subject_id')
            ->join('classroom_subject_day_hours', 'classroom_subject_days.id', '=', 'classroom_subject_day_hours.classroom_subject_day_id')
            ->join('schedule_hours', 'classroom_subject_day_hours.schedule_hour_id', '=', 'schedule_hours.id')
            ->selectRaw('SUM(TIMESTAMPDIFF(MINUTE, schedule_hours.start_time, schedule_hours.end_time)) AS total_minutes')
            ->value('total_minutes') / 60;
    }
}
