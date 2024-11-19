<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /** @use HasFactory<\Database\Factories\PositionFactory> */
    use HasFactory;

    protected $table = "positions";

    protected $fillable = [
        "name",
        "base_salary",
        "allowance",
        "responsibilities",
    ];


    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
