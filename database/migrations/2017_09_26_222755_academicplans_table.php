<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcademicplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicplans', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('perfil');
          $table->integer('academicprogram_id')->unsigned();
          $table->integer('state_id')->unsigned();
          $table->timestamps();

          $table->foreign('academicprogram_id')->references('id')->on('academicprograms');
          $table->foreign('state_id')->references('id')->on('states');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academicplans');
    }
}
