<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'nisn',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): HasOne
    {
        return $this->hasOne(ParentModel::class);
    }

    public function classroomStudents()
    {
        return $this->hasMany(ClassroomStudent::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_students', 'student_id', 'classroom_id')
            ->withPivot('status')
            ->withTimestamps();
    }


    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
