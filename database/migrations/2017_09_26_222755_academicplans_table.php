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

          $table->foreign('academicprogram_id')->references('id')->on('academicprograms')->onDelete('cascade');
          $table->foreign('state_id')->references('id')->on('states');
      });

      Schema::create('knowledgeareas', function (Blueprint $table) {
          $table->increments('id');
          $table->String('nombre');
          $table->integer('academicplan_id')->unsigned();
          $table->timestamps();

          $table->foreign('academicplan_id')->references('id')->on('academicplans')->onDelete('cascade');
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
