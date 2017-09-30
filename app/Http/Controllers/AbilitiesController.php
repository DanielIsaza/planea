<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ability;
use App\Typeability;
use App\University;
use App\Faculty;
use App\Academicprogram;
use App\Academicplan;


class AbilitiesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      return view("abilities.index",["universidades"=>$universidades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      $tiposh = Typeability::pluck('nombre','id');
      $habilidad = new Ability;
      return view("abilities.create",["universidades"=>$universidades,"tiposh" => $tiposh]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $habilidad = new Ability;
      $habilidad->nombre = $request->nombre;
      $habilidad->peso = $request->peso;
      $habilidad->academicplan_id = $request->academicplan_id;
      $habilidad->typeability_id = $request->typeability_id;
      if($habilidad->save()){
          \Alert::message('Habilidad creada correctamente', 'success');
          return redirect("/habilidades");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("abilities.create");
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
      $habilidad = Ability::find($id);
      $tiposh = Typeability::pluck('nombre','id');
      $universidades = University::pluck('nombre','id')->toArray();
      $facultades = Faculty::pluck('nombre','id')->toArray();
      $programas = Academicprogram::pluck('nombre','id')->toArray();
      $planes = Academicplan::pluck('nombre','id')->toArray();

      $idPlan = \DB::table('academicplans')->where('id',$habilidad->academicplan_id)->select('id','academicprogram_id')->get()[0];
      $idPrograma = \DB::table('academicprograms')->where('id',$idPlan->academicprogram_id)->select('id','faculty_id')->get()[0];
      $idFacultad = \DB::table('faculties')->where('id',$idPrograma->faculty_id)->select('id','university_id')->get()[0];

      return view("abilities.edit",["habilidad"=> $habilidad,"tiposh"=>$tiposh,"universidades"=>$universidades,"facultades"=>$facultades,"programas"=>$programas,"planes"=>$planes,"idPlan" => $idPlan->id,"idPrograma"=>$idPrograma->id,"idFacultad"=>$idFacultad->id,"idUniversidad"=>$idFacultad->university_id]);
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
      $habilidad = Ability::find($id);
      $habilidad->nombre = $request->nombre;
      $habilidad->peso = $request->peso;
      $habilidad->typeability_id = $request->typeability_id;
      if($habilidad->save()){
          \Alert::message('Habilidad actualizada correctamente', 'success');
          return redirect("/habilidades");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("abilities.edit",["habilidad" => $habilidad]);
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
      $objetivos = Ability::find($id)->objective;
      if(count($objectivos) == 0){
          Ability::destroy($id);
          \Alert::message('Habilidad eliminada correctamente', 'success');
          return redirect('/habilidades');
      }else{
          \Alert::message('No se puede eliminar la habilidad', 'danger');
          return redirect('/habilidades');
      }

  }
}
