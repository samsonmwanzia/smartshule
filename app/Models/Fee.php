<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'school_id',
        'student_id',
        'fee_amount',
        'tuition_amount',
        'is_cleared',
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
