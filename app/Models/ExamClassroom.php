<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamClassroom extends Model
{
    //

    protected $table = "exam_classrooms";

    protected $fillable = [
        "exam_id",
        "classroom_id",
        "teacher_id",
        "room",
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
