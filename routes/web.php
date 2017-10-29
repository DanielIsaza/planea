<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'],function()
{
	//Rutas para el CRUD de Universidad
	Route::resource('universidades','UniversitiesController');
	//Ruta para el home de la aplicacion
	Route::get('/', 'HomeController@index');
	//Rutas para el CRUD de Estados
	Route::resource('estados','StatesController');
	//Rutas para el CRUD de Tipos de habilidad
	Route::resource('tiposhabilidad','TypeabilitiesController');
	//Rutas para el CRUD de roles
	Route::resource('roles','RolesController');
	//Rutas para el CRUD de naturaleza
	Route::resource('naturaleza','NaturesController');
	//Rutas para el CRUD de tipo de metodologia
	Route::resource('tiposmetodologias','TypemethodologiesController');
	//Rutas para el CRUD de tipo de evaluacion
	Route::resource('tiposevaluaciones','TypeevaluationsController');
	//Rutas para el CRUD de actividades academicas
	Route::resource('actividadesacademicas','ActivityacademicsController');
	//Rustas para el CRUD de semestres
	Route::resource('semestres','SemestersController');
	//Rutas para el CRUD de facultades
	Route::resource('facultades','FacultiesController');
	//Rutas para el CRUD de los programas academicos
	Route::resource('programasacademicos','AcademicprogramsController');
	//Rutas para el CRUD de las habilidades
	Route::resource('habilidades','AbilitiesController');
	//Rutas para el CRUD de los planes academicos
	Route::resource('planesacademicos','AcademicplansController');
	//Rutas para el CRUD de los espacios academicos
	Route::resource('espaciosacademicos','AcademicspacesController');
	//Rutas para el CRUD de los objetivos
	Route::resource('objetivos','ObjectivesController');
	//Rutas para el manejo de la asignación de los pesos
	Route::resource('asignacion','ObjectivespacesController');
	//Rutas para autorización de usuarios
	Route::resource('autoriza','AutorizesController');
	//Rutas para el manejo de la asignación teorica de los pesos
	Route::resource('asignacionTeorica','ObjectivesspacesTController');
	//Rutas para el CRUD de las áreas de conocimiento
	Route::resource('areasconocimiento','KnowledgeareasController');
	// permite obtener las gráficas estadisticas
	Route::get('estadistica','StadisticsController@index');
	// permite obtener las gráficas estadisticas
	Route::get('estadisticaAreaConocimiento','StadisticsController@indexA');
	// permite obtener tabla resumen con los datos
	Route::get('tablaResumen','StadisticsController@indexT');
	// permite realizar la descarga del syllabus de un espacio académico
	Route::get('descarga/{espacio_id?}','PdfController@descarga1');
	//Ruta que permite mostrar el formulario de subida de archivos
	Route::get('formulario','PdfController@formulario');
	//Ruta que permite subir un archivo 
	Route::post('subir','PdfController@subir');
	//Ruta que retorna todas las facultades
	Route::get('facultad/{university_id?}',["as" => "facultad/",function($university_id){
		return App\Faculty::where('university_id',$university_id)
		->select('id as value', 'nombre as text')->get();
	}]);
	//Ruta que retorna todas los programas academicos
	Route::get('programa/{faculty_id?}',["as" => "programa/",function($faculty_id){
		return App\Academicprogram::where('faculty_id',$faculty_id)
		->select('id as value','nombre as text')->get();
	}]);
	// Ruta que permite obtener la informacion necesaria para mostrar en la tabla de planes
	Route::get('planes/{program_id?}',["as" => "planes/",function($program_id){
		return	DB::table('academicplans')
		->join('states','states.id','=','academicplans.state_id')
		->where('academicplans.academicprogram_id',$program_id)
		->select('academicplans.id as value','academicplans.nombre as text','states.nombre as estado')->get();
	}]);
	//Ruta que retorna las habilidades definidas en un perfil
	Route::get('habilidad/{academicplan_id?}',["as"=>"habilidad/",function($academicplan_id){
		return App\Ability::where('academicplan_id',$academicplan_id)
		->select('id as value','nombre as text','peso as peso')->get();
	}]);
	//Ruta que retorna las habilidades definidas en un perfil
	Route::get('habilidad/{typeability_id?}',["as"=>"habilidad",function($typeability_id){
		return App\Ability::where('typeability_id',$typeability_id)
		->select('id as value','nombre as text','peso as peso')->get();
	}]);
	//Ruta que retorna las materias de un semestre y un plan definido
	Route::get('materias/{semester_id?}/{academicplan_id?}',["as"=>"materias",function($semester_id,$academicplan_id){
		return App\Academicspace::where([['semester_id','=',$semester_id],['academicplan_id','=',$academicplan_id]])->select('id as value','nombre as text')->get();
	}]);
	//Ruta que retorna las materias de un semestre y un plan definido
	Route::get('materia/{academicplan_id?}',["as"=>"materia",function($academicplan_id){
		return App\Academicspace::where('academicplan_id',$academicplan_id)->select('id as value','nombre as text')->get();
	}]);
	//Ruta que permite tener el valor de los objetivos de una habilidad
	Route::get('objetivo/{ability_id?}',["as"=>"objetivo/",function($ability_id){
		return App\Objective::where('ability_id',$ability_id)->select('id as value','nombre as text','peso')->get();
	}]);
	//Ruta que obtiene las areas de conocimiento de un plan
	Route::get('area/{academicplan_id?}',["as"=>"area",function($academicplan_id){
		return App\knowledgearea::where('academicplan_id',$academicplan_id)->select('id as value','nombre as text')->get();
	}]);
	//Ruta que obtiene los espacios académicos y objetivos que son afectados por cada uno
	Route::get('objetivosreal/{ability_id?}',["as"=>"objetivosreal",function($ability_id){
		return DB::table('abilities')
		->join('objectives','objectives.ability_id','=','abilities.id')
		->join('objectiveespaces','objectiveespaces.objective_id','=','objectives.id')
		->join('academicspaces','academicspaces.id','=','objectiveespaces.academicspace_id')
		->where('abilities.id','=',$ability_id)->select('objectiveespaces.id as value','academicspaces.nombre as text','objectiveespaces.peso','objectives.nombre as objetivos','objectives.peso as pesohabilidad')->get();
	}]);

	// Ruta que retorna la información estadistica de las habilidades
	Route::get('estadisticaporplan/{plan_id?}',["as"=>"estadisticaporplan",function($plan_id){
		return DB::table('academicplans')
		->join('abilities','academicplans.id','=','abilities.academicplan_id')
		->join('objectives','abilities.id','=','objectives.ability_id')
		->join('objectiveespaces','objectives.id','=','objectiveespaces.objective_id')
		->where('academicplans.id','=',$plan_id)
		->select('abilities.id as id','abilities.nombre as nombre',DB::raw('SUM(objectiveespaces.peso) as peso'))
		->groupBy('abilities.id','abilities.nombre')
		->get();
	}]);
	// Ruta que retorna la información estadistica de las habilidades
	Route::get('estadisticaporplanteorico/{plan_id?}',["as"=>"estadisticaporplanteorico",function($plan_id){
		return DB::table('academicplans')
		->join('abilities','academicplans.id','=','abilities.academicplan_id')
		->join('objectives','abilities.id','=','objectives.ability_id')
		->where('academicplans.id','=',$plan_id)
		->select('abilities.id as id','abilities.nombre as nombre',DB::raw('SUM(objectives.peso) as peso'))
		->groupBy('abilities.id','abilities.nombre')
		->get();
	}]);
	// Ruta que retorna la información estadistica de las habilidades
	Route::get('estadisticaporarea/{plan_id?}/{area_id?}',["as"=>"estadisticaporarea",function($plan_id,$area_id){
		return DB::table('academicplans')
		->join('abilities','academicplans.id','=','abilities.academicplan_id')
		->join('objectives','abilities.id','=','objectives.ability_id')
		->join('objectiveespaces','objectives.id','=','objectiveespaces.objective_id')
		->join('academicspaces','objectiveespaces.academicspace_id','=','academicspaces.id')
		->join('knowledgeareas','knowledgeareas.id','=','academicspaces.knowledgearea_id')
		->where([['academicplans.id','=',$plan_id],['knowledgeareas.id','=',$area_id]])
		->select('abilities.id as id','abilities.nombre as nombre',DB::raw('SUM(objectiveespaces.peso) as peso'))
		->groupBy('abilities.id','abilities.nombre')
		->get();
	}]);
	// Ruta que retorna la información estadistica de las habilidades
	Route::get('estadisticaporareateorico/{plan_id?}/{area_id?}',["as"=>"estadisticaporareateorico",function($plan_id,$area_id){
		return DB::table('academicplans')
		->join('abilities','academicplans.id','=','abilities.academicplan_id')
		->join('objectives','abilities.id','=','objectives.ability_id')
		->join('objectiveespaces','objectives.id','=','objectiveespaces.objective_id')
		->join('academicspaces','objectiveespaces.academicspace_id','=','academicspaces.id')
		->join('knowledgeareas','knowledgeareas.id','=','academicspaces.knowledgearea_id')
		->where([['academicplans.id','=',$plan_id],['knowledgeareas.id','=',$area_id]])
		->select('abilities.id as id','abilities.nombre as nombre',DB::raw('SUM(objectives.peso) as peso'))
		->groupBy('abilities.id','abilities.nombre')
		->get();
	}]);
	// ruta que retorna los espacios academicos de un plan
	Route::get('espaciosacade/{plan_id?}',["as"=>"espaciosporplan",function($plan_id){
	  return DB::table('academicspaces')
	  ->where('academicplan_id','=',$plan_id)
	  ->select('academicspaces.id as value','academicspaces.nombre as text')
	  ->get();
	}]);
	//Ruta que da acceso al home de la aplicacion
	Route::get('/home', 'HomeController@index');
	//Ruta para importar las universidades desde un archivo 
	Route::get('importarUniversidades','UniversitiesController@import');
	//Ruta para importar las universidades desde un archivo 
	Route::get('importarFacultades','FacultiesController@import');
	//Ruta para importar los programas desde un archivo 
	Route::get('importarProgramas','AcademicprogramsController@import');
	//Ruta para importar los planes academicos desde un archivo 
	Route::get('importarPlanes','AcademicplansController@import');
	//Ruta para importar los planes academicos desde un archivo 
	Route::get('importarEspacios','AcademicspacesController@import');
	//
	Route::get('prueba',[function(){
	if (file_exists("public/storage/book.csv")){
	   echo "El archivo existe";
	}else{
	   echo "El archivo no existe";
	}
		//$ac = array(App\knowledgearea::all());
		/*$espacios = array(App\Academicspace::find(3));

		foreach ($espacios as $esp) {
			echo $esp->nombre;
			foreach ($esp->objective as $obj) {
				foreach ($obj->weight as $pe) {
					if($pe->tipo == 1){
					echo $pe->peso;
					}
				}
			}
		}*/

	}]);
});