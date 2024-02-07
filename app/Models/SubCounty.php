<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCounty extends Model
{
    protected $fillable = [
        'county_id', 'constituency_name','ward', 'alias',
    ];
}
