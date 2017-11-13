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

      DB::table('permissions')->insert([
        [
          'name'=> 'permisos.read',
          'slug' => 'permisos.read',
          'description' => 'Ver los permisos disponibles'
        ],[
          'name'=> 'mensaje.update',
          'slug' => 'mensaje.update',
          'description' => 'Modificar mensaje de bienvenida'
        ],[
          'name'=> 'archivos.upload',
          'slug' => 'archivos.upload',
          'description' => 'Subir archivos al servidor'
        ],[
          'name'=> 'tipohabilidad.read',
          'slug' => 'tipohabilidad.read',
          'description' => 'Crear tipo de habilidad'
        ],[
          'name'=> 'tipohabilidad.delete',
          'slug' => 'tipohabilidad.delete',
          'description' => 'Crear tipo de habilidad'
        ],[
          'name'=> 'tipohabilidad.update',
          'slug' => 'tipohabilidad.update',
          'description' => 'Crear tipo de habilidad'
        ],[
          'name'=> 'tipohabilidad.create',
          'slug' => 'tipohabilidad.create',
          'description' => 'Crear tipo de habilidad'
        ],[
          'name'=> 'usuario.create',
          'slug' => 'usuario.create',
          'description' => 'Crear usuario'
        ],[
          'name'=> 'usuario.update',
          'slug' => 'usuario.update',
          'description' => 'Actualizar usuario'
        ],[
          'name'=> 'usuario.delete',
          'slug' => 'usuario.delete',
          'description' => 'Eliminar usuario'
        ],[
          'name'=> 'usuario.read',
          'slug' => 'usuario.read',
          'description' => 'Ver usuario'
        ],[
          'name'=> 'roles.create',
          'slug' => 'roles.create',
          'description' => 'Crear roles'
        ],[
          'name'=> 'roles.update',
          'slug' => 'roles.update',
          'description' => 'Actualizar roles'
        ],[
          'name'=> 'roles.delete',
          'slug' => 'roles.delete',
          'description' => 'Eliminar roles'
        ],[
          'name'=> 'roles.read',
          'slug' => 'roles.read',
          'description' => 'Ver roles'
        ],[
          'name'=> 'universidades.create',
          'slug' => 'universidades.create',
          'description' => 'Crear universidades'
        ],[
          'name'=> 'universidades.update',
          'slug' => 'universidades.update',
          'description' => 'Actualizar universidades'
        ],[
          'name'=> 'universidades.delete',
          'slug' => 'universidades.delete',
          'description' => 'Eliminar universidades'
        ],[
          'name'=> 'universidades.read',
          'slug' => 'universidades.read',
          'description' => 'Ver universidades'
        ],[
          'name'=> 'facultades.create',
          'slug' => 'facultades.create',
          'description' => 'Crear facultades'
        ],[
          'name'=> 'facultades.update',
          'slug' => 'facultades.update',
          'description' => 'Actualizar facultades'
        ],[
          'name'=> 'facultades.delete',
          'slug' => 'facultades.delete',
          'description' => 'Eliminar facultades'
        ],[
          'name'=> 'facultades.read',
          'slug' => 'facultades.read',
          'description' => 'Ver facultades'
        ],[
          'name'=> 'programas.create',
          'slug' => 'programas.create',
          'description' => 'Crear programas académicos'
        ],[
          'name'=> 'programas.update',
          'slug' => 'programas.update',
          'description' => 'Actualizar programas académicos'
        ],[
          'name'=> 'programas.delete',
          'slug' => 'programas.delete',
          'description' => 'Eliminar programas académicos'
        ],[
          'name'=> 'programas.read',
          'slug' => 'programas.read',
          'description' => 'Ver programas académicos'
        ],[
          'name'=> 'planes.create',
          'slug' => 'planes.create',
          'description' => 'Crear planes académicos'
        ],[
          'name'=> 'planes.update',
          'slug' => 'planes.update',
          'description' => 'Actualizar planes académicos'
        ],[
          'name'=> 'planes.delete',
          'slug' => 'planes.delete',
          'description' => 'Eliminar planes académicos'
        ],[
          'name'=> 'planes.read',
          'slug' => 'planes.read',
          'description' => 'Ver planes académicos'
        ],[
          'name'=> 'espacios.create',
          'slug' => 'espacios.create',
          'description' => 'Crear espacios académicos'
        ],[
          'name'=> 'espacios.update',
          'slug' => 'espacios.update',
          'description' => 'Actualizar espacios académicos'
        ],[
          'name'=> 'espacios.delete',
          'slug' => 'espacios.delete',
          'description' => 'Eliminar espacios académicos'
        ],[
          'name'=> 'espacios.read',
          'slug' => 'espacios.read',
          'description' => 'Ver espacios académicos'
        ],[
          'name'=> 'areas.create',
          'slug' => 'areas.create',
          'description' => 'Crear áreas de conocimiento'
        ],[
          'name'=> 'areas.update',
          'slug' => 'areas.update',
          'description' => 'Actualizar áreas de conocimiento'
        ],[
          'name'=> 'areas.delete',
          'slug' => 'areas.delete',
          'description' => 'Eliminar áreas de conocimiento'
        ],[
          'name'=> 'areas.read',
          'slug' => 'areas.read',
          'description' => 'Ver áreas de conocimiento'
        ],[
          'name'=> 'semestres.create',
          'slug' => 'semestres.create',
          'description' => 'Crear semestres'
        ],[
          'name'=> 'semestres.update',
          'slug' => 'semestres.update',
          'description' => 'Actualizar semestres'
        ],[
          'name'=> 'semestres.delete',
          'slug' => 'semestres.delete',
          'description' => 'Eliminar semestres'
        ],[
          'name'=> 'semestres.read',
          'slug' => 'semestres.read',
          'description' => 'Ver semestres'
        ],[
          'name'=> 'actividadesacademicas.create',
          'slug' => 'actividadesacademicas.create',
          'description' => 'Crear actividades académicas'
        ],[
          'name'=> 'actividadesacademicas.update',
          'slug' => 'actividadesacademicas.update',
          'description' => 'Actualizar actividades académicas'
        ],[
          'name'=> 'actividadesacademicas.delete',
          'slug' => 'actividadesacademicas.delete',
          'description' => 'Eliminar actividades académicas'
        ],[
          'name'=> 'actividadesacademicas.read',
          'slug' => 'actividadesacademicas.read',
          'description' => 'Ver las actividades académicas'
        ],[
          'name'=> 'naturalezas.create',
          'slug' => 'naturalezas.create',
          'description' => 'Crear naturalezas de los espacios académicos'
        ],[
          'name'=> 'naturalezas.update',
          'slug' => 'naturalezas.update',
          'description' => 'Actualizar naturalezas de los espacios académicos'
        ],[
          'name'=> 'naturalezas.delete',
          'slug' => 'naturalezas.delete',
          'description' => 'Eliminar naturalezas de los espacios académicos'
        ],[
          'name'=> 'naturalezas.read',
          'slug' => 'naturalezas.read',
          'description' => 'Ver naturalezas de los espacios académicos'
        ],[
          'name'=> 'objetivos.create',
          'slug' => 'objetivos.create',
          'description' => 'Crear objetivos de los espacios académicos'
        ],[
          'name'=> 'objetivos.update',
          'slug' => 'objetivos.update',
          'description' => 'Actualizar objetivos de los espacios académicos'
        ],[
          'name'=> 'objetivos.delete',
          'slug' => 'objetivos.delete',
          'description' => 'Eliminar objetivos de los espacios académicos'
        ],[
          'name'=> 'objetivos.read',
          'slug' => 'objetivos.read',
          'description' => 'Ver objetivos de los espacios académicos'
        ],[
          'name'=> 'habilidades.create',
          'slug' => 'habilidades.create',
          'description' => 'Crear habilidades'
        ],[
          'name'=> 'habilidades.update',
          'slug' => 'habilidades.update',
          'description' => 'Actualizar habilidades'
        ],[
          'name'=> 'habilidades.delete',
          'slug' => 'habilidades.delete',
          'description' => 'Eliminar habilidades'
        ],[
          'name'=> 'habilidades.read',
          'slug' => 'habilidades.read',
          'description' => 'Ver habilidades'
        ],[
          'name'=> 'estadisticas.read',
          'slug' => 'estadisticas.read',
          'description' => 'Ver Estadísticas'
        ],[
          'name'=> 'tipoevaluacion.create',
          'slug' => 'tipoevaluacion.create',
          'description' => 'Crear tipo de evaluacion'
        ],[
          'name'=> 'tipoevaluacion.update',
          'slug' => 'tipoevaluacion.update',
          'description' => 'Actualizar tipo de evaluacion'
        ],[
          'name'=> 'tipoevaluacion.delete',
          'slug' => 'tipoevaluacion.delete',
          'description' => 'Eliminar tipo de evaluacion'
        ],[
          'name'=> 'tipoevaluacion.read',
          'slug' => 'tipoevaluacion.read',
          'description' => 'Ver tipo de evaluacion'
        ],[
          'name'=> 'tipometodologia.create',
          'slug' => 'tipometodologia.create',
          'description' => 'Crear tipo de metodología'
        ],[
          'name'=> 'tipometodologia.update',
          'slug' => 'tipometodologia.update',
          'description' => 'Actualizar tipo de metodología'
        ],[
          'name'=> 'tipometodologia.delete',
          'slug' => 'tipometodologia.delete',
          'description' => 'Eliminar tipo de metodología'
        ],[
          'name'=> 'tipometodologia.read',
          'slug' => 'tipometodologia.read',
          'description' => 'Ver tipo de metodología'
        ],[
          'name'=> 'asignarpesos.create',
          'slug' => 'asignarpesos.create',
          'description' => 'Crear asignarpesos'
        ],[
          'name'=> 'asignarpesos.update',
          'slug' => 'asignarpesos.update',
          'description' => 'Actualizar asignarpesos'
        ],[
          'name'=> 'asignarpesos.delete',
          'slug' => 'asignarpesos.delete',
          'description' => 'Eliminar asignarpesos'
        ],[
          'name'=> 'asignarpesos.read',
          'slug' => 'asignarpesos.read',
          'description' => 'Ver asignarpesos'
        ],
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
        ['nombre' => 'Práctica'],
        ['nombre' => 'Teórica'],
        ['nombre' => 'Teórico-Práctica']
      ]);

      DB::table('typeevaluations')->insert([
        ['nombre' => 'Cuantitativa'],
        ['nombre' => 'Cualitativa']
      ]);

      DB::table('knowledgeareas')->insert([
        ['nombre'=>'Archivística',
        'academicplan_id'=>1],
        ['nombre'=>'Bibliotecología',
        'academicplan_id'=>1],
        ['nombre'=>'Investigación',
        'academicplan_id'=>1],
        ['nombre'=>'Lenguaje y Metodología',
        'academicplan_id'=>1],
        ['nombre'=>'Matemática y Estadística',
        'academicplan_id'=>1],
        ['nombre'=>'Sistemas',
        'academicplan_id'=>1]
      ]);

      DB::table('activityacademics')->insert([
        ['nombre'=>'Básica'],
        ['nombre'=>'Profesional'],
        ['nombre'=>'C. Facultad'],
        ['nombre'=>'C. Personal'],
        ['nombre'=>'C. Universidad']
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
        'horasSemanales'=>'4',
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
        'competenciasPropias' => 'Estas son las competencias propias',
        'contenidoConceptual'=>'este es el contenido conceptual',
        'contenidoProcedimental'=>'este es el contenido procedimental',
        'contenidoActitudinal'=>'este es el contenido actitudinal',
        'procesosIntegrativos'=>'estos son los procesos integrativos',
        'unidades'=>'estas son las unidades',
        'bibliografia'=>'Esta es la bibliografia',
        'recursosElectronicos'=>'Estos son los recursos electronicos',
        'historialRevision' => 'martes 20 se revisó esto',
        'vigencia' => 'hasta nueva orden',
        'responsables' => 'fulano y fulana',
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
        'horasSemanales' => '5',
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
        'competenciasPropias' => 'Estas son las competencias propias',
        'contenidoConceptual'=>'este es el contenido conceptual',
        'contenidoProcedimental'=>'este es el contenido procedimental',
        'contenidoActitudinal'=>'este es el contenido actitudinal',
        'procesosIntegrativos'=>'estos son los procesos integrativos',
        'unidades'=>'estas son las unidades',
        'bibliografia'=>'Esta es la bibliografia',
        'recursosElectronicos'=>'Estos son los recursos electronicos',
        'historialRevision' => 'martes 20 se revisó esto',
        'vigencia' => 'hasta nueva orden',
        'responsables' => 'fulano y fulana',
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
