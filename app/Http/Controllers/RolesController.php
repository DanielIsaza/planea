<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ultraware\Roles\Models\Role;
use Ultraware\Roles\Models\Permission;

class RolesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $roles = Role::all();
      return view("roles.index",["roles"=>$roles]);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $permisos = Permission::paginate(4);
      $rol = new Role;
      return view("roles.create",["rol"=> $rol,"permisos"=>$permisos]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $rol = Role::create([
          'name' => $request->nombre,
          'slug' => $request->nombre,
          'description' => $request->descripcion,
      ]);

      if($rol){
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
      $rol = Role::find($id);
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
      $rol = Role::find($id);
      $rol->name = $request->nombre;
      $rol->description = $request->descripcion;

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
      if(Role::destroy($id)){
        \Alert::message('Rol eliminado correctamente', 'success');
        return redirect('/roles');
      }else{
        \Alert::message('El rol no pudo ser eliminado', 'danger');
          return redirect('/roles');
      }     
  }

}
