<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'school_id',
        'item_category_id',
        'name',
        'description',
        'quantity',
        'price',
        'is_active',
    ];

    public function category() {
        return $this->belongsTo(ItemCategory::class, 'item_category_id', 'id');
    }
}
