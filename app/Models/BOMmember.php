<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOMmember extends Model
{
    protected $fillable = [
        'school_id',
        'category_id',
        'name',
        'gender',
        'age',
        'academic_qualification',
        'current_employment',
        'is_active',
    ];
}
