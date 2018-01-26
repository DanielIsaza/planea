<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ultraware\Roles\Models\Role;
use Ultraware\Roles\Models\Permission;
use App\User;

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
      $permisos = Permission::pluck('name','id')->toArray();
      $rol = new Role;
      return view("roles.create",["rol"=> $rol,"permisos"=>$permisos,"permiso"=>null]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function permisos()
  {
      $permisos = Permission::all();
      return view("roles.indexp",["permisos"=>$permisos]);
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
      $rol = Role::create([
        'name' => $request->nombre,
        'slug' => $request->nombre,
        'description' => $request->descripcion,
      ]);

      for ($i=0; $i < sizeof($request->permisos); $i++) { 
        $rol->attachPermission($request->permisos[$i]);
      }

      if($rol){
          \Alert::message('Rol creado correctamente', 'success');
          return redirect("/roles");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("roles.create");
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/roles_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/roles');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
      
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
      $permisos = Permission::pluck('name','id')->toArray();
      $permiso = array();
      
      for($i = 0; $i < sizeof($rol->permissions); $i++){
         array_push($permiso, $rol->permissions[$i]->id);
      } 
      return view("roles.edit",["rol"=> $rol,"permisos"=>$permisos,"permiso"=>$permiso]);
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
      $rol = Role::find($id);
      $rol->name = $request->nombre;
      $rol->description = $request->descripcion;
      $rol->detachAllPermissions();
      
      for ($i=0; $i < sizeof($request->permisos); $i++) { 
        $rol->attachPermission($request->permisos[$i]);
      }

      if($rol->save()){
          \Alert::message('Rol actualizado correctamente', 'success');
          return redirect("/roles");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("roles.edit",["rol" => $rol]);
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/roles_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/roles');
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
      if(Role::destroy($id)){
        \Alert::message('Rol eliminado correctamente', 'success');
        return redirect('/roles');
      }else{
        \Alert::message('El rol no pudo ser eliminado', 'danger');
          return redirect('/roles');
      }   
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/roles_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/roles');
    }  
  }

}
