<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StatesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $estados = State::all();
      return view("states.index",["estados"=>$estados]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $estado = new State;
      return view("states.create",["estado"=> $estado]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $estado = new State;
      $estado->nombre = $request->nombre;

      if($estado->save()){
          \Alert::message('Estado creado correctamente', 'success');
          return redirect("/estados");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("states.create");
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
      $estado = State::find($id);
      return view("states.edit",["estado"=> $estado]);
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
      $estado = State::find($id);
      $estado->nombre = $request->nombre;

      if($estado->save()){
          \Alert::message('Estado actualizado correctamente', 'success');
          return redirect("/estados");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("states.edit",["estado" => $estado]);
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
      $planes = Academicplan::find($id)->academicplans;
      if(count($planes) == 0 ){
          State::destroy($id);
          \Alert::message('Estado eliminado correctamente', 'success');
          return redirect('/estados');
      }else{
          \Alert::message('No se puede eliminar el estado', 'danger');
          return redirect('/estados');
      }
  }

}
