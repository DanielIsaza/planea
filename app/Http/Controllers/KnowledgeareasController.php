<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knowledgearea;
use App\University;
use App\Faculty;
use App\Academicplan;
use App\Academicprogram;

class KnowledgeareasController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      return view("knowledgeareas.index",["universidades"=>$universidades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $area = new Knowledgearea;
      $universidades = University::pluck('nombre','id')->toArray();
      return view("knowledgeareas.create",["area"=> $area,"universidades"=>$universidades]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $area = new Knowledgearea;
      $area->nombre = $request->nombre;
      $area->academicplan_id = $request->academicplan_id;

      if($area->save()){
          \Alert::message('Área de conocimiento creada correctamente', 'success');
          return redirect("/areasconocimiento");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("knowledgeareas.create");
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
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $area = Knowledgearea::find($id);
      $universidades = University::pluck('nombre','id')->toArray();
      $facultades = Faculty::pluck('nombre','id')->toArray();
      $programas = Academicprogram::pluck('nombre','id')->toArray();
      $planes = Academicplan::pluck('nombre','id')->toArray();
      
      $idPlan = Academicplan::where('id',$area->academicplan_id)->select('id','academicprogram_id')->get()[0];
      $idPrograma = Academicprogram::where('id',$idPlan->academicprogram_id)->select('id','faculty_id')->get()[0];
      $idFacultad = Faculty::where('id',$idPrograma->faculty_id)->select('id','university_id')->get()[0];

      return view("knowledgeareas.edit",["area"=> $area,"universidades"=>$universidades,"facultades"=>$facultades,"programas"=>$programas,"planes"=>$planes,"idFacultad"=>$idFacultad->id,"idPrograma"=>$idPrograma->id,"idPlan"=>$idPlan->id,"idUniversidad"=>$idFacultad->university_id
      ]);
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
      $area = Knowledgearea::find($id);
      $area->nombre = $request->nombre;

      if($area->save()){
          \Alert::message('Área de conocimiento actualizada correctamente', 'success');
          return redirect("/areasconocimiento");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("knowledgeareas.edit",["area" => $area]);
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
      $espacio = Knowledgearea::find($id)->academicspace;
      if(count($espacio)==0){
          Knowledgearea::destroy($id);
          \Alert::message('Área de conocimiento eliminada correctamente', 'success');
          return redirect('/areasconocimiento');
      }else{
          \Alert::message('No se puede eliminar el área de conocimiento', 'danger');
          return redirect('/areasconocimiento');
      }
  }

}
