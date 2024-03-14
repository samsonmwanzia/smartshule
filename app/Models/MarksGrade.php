<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksGrade extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'percentage_from',
        'percentage_to',
        'points',
        'marking_type',
        'is_active',
    ];

    public function markingType() {
        return $this->belongsTo(MarkingType::class, 'marking_type', 'id');
    }
}


