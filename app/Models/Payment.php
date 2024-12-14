<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //

    use HasFactory;

    protected $table = "payments";

    protected $fillable = [
        "parent_id",
        "amount",
        "purpose",
        "payment_method",
        "month",
        "year",
        "status",
        "proof_of_payment",
    ];

    public function parent()
    {
        return $this->belongsTo(ParentModel::class);
    }
}
