<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    /** @use HasFactory<\Database\Factories\FacilityFactory> */
    use HasFactory;

    protected $table = "facilities";
    protected $fillable = [
        "name",
        "description",
        "location",
        "capacity",
        "status",
    ];

    public function facilitySchedules()
    {
        return $this->hasMany(FacilitySchedule::class);
    }
}
