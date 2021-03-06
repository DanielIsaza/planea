<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\University;
use App\Academicprogram;
use App\Faculty;
use App\Academicspace;
use App\Typeevaluation;
use App\Typemethodology;
use App\Activityacademic;
use App\Academicplan;
use App\Nature;
use App\Semester;
use App\Knowledgearea;
use Maatwebsite\Excel\Facades\Excel;
use App\Requirement;
use Exception;

class AcademicspacesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      $semestres = Semester::pluck('nombre','id')->toArray();
      return view("academicspaces.index",["universidades"=>$universidades,"semestres"=>$semestres]);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      $tipoEvaluaciones = Typeevaluation::pluck('nombre','id')->toArray();
      $tipoMetodologias = Typemethodology::pluck('nombre','id')->toArray();
      $actividadesAca = Activityacademic::pluck('nombre','id')->toArray();
      $naturalezas = Nature::pluck('nombre','id')->toArray();
      $semestres = Semester::pluck('nombre','id')->toArray();
      $areas = Knowledgearea::pluck('nombre','id')->toArray();
      $espacios = Academicspace::pluck('nombre','id')->toArray();

      return view("academicspaces.create",["universidades"=>$universidades,"tipoEvaluaciones"=>$tipoEvaluaciones,"tipoMetodologias"=>$tipoMetodologias,"actividadesAca"=>$actividadesAca,"naturalezas"=>$naturalezas,"semestres"=>$semestres,"areas"=>$areas,"espacios"=>$espacios]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try{
      $espacio = new Academicspace;
      $espacio->codigo = $request->codigo;
      $espacio->nombre = $request->nombre;
      $espacio->numeroCreditos = $request->numeroCreditos;
      $espacio->horasSemanales = $request->horasSemanales;
      $espacio->horasTeoricas = $request->horasTeoricas;
      $espacio->horasPracticas = $request->horasPracticas;
      $espacio->horasTeoPract = $request->horasTeoPract;
      $espacio->horasAsesorias = $request->horasAsesorias;
      $espacio->horasIndependiente = $request->horasIndependiente;
      $espacio->habilitable = $request->habilitable;
      $espacio->validable = $request->validable;
      $espacio->homologable = $request->homologable;
      $espacio->nucleoTematico = $request->nucleoTematico;
      $espacio->justificacion = $request->justificacion;
      $espacio->metodologia = $request->metodologia;
      $espacio->evaluacion = $request->evaluacion;
      $espacio->descripcion = $request->descripcion;
      $espacio->competenciasPropias = $request->competenciasPropias;
      $espacio->contenidoConceptual = $request->contenidoConceptual;
      $espacio->contenidoProcedimental  = $request->contenidoProcedimental;
      $espacio->contenidoActitudinal = $request->contenidoActitudinal;
      $espacio->procesosIntegrativos = $request->procesosIntegrativos;
      $espacio->unidades = $request->unidades;
      $espacio->bibliografia = $request->bibliografia;
      $espacio->recursosElectronicos = $request->recursosElectronicos;
      $espacio->vigencia = $request->vigencia;
      $espacio->responsables = $request->responsables;
      $espacio->historialRevision = $request->historialRevision;

      $espacio->academicplan_id = $request->academicplan_id;
      $espacio->semester_id = $request->semester_id;
      $espacio->activityacademic_id = $request->activityacademic_id;
      $espacio->typeevaluation_id = $request->typeevaluation_id;
      $espacio->typemethodology_id = $request->typemethodology_id;
      $espacio->nature_id = $request->nature_id;
      $espacio->knowledgearea_id = $request->knowledgearea_id;

      if($espacio->save()){

          for ($i=0; $i < sizeof($request->requisitos); $i++) { 
              Requirement::create([
                'academicspaceD_id' => $espacio->id,
                'academicspace_id' => $request->requisitos[$i],
                'tipo' => 1
              ]);
      }

          \Alert::message('Espacio académico creado correctamente', 'success');
          return redirect("/espaciosacademicos");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("academicspaces.create");
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log de materias', 'danger');
       
        $archivo = fopen("storage/espacios_academicos_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/espaciosacademicos');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }
  /**
   * Download the syllabus of the academicspace
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function descarga($id){

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $espacio = Academicspace::find($id);
      $universidades = University::pluck('nombre','id')->toArray();
      $facultades = Faculty::pluck('nombre','id')->toArray();
      $programas = Academicprogram::pluck('nombre','id')->toArray();
      $planes = Academicplan::pluck('nombre','id')->toArray();
      $tipoEvaluaciones = Typeevaluation::pluck('nombre','id')->toArray();
      $tipoMetodologias = Typemethodology::pluck('nombre','id')->toArray();
      $actividadesAca = Activityacademic::pluck('nombre','id')->toArray();
      $naturalezas = Nature::pluck('nombre','id')->toArray();
      $semestres = Semester::pluck('nombre','id')->toArray();
      $areas = Knowledgearea::pluck('nombre','id')->toArray();

      $idPlan = Academicplan::where('id',$espacio->academicplan_id)->select('id','academicprogram_id')->get()[0];
      $idPrograma = Academicprogram::where('id',$idPlan->academicprogram_id)->select('id','faculty_id')->get()[0];
      $idFacultad = Faculty::where('id',$idPrograma->faculty_id)->select('id','university_id')->get()[0];
      $espacios = Academicspace::where('academicplan_id','=',$espacio->academicplan_id)->pluck('nombre','id')->toArray();
      
      $requisito = 1;
      $corequisito = 1;

      return view("academicspaces.edit",["espacio"=> $espacio,"universidades"=>$universidades,"facultades"=>$facultades,"programas"=>$programas,"planes"=>$planes,"tipoEvaluaciones"=>$tipoEvaluaciones,"tipoMetodologias"=>$tipoMetodologias,"actividadesAca"=>$actividadesAca,"naturalezas"=>$naturalezas,"semestres"=>$semestres,"idPrograma"=>$idPrograma->id,"idFacultad"=>$idFacultad->id,"idUniversidad"=>$idFacultad->university_id,"areas"=>$areas,"requisito" => $requisito,"corequisito"=>$corequisito,"espacios"=>$espacios]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try{
      $espacio = Academicspace::find($id);
      $espacio->codigo = $request->codigo;
      $espacio->nombre = $request->nombre;
      $espacio->numeroCreditos = $request->numeroCreditos;
      $espacio->horasSemanales = $request->horasSemanales;
      $espacio->horasTeoricas = $request->horasTeoricas;
      $espacio->horasPracticas = $request->horasPracticas;
      $espacio->horasTeoPract = $request->horasTeoPract;
      $espacio->horasAsesorias = $request->horasAsesorias;
      $espacio->horasIndependiente = $request->horasIndependiente;

      if (Input::get('customer_data')) {
          $espacio->habilitable = 1;
      } else {
      $espacio->habilitable = 0;
      }

      if (Input::get('customer_data')) {
      $espacio->validable = 1;
      } else {
      $espacio->validable = 0;
      }

      if (Input::get('homologable')) {
      $espacio->homologable = 1;
      } else {
      $espacio->homologable = 0;
      }

      $espacio->nucleoTematico = $request->nucleoTematico;
      $espacio->justificacion = $request->justificacion;
      $espacio->metodologia = $request->metodologia;
      $espacio->evaluacion = $request->evaluacion;
      $espacio->descripcion = $request->descripcion;
      $espacio->contenidoConceptual = $request->contenidoConceptual;
      $espacio->competenciasPropias = $request->competenciasPropias;
      $espacio->contenidoProcedimental  = $request->contenidoProcedimental;
      $espacio->contenidoActitudinal = $request->contenidoActitudinal;
      $espacio->procesosIntegrativos = $request->procesosIntegrativos;
      $espacio->unidades = $request->unidades;
      $espacio->bibliografia = $request->bibliografia;
      $espacio->recursosElectronicos = $request->recursosElectronicos;
      $espacio->vigencia = $request->vigencia;
      $espacio->responsables = $request->responsables;

      $espacio->academicplan_id = $request->academicplan_id;
      $espacio->semester_id = $request->semester_id;
      $espacio->activityacademic_id = $request->activityacademic_id;
      $espacio->typeevaluation_id = $request->typeevaluation_id;
      $espacio->typemethodology_id = $request->typemethodology_id;
      $espacio->nature_id = $request->nature_id;
      if($espacio->save()){
          \Alert::message('Espacio académico actualizado correctamente', 'success');
          return redirect("/espaciosacademicos");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("academicspaces.edit",["espacio" => $espacio]);
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log de materias', 'danger');
       
        $archivo = fopen("storage/espacios_academicos_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/espaciosacademicos');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try{
      if(Academicspace::destroy($id)){
          
          \Alert::message('Espacio académico eliminado correctamente', 'success');
          return redirect('/espaciosacademicos');
      }else{
          \Alert::message('Espacio académico eliminado correctamente', 'success');
          return redirect('/espaciosacademicos');
      }
    }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log de materias', 'danger');
       
        $archivo = fopen("storage/espacios_academicos_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/espaciosacademicos');
    }
  }
  /**
   * permite crear los espacios a partir de un archivo excel
   */
  public function import(){
    try
    {

       $archivo = fopen("storage/importar_espacios_academicos_log.txt", "w");
        fclose($archivo);

      if(!\Storage::disk('local')->exists('public/storage/espacios.xlsx')){
      
        Excel::load('public/storage/espacios.xlsx', function($reader) { 

          foreach ($reader->get() as $book) {
            if(sizeof(Academicspace::where('codigo',$book->codigo)->get()) == 0 ){

            $espacio = new Academicspace();
            $espacio->codigo = $book->codigo;
            $espacio->nombre = $book->nombre;
            $espacio->numeroCreditos = $book->numerocreditos;
            $espacio->horasTeoricas = $book->horasteoricas;
            $espacio->horasPracticas = $book->horaspracticas;
            $espacio->horasTeoPract = $book->horasteopract;
            $espacio->horasAsesorias = $book->horasasesoria;
            $espacio->horasIndependiente = $book->horasindependiente;
            $espacio->habilitable = $book->habilitable;
            $espacio->validable = $book->validable;
            $espacio->homologable = $book->homologable;
            $espacio->nucleoTematico = $book->nucleotematico;
            $espacio->justificacion = $book->justificacion;
            $espacio->metodologia = $book->metodologia;
            $espacio->evaluacion = $book->evaluacion;
            $espacio->descripcion = $book->descripcion;
            $espacio->competenciasPropias = $book->competenciasPropias;
            $espacio->contenidoConceptual = $book->contenidoconceptual;
            $espacio->contenidoProcedimental = $book->contenidoprocedimental;
            $espacio->contenidoActitudinal = $book->contenidoactitudinal;
            $espacio->procesosIntegrativos = $book->procesosintegrativos;
            $espacio->unidades = $book->unidades;
            $espacio->bibliografia = $book->bibliografia;
            $espacio->recursosElectronicos = $book->recursosElectronicos;
            $espacio->vigencia = $book->vigencia;
            $espacio->historialRevision  = $book->historialRevision;

            $espacio->semester_id = $book->semester_id;
            $espacio->academicplan_id = $book->academicplan_id;
            $espacio->activityacademic_id = $book->activityacademic_id;
            $espacio->typeevaluation_id = $book->typeevaluation_id;
            $espacio->typemethodology_id = $book->typemethodology_id;
            $espacio->nature_id = $book->nature_id;
            $espacio->knowledgearea_id = $book->knowledgearea_id;
            

            if($espacio->save()){
              $archivo = fopen("storage/importar_espacios_academicos_log.txt", "a");
              fwrite($archivo, "El espacio academico ".$espacio->nombre. " fue importado correctamente\r\n");
              fclose($archivo);
            }


            $requisitos = explode(",",$book->requisitos);
            $corequisitos = explode(",",$book->corequisitos);
            
              if(sizeof($requisitos) > 0){
                for ($i=0; $i < sizeof($requisitos); $i++) {
                    $codigo = Academicspace::where('codigo',$requisitos[$i])->select('id')->get()->first()['id']; 
                    if($codigo != ""){
                      Requirement::create([
                        'academicspaceD_id' => $espacio->id,
                        'academicspace_id' => $codigo,
                        'tipo' => 1
                      ]);
                    }
                 }
              }

              if(sizeof($corequisitos) > 0){
               for ($i=0; $i < sizeof($corequisitos); $i++) { 
                    $codigo = Academicspace::where('codigo',$requisitos[$i])->select('id')->get()->first()['id']; 
                    if($codigo != ""){
                    Requirement::create([
                      'academicspaceD_id' => $espacio->id,
                      'academicspace_id' => $codigo,
                      'tipo' => 2
                    ]);
                  }
               }
              }
            }
          }
        });
        \Alert::message('Espacios académicos importados exitosamente', 'success');
        return redirect('/espaciosacademicos');
      }else
      {
        \Alert::message('El archivo espacios.xlsx no existe, importalo por favor', 'danger');
      }
    }
     catch(Exception $e){
        \Alert::message('ocurrio un error, por favor revise el log de materias', 'danger');
       
        $archivo = fopen("storage/importar_espacios_academicos_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/espaciosacademicos');
    }
  }
  
}
