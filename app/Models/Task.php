<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    //

    protected $table = "tasks";
    protected $fillable = ['week_id', 'title', 'description', 'due_date', 'file_path'];

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}
