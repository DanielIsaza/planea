<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Programusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('programusers', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('academicprogram_id')->unsigned();
        $table->integer('user_id')->unsigned();
        $table->timestamps();

        $table->foreign('academicprogram_id')->references('id')->on('academicprograms')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programusers');
    }
}
