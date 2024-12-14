<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_students_table.php
public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id('student_id');
        $table->string('student_no')->unique();
        $table->string('last_name');
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->unsignedBigInteger('program_id');
        $table->unsignedBigInteger('section_id');
        $table->string('address')->nullable();
        $table->string('contact_no')->nullable();
        $table->string('photo_url')->nullable();
        $table->timestamps();

        $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
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
};
