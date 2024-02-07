<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admission_no')->unique();
            $table->string('upi_number')->unique()->nullable();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('class_section_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('dob');
            $table->string('category_id');
            $table->string('religion');
            $table->string('disability');
            $table->string('birth_cert');
            $table->string('ethnicity');
            $table->date('admission_date');
            $table->string('photo');
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('guardian_address')->nullable();
            $table->unsignedBigInteger('county');
            $table->string('sub_county');
            $table->string('location');
            $table->string('sub_location');
            $table->string('chief_name')->nullable();
            $table->string('chief_phone')->nullable();
            $table->string('near_school');
            $table->string('brief_history')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
