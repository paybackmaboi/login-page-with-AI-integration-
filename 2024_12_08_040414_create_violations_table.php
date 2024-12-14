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
    public function up()
{
    Schema::create('violations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('academic_year_id');
        $table->string('violation');
        $table->string('sanction');
        $table->string('type');
        $table->date('date');
        $table->timestamps();

        $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        $table->foreign('academic_year_id')->references('id')->on('academic_years')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('violations');
    }
};
