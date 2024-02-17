<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'school_id',
        'expense_head_id',
        'expense_name',
        'amount',
        'date',
    ];
    public function expense_head() {
        return $this->belongsTo(ExpenseHead::class, 'expense_head_id', 'id');
    }
}
