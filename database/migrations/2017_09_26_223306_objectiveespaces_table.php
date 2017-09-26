<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjectiveespacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('objectiveespaces', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('academicspace_id')->unsigned();
        $table->integer('objective_id')->unsigned();
        $table->integer('peso')->unsigned();
        $table->timestamps();

        $table->foreign('academicspace_id')->references('id')->on('academicspaces');
        $table->foreign('objective_id')->references('id')->on('objectives');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objectiveEspaces');
    }
}
