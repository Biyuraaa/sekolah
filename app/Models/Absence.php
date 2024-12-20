<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    //
    protected $table = "absences";

    protected $fillable = [
        "week_id",
        "student_id",
        "status",
    ];

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
