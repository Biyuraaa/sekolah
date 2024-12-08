<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    //

    protected $table = "consultations";

    protected $fillable = [
        "teacher_id",
        "date",
        "start_time",
        "end_time",
        "status",
        "max_appointments",
        "location",
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
