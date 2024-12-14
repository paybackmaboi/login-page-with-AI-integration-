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
       Schema::create('programs', function (Blueprint $table) {
           $table->id(); // This creates an unsignedBigInteger by default
           $table->string('pcode')->unique();
           $table->string('description');
           $table->string('type');
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
        Schema::dropIfExists('programs');
    }
};
