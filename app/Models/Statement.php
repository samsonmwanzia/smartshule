<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $fillable = [
        'school_id','student_id', 'action','referenceCode', 'amount', 'description','processed',
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

}
