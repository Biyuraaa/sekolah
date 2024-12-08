<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    use HasFactory;

    protected $table = "teachers";

    protected $fillable = [
        "user_id",
        "subject_id",
        "position_id",
        "status",
        "is_certified",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCertified($query)
    {
        return $query->where('is_certified', true);
    }

    public function classroomSubjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function examClassrooms()
    {
        return $this->hasMany(ExamClassroom::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
