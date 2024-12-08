<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomSubject extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomSubjectFactory> */
    use HasFactory;

    protected $table = 'classroom_subjects';

    protected $fillable = [
        'classroom_id',
        'subject_id',
        'teacher_id',
        'status',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classroomSubjectDays()
    {
        return $this->hasMany(ClassroomSubjectDay::class);
    }

    public function studentScores()
    {
        return $this->hasMany(StudentScore::class);
    }

    public function weeks()
    {
        return $this->hasMany(Week::class);
    }
}
