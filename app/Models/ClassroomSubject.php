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
        'day',
        'start_time',
        'end_time',
        'credit',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

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
}
