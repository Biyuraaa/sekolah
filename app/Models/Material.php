<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //

    protected $table = "materials";
    protected $fillable = ['week_id', 'title', 'description', 'file_path'];

    public function week()
    {
        return $this->belongsTo(Week::class);
    }
}
