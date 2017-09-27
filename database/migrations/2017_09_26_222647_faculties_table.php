<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('faculties', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->integer('university_id')->unsigned();
        $table->timestamps();

        $table->foreign('university_id')->references('id')->on('universities');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}