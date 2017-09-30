<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class RolesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $roles = Rol::all();
      return view("roles.index",["roles"=>$roles]);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $rol = new Rol;
      return view("roles.create",["rol"=> $rol]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $rol = new Rol;
      $rol->nombre = $request->nombre;

      if($rol->save()){
          \Alert::message('Rol creado correctamente', 'success');
          return redirect("/roles");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("roles.create");
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
      $rol = Rol::find($id);
      return view("roles.edit",["rol"=> $rol]);
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
      $rol = Rol::find($id);
      $rol->nombre = $request->nombre;

      if($rol->save()){
          \Alert::message('Rol actualizado correctamente', 'success');
          return redirect("/roles");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("roles.edit",["rol" => $rol]);
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
      Rol::destroy($id);
      \Alert::message('Rol eliminado correctamente', 'success');
      return redirect('/roles');
  }

}
