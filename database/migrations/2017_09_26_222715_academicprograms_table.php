<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcademicprogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('academicprograms', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->integer('faculty_id')->unsigned();
        $table->timestamps();

        $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academicprograms');
    }
}
