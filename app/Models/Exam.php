<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'note',
        'start_date',
        'end_date',
        'is_active',
    ];
}
