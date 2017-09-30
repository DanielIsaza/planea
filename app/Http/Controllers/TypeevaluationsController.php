<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typeevaluation;

class TypeevaluationsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $tipoevaluaciones = Typeevaluation::all();
      return view("typeevaluations.index",["tipoevaluaciones"=>$tipoevaluaciones]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $tipoevaluacion = new Typeevaluation;
      return view("typeevaluations.create",["tipoevaluacion"=> $tipoevaluacion]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $tipoevaluacion = new Typeevaluation;
      $tipoevaluacion->nombre = $request->nombre;

      if($tipoevaluacion->save()){
          \Alert::message('Tipo de evaluación creada correctamente', 'success');
          return redirect("/tiposevaluaciones");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("typeevaluations.create");
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
      $tipoevaluacion = Typeevaluation::find($id);
      return view("typeevaluations.edit",["tipoevaluacion"=> $tipoevaluacion]);
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
      $tipoevaluacion = Typeevaluation::find($id);
      $tipoevaluacion->nombre = $request->nombre;

      if($tipoevaluacion->save()){
          \Alert::message('Tipo de evaluación actualizada correctamente', 'success');
          return redirect("/tiposevaluaciones");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("typeevaluations.edit",["tipoevaluacion" => $tipoevaluacion]);
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
      $espacios = Typeevaluation::find($id)->academicspace;
      if(count($esacios) == 0){
          Typeevaluation::destroy($id);
          \Alert::message('Tipo de evaluación eliminada correctamente', 'success');
          return redirect('/tiposevaluaciones');
      }else{
          \Alert::message('No se puede eliminar el tipo de evaluación', 'danger');
          return redirect('/tiposevaluaciones');
      }
  }
}
