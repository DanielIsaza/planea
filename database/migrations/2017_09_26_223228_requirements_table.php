<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
          $table->increments('id');
          // Espacio academico principal
          $table->integer('academicspaceD_id')->unsigned();
          //Espacio academico que define el corequisito o prerequisito
          $table->integer('academicspace_id')->unsigned();
          // 1 para prerequisito 2 para corequisito
          $table->integer('tipo')->default(1);

          $table->timestamps();

          $table->foreign('academicspaceD_id')->references('id')->on('academicspaces')->onDelete('cascade');
          $table->foreign('academicspace_id')->references('id')->on('academicspaces')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirements');
    }
}
