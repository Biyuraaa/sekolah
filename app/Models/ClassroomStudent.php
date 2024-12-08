<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomStudent extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomStudentFactory> */
    use HasFactory;

    protected $table = "classroom_students";

    public $timestamps = false;

    protected $fillable = [
        "classroom_id",
        "student_id",
        "status",
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function studentScores()
    {
        return $this->hasMany(StudentScore::class);
    }
}
