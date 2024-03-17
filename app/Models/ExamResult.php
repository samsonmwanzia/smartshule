<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $fillable = [
        'school_id',
        'exam_id',
        'class_id',
        'student_id',

    ];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
