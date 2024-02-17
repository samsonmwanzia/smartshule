<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'school_id',
        'admission_no',
        'upi_number',
        'class_id',
        'class_section_id',
        'firstname',
        'lastname',
        'gender',
        'dob',
        'category_id',
        'religion',
        'disability',
        'birth_cert',
        'ethnicity',
        'admission_date',
        'photo',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'father_occupation',
        'mother_occupation',
        'guardian_name',
        'guardian_relation',
        'guardian_phone',
        'guardian_occupation',
        'guardian_address',
        'county',
        'sub_county',
        'location',
        'sub_location',
        'chief_name',
        'chief_phone',
        'near_school',
        'brief_history',
    ];

    public function form() {
        return $this->belongsTo(Form::class, 'class_id', 'id');
    }

    public function stream() {
        return $this->belongsTo(ClassSection::class, 'class_section_id', 'id');
    }

    public function residence() {
        return $this->belongsTo(County::class, 'county', 'id');
    }

    public function subcounty() {
        return $this->belongsTo(SubCounty::class, 'sub_county', 'constituency_name');
    }

    public function category() {
        return $this->belongsTo(StudentCategory::class, 'category_id', 'id');
    }
}
