<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassroomSubjectDay extends Model
{
    //

    protected $table = "classroom_subject_days";

    protected $fillable = [
        "classroom_subject_id",
        "day"
    ];

    public function classroomSubject()
    {
        return $this->belongsTo(ClassroomSubject::class);
    }

    public function classroomSubjectDayHours()
    {
        return $this->hasMany(ClassroomSubjectDayHour::class);
    }
}
