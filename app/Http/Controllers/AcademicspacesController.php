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

      return view("academicspaces.create",["universidades"=>$universidades,"tipoEvaluaciones"=>$tipoEvaluaciones,"tipoMetodologias"=>$tipoMetodologias,"actividadesAca"=>$actividadesAca,"naturalezas"=>$naturalezas,"semestres"=>$semestres,"areas"=>$areas]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $espacio = new Academicspace;
      $espacio->codigo = $request->codigo;
      $espacio->nombre = $request->nombre;
      $espacio->numeroCreditos = $request->numeroCreditos;
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
      $espacio->contenidoConceptual = $request->contenidoConceptual;
      $espacio->contenidoProcedimental  = $request->contenidoProcedimental;
      $espacio->contenidoActitudinal = $request->contenidoActitudinal;
      $espacio->procesosIntegrativos = $request->procesosIntegrativos;
      $espacio->unidades = $request->unidades;

      $espacio->academicplan_id = $request->academicplan_id;
      $espacio->semester_id = $request->semester_id;
      $espacio->activityacademic_id = $request->activityacademic_id;
      $espacio->typeevaluation_id = $request->typeevaluation_id;
      $espacio->typemethodology_id = $request->typemethodology_id;
      $espacio->nature_id = $request->nature_id;
      $espacio->knowledgearea_id = $request->knowledgearea_id;

      if($espacio->save()){
          \Alert::message('Espacio académico creado correctamente', 'success');
          return redirect("/espaciosacademicos");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("academicspaces.create");
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

      return view("academicspaces.edit",["espacio"=> $espacio,"universidades"=>$universidades,"facultades"=>$facultades,"programas"=>$programas,"planes"=>$planes,"tipoEvaluaciones"=>$tipoEvaluaciones,"tipoMetodologias"=>$tipoMetodologias,"actividadesAca"=>$actividadesAca,"naturalezas"=>$naturalezas,"semestres"=>$semestres,"idPrograma"=>$idPrograma->id,"idFacultad"=>$idFacultad->id,"idUniversidad"=>$idFacultad->university_id,"areas"=>$areas]);
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
      $espacio = Academicspace::find($id);
      $espacio->codigo = $request->codigo;
      $espacio->nombre = $request->nombre;
      $espacio->numeroCreditos = $request->numeroCreditos;
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
      $espacio->contenidoProcedimental  = $request->contenidoProcedimental;
      $espacio->contenidoActitudinal = $request->contenidoActitudinal;
      $espacio->procesosIntegrativos = $request->procesosIntegrativos;
      $espacio->unidades = $request->unidades;

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
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $objetivos = Academicspace::find($id)->objective;
      if(count($objetivos) == 0){
          Academicspace::destroy($id);
          \Alert::message('Espacio académico eliminado correctamente', 'success');
          return redirect('/espaciosacademicos');
      }else{
          \Alert::message('Espacio académico eliminado correctamente', 'success');
          return redirect('/espaciosacademicos');
      }
  }
  /**
   * permite crear los espacios a partir de un archivo excel
   */
  public function import(){
    if(\Storage::disk('local')->exists('/public/espacios.xlsx')){
      Excel::load('public/storage/espacios.xlsx', function($reader) {
        foreach ($reader->get() as $book) {
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
          $espacio->contenidoConceptual = $book->contenidoconceptual;
          $espacio->contenidoProcedimental = $book->contenidoprocedimental;
          $espacio->contenidoActitudinal = $book->contenidoactitudinal;
          $espacio->procesosIntegrativos = $book->procesosintegrativos;
          $espacio->unidades = $book->unidades;
          $espacio->semester_id = $book->semester_id;
          $espacio->academicplan_id = $book->academicplan_id;
          $espacio->activityacademic_id = $book->activityacademic_id;
          $espacio->typeevaluation_id = $book->typeevaluation_id;
          $espacio->typemethodology_id = $book->typemethodology_id;
          $espacio->nature_id = $book->nature_id;
          $espacio->knowledgearea_id = $book->knowledgearea_id;
          /*$espacio->requisitos = explode(",",$book->requisitos);
          $espacio->corequisitos = explode(",",$book->corequisitos);
          dd($espacio);
          */
          $espacio->save();
        }
      });

      \Alert::message('planes académicos importados exitosamente', 'success');
      return redirect('/espaciosacademicos');
    }else{
      \Alert::message('El archivo espacios.xlsx no existe, importalo por favor', 'danger');
      return redirect('/espaciosacademicos');
    }
  }
  /**
  *w
  */
}
