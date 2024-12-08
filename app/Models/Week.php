<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    //

    protected $table = "weeks";
    protected $fillable = ['classroom_subject_id', 'title', 'week_number'];

    public function classroomSubject()
    {
        return $this->belongsTo(ClassroomSubject::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
