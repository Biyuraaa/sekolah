<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $table = 'subjects';

    protected $fillable = ['name', 'description', 'credit_hours'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function classroomSubjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
