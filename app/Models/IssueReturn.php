<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueReturn extends Model
{
    protected $fillable = [
        'school_id',
        'issued_by',
        'book_id',
        'is_staff',
        'issued_to',
        'issued_date',
        'return_date',
        'is_returned',
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'issued_to', 'id');
    }

    public function staff() {
        return $this->belongsTo(User::class, 'issued_to', 'id');
    }

    public function book() {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
