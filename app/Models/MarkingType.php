<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkingType extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'is_active',
    ];
}
