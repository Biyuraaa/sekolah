<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //

    protected $table = "appointments";

    protected $fillable = [
        "consultation_id",
        "user_id",
        "status",
        "purpose",
        "notes",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
