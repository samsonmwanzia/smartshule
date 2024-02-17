<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    protected $fillable = [
        'school_id',
        'fee_type',
        'total_amount'
    ];
}
