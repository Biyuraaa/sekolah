<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /** @use HasFactory<\Database\Factories\ExamFactory> */
    use HasFactory;

    protected $fillable = [
        "subject_id",
        "type",
        "date",
        "start_time",
        "end_time",
        "academic_year",
        "status"
    ];

    protected $table = "exams";

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function examClassrooms()
    {
        return $this->hasMany(ExamClassroom::class);
    }

    public function studentScores()
    {
        return $this->hasMany(StudentScore::class);
    }
}
