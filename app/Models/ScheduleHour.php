<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleHour extends Model
{
    //
    protected $table = "schedule_hours";

    protected $fillable = [
        "hour_number",
        "start_time",
        "end_time"
    ];

    public function classroomDaySubjectHours()
    {
        return $this->hasMany(ClassroomSubjectDayHour::class, "schedule_hour_id");
    }
}
