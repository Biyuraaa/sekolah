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
}
