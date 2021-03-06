<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('objectives', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('descripcion')->nullable();
        $table->integer('peso')->unsigned();
        $table->integer('ability_id')->unsigned();
        $table->timestamps();

        $table->foreign('ability_id')->references('id')->on('abilities')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('objectives');
    }
}
