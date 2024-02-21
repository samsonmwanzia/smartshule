<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'school_id',
        'subject_id',
        'book_title',
        'book_number',
        'quantity',
        'publisher',
        'price',
        'is_active',
    ];

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
