<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitySchedule extends Model
{
    /** @use HasFactory<\Database\Factories\FacilityScheduleFactory> */
    use HasFactory;

    protected $table = "facility_schedules";

    protected $fillable = [
        "facility_id",
        "user_id",
        "date",
        "start",
        "end",
        "status",
        "purpose",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
