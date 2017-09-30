<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academicprogram;
use App\Academicplan;
use App\Ability;
use App\Objective;
use App\Typeability;
use App\University;
use App\Faculty;

class ObjectivesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      $tipoHabilidades = Typeability::pluck('nombre','id')->toArray();
      return view("objetives.index",["universidades"=>$universidades,"tipoHabilidades"=>$tipoHabilidades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      return view("objetives.create",["universidades" => $universidades]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $objetivo = new Objective;
      $objetivo->nombre = $request->nombre;
      $objetivo->peso = $request->peso;
      $objetivo->descripcion = $request->descripcion;
      $objetivo->ability_id = $request->ability_id;

      if($objetivo->save()){
          \Alert::message('Objetivo creado correctamente', 'success');
          return redirect("/objetivos");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("objetives.create");
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
      $objetivo = Objective::find($id);
      $universidades = University::pluck('nombre','id')->toArray();
      $facultades = Faculty::pluck('nombre','id')->toArray();
      $programas = Academicprogram::pluck('nombre','id')->toArray();
      $planes = Academicplan::pluck('nombre','id')->toArray();
      $habilidades = Ability::pluck('nombre','id')->toArray();

      $idHabilidad = Ability::where('id',$objetivo->ability_id)->select('id','academicplan_id')->get()[0];
      $idPlan = Academicplan::where('id',$idHabilidad->academicplan_id)->select('id','academicprogram_id')->get()[0];
      $idPrograma = Academicprogram::where('id',$idPlan->academicprogram_id)->select('id','faculty_id')->get()[0];
      $idFacultad = Faculty::where('id',$idPrograma->faculty_id)->select('id','university_id')->get()[0];

      return view("objetives.edit",["universidades"=>$universidades,"facultades"=>$facultades,"programas"=>$programas,"planes"=>$planes,"habilidades"=>$habilidades,"objetivo"=>$objetivo,"idHabilidad"=>$objetivo->ability_id,"idPlan"=>$idPlan->id,"idPrograma"=>$idPrograma->id,"idFacultad"=>$idFacultad->id,"idUniversidad"=>$idFacultad->university_id]);
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
      $objetivo = Objective::find($id);
      $objetivo->nombre = $request->nombre;
      $objetivo->peso = $request->peso;
      $objetivo->descripcion = $request->descripcion;
      $objetivo->ability_id = $request->ability_id;

      if($objetivo->save()){
          \Alert::message('Objetivo actualizado correctamente', 'success');
          return redirect("/objetivos");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("objetives.edit",["objetivo" => $objetivo]);
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
      $objetvos = Objective::find($id)->objectivespace;
      if(count($objetvos) == 0){
          Objective::destroy($id);
          \Alert::message('Objetivo eliminado correctamente', 'success');
          return redirect('/objetivos');
      }else{
          \Alert::message('No se puede eliminar el objetivo', 'danger');
          return redirect('/objetivos');
      }
  }
}
