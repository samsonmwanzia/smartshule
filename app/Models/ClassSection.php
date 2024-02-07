<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $fillable = [
        'class_id', 'name',
    ];

    public function forms() {
        return $this->belongsTo(Form::class, 'class_id', 'id');
    }
}
