<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123qwe')
      ]);

      DB::table('universities')->insert([
        'nombre' => 'Universidad del Quindío',
      ]);

      DB::table('faculties')->insert([
        'nombre' => 'Ciencias Básicas',
        'university_id' => 1
      ]);

      DB::table('academicprograms')->insert([
        'nombre' => 'CIDBA',
        'faculty_id' => 1
      ]);

      DB::table('semesters')->insert([[
        'nombre'=>'Semestre 1',
      ],[
        'nombre'=>'Semestre 2',
      ],[
        'nombre'=>'Semestre 3',
      ],[
        'nombre'=>'Semestre 4',
      ],[
        'nombre'=>'Semestre 5',
      ],[
        'nombre'=>'Semestre 6',
      ],[
        'nombre'=>'Semestre 7',
      ],[
        'nombre'=>'Semestre 8',
      ],[
        'nombre'=>'Semestre 9',
      ],[
        'nombre'=>'Semestre 10',
      ]]);

      DB::table('states')->insert([[
        'nombre'=>'Oferta',
      ],[
        'nombre'=>'Vigente',
      ],[
        'nombre'=>'Retirado',
        ]]);

      DB::table('academicplans')->insert([
        'nombre'=>'plan 1a',
        'perfil'=>'Esta es la descripcion del perfil',
        'academicprogram_id'=>1,
        'state_id'=>1,
      ]);

      DB::table('natures')->insert([
        'nombre' => 'Esta es la naturaleza 1',
      ]);

      DB::table('typeevaluations')->insert([
        'nombre'=>'Esta es la evaluacioin 1',
      ]);

      DB::table('knowledgeareas')->insert([
        'nombre'=>'area de conocimiento 1',
        'academicplan_id'=>1,
      ]);

      DB::table('activityacademics')->insert([
        'nombre'=>'esta es una actividad acaddemica',
      ]);

      DB::table('typeabilities')->insert([
        'nombre'=>'tipo de habilidad 1',
      ]);

      DB::table('abilities')->insert([
        ['nombre'=>'habilidad 1',
        'peso'=>10,
        'typeability_id'=>1,
        'academicplan_id'=>1,],
        ['nombre'=>'habilidad 2',
         'peso'=>11,
         'typeability_id'=>1,
         'academicplan_id'=>1,]
      ]);

      DB::table('objectives')->insert([[
        'nombre'=>'objetivo 1',
        'descripcion'=>'esta es la descripcion',
        'peso'=>8,
        'ability_id'=>1
      ],[
        'nombre'=>'objetivo 2',
        'descripcion'=>'esta es la descripcion',
        'peso'=>6,
        'ability_id'=>1
      ],[
      'nombre'=>'objetivo 3',
      'descripcion'=>'esta es la descripcion',
      'peso'=>7,
      'ability_id'=>2
    ],[
      'nombre'=>'objetivo 4',
      'descripcion'=>'esta es la descripcion',
      'peso'=>4,
      'ability_id'=>2
      ]]);

      DB::table('typemethodologies')->insert([
        'nombre'=>'Esta es la metodologia 1',
      ]);

      DB::table('academicspaces')->insert([[
        'codigo'=>'1234',
        'nombre'=>'materia 1',
        'numeroCreditos'=>'2',
        'horasTeoricas'=>'12',
        'horasPracticas'=>'10',
        'horasTeoPract'=>'8',
        'horasAsesorias'=>'10',
        'horasIndependiente'=>'9',
        'habilitable'=>1,
        'homologable'=>0,
        'validable' => 1,
        'nucleoTematico'=>'este es el nucleo tematico',
        'justificacion'=>'esta es la justificacion',
        'metodologia'=>'esta es la metodologia',
        'evaluacion'=>'esta es la evaluacion',
        'descripcion'=>'esta es la descripcion',
        'contenidoConceptual'=>'este es el contenido conceptual',
        'contenidoProcedimental'=>'este es el contenido procedimental',
        'contenidoActitudinal'=>'este es el contenido actitudinal',
        'procesosIntegrativos'=>'estos son los procesos integrativos',
        'unidades'=>'estas son las unidades',
        'semester_id'=>1,
        'academicplan_id'=>1,
        'activityacademic_id'=>1,
        'typeevaluation_id'=>1,
        'typemethodology_id'=>1,
        'nature_id'=>1,
        'knowledgearea_id'=>1,
      ],[
        'codigo'=>'4321',
        'nombre'=>'materia 2',
        'numeroCreditos'=>'2',
        'horasTeoricas'=>'12',
        'horasPracticas'=>'10',
        'horasTeoPract'=>'8',
        'horasAsesorias'=>'10',
        'horasIndependiente'=>'9',
        'habilitable'=>1,
        'homologable'=>0,
        'validable'=>1,
        'nucleoTematico'=>'este es el nucleo tematico',
        'justificacion'=>'esta es la justificacion',
        'metodologia'=>'esta es la metodologia',
        'evaluacion'=>'esta es la evaluacion',
        'descripcion'=>'esta es la descripcion',
        'contenidoConceptual'=>'este es el contenido conceptual',
        'contenidoProcedimental'=>'este es el contenido procedimental',
        'contenidoActitudinal'=>'este es el contenido actitudinal',
        'procesosIntegrativos'=>'estos son los procesos integrativos',
        'unidades'=>'estas son las unidades',
        'semester_id'=>1,
        'academicplan_id'=>1,
        'activityacademic_id'=>1,
        'typeevaluation_id'=>1,
        'typemethodology_id'=>1,
        'nature_id'=>1,
        'knowledgearea_id'=>1,
        ]]);

    DB::table('objectiveespaces')->insert([
        [
          'academicspace_id'=>1,
          'objective_id'=>1,
          'peso'=>5
        ],[
          'academicspace_id'=>1,
          'objective_id'=>2,
          'peso'=>7
        ],[
          'academicspace_id'=>2,
          'objective_id'=>3,
          'peso'=>9
        ],[
          'academicspace_id'=>2,
          'objective_id'=>4,
          'peso'=>2
        ]
    ]);
    }
}
