<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcademicspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('academicspaces', function (Blueprint $table) {
        $table->increments('id');
        $table->string('codigo')->default('por diligenciar')->nullable();
        $table->string('nombre')->default('por diligenciar')->nullable();
        $table->string('numeroCreditos',2)->default(0)->nullable();
        $table->string('horasSemanales',10)->default(0)->nullable();
        $table->string('horasTeoricas',10)->default(0)->nullable();
        $table->string('horasPracticas',10)->default(0)->nullable();
        $table->string('horasTeoPract',10)->default(0)->nullable();
        $table->string('horasAsesorias',10)->default(0)->nullable();
        $table->string('horasIndependiente',10)->default(0)->nullable();
        $table->boolean('habilitable')->default(false)->nullable();
        $table->boolean('validable')->default(false)->nullable();
        $table->boolean('homologable')->default(false)->nullable();
        $table->text('nucleoTematico')->nullable();
        $table->text('justificacion')->nullable();
        $table->text('metodologia')->nullable();
        $table->text('evaluacion')->nullable();
        $table->text('descripcion')->nullable();
        $table->text('competenciasPropias')->nullable();
        $table->text('contenidoConceptual')->nullable();
        $table->text('contenidoProcedimental')->nullable();
        $table->text('contenidoActitudinal')->nullable();
        $table->text('procesosIntegrativos')->nullable();
        $table->text('unidades')->nullable();
        $table->text('bibliografia')->nullable();
        $table->text('recursosElectronicos')->nullable();
        $table->text('historialRevision')->nullable();
        $table->text('vigencia')->nullable();
        $table->text('responsables')->nullable();

        $table->integer('semester_id')->unsigned()->default(1)->nullable();
        $table->integer('academicplan_id')->unsigned()->default(1)->nullable();
        $table->integer('activityacademic_id')->unsigned()->default(1)->nullable();
        $table->integer('typeevaluation_id')->unsigned()->default(1)->nullable();
        $table->integer('typemethodology_id')->unsigned()->default(1)->nullable();
        $table->integer('nature_id')->unsigned()->default(1)->nullable();
        $table->integer('knowledgearea_id')->unsigned()->default(1)->nullable();

        $table->timestamps();

        $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
        $table->foreign('academicplan_id')->references('id')->on('academicplans')->onDelete('cascade');
        $table->foreign('activityacademic_id')->references('id')->on('activityacademics')->onDelete('cascade');
        $table->foreign('typeevaluation_id')->references('id')->on('typeevaluations')->onDelete('cascade');
        $table->foreign('typemethodology_id')->references('id')->on('typemethodologies')->onDelete('cascade');
        $table->foreign('nature_id')->references('id')->on('natures')->onDelete('cascade');
        $table->foreign('knowledgearea_id')->references('id')->on('knowledgeareas')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academicspaces');
    }
}
