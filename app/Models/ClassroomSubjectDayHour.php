<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassroomSubjectDayHour extends Model
{
    //

    protected $table = "classroom_subject_day_hours";

    protected $fillable = [
        "classroom_subject_day_id",
        "schedule_hour_id"
    ];


    public function classroomSubjectDay()
    {
        return $this->belongsTo(ClassroomSubjectDay::class);
    }

    public function scheduleHour()
    {
        return $this->belongsTo(ScheduleHour::class);
    }
}
