<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //

    protected $fillable = [
        "task_id",
        "student_id",
        "file_path",
        "status",
        "score",
        "grade",
        "notes",
        "submitted_at",
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
