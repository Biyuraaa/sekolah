<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model
{
    //

    protected $table = "student_scores";

    protected $fillable = [
        "classroom_student_id",
        "classroom_subject_id",
        "exam_id",
        "score",
        "notes"
    ];


    public function classroomStudent()
    {
        return $this->belongsTo(ClassroomStudent::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function classroomSubject()
    {
        return $this->belongsTo(ClassroomSubject::class);
    }
}
