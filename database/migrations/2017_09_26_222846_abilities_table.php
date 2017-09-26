<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('abilities', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->integer('peso')->unsigned();
        $table->integer('typeability_id')->unsigned();
        $table->integer('academicplan_id')->unsigned();

        $table->timestamps();

        $table->foreign('typeability_id')->references('id')->on('typeabilities');
        $table->foreign('academicplan_id')->references('id')->on('academicplans');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abilities');
    }
}
