<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Ultraware\Roles\Models\Role;
use App\Academicprogram;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view("auth.index",["usuarios"=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->toArray();
        $programas = Academicprogram::pluck('nombre','id')->toArray();
        $programa = null;
        $usuario = new User;
        $rol = null;
        return view("auth.create",["usuario"=>$usuario,"roles"=>$roles,"programas"=>$programas,"programa"=>$programa,"rol"=>$rol]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => bcrypt($request->password),
        ]);

        $usuario->attachRole($request->roles);

        if($usuario){
          \Alert::message('Usuario registrado correctamente', 'success');
          return redirect("/usuarios");
        }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("auth.create");
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
        $usuario = User::find($id);
        $roles = Role::pluck('name','id')->toArray();
        return view("auth.edit",["usuario"=>$usuario,"roles"=>$roles,"rol"=>$usuario->roles[0]->id]);
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
        $usuario = User::find($id);
        $usuario->name = $request->nombre;
        $usuario->email = $request->correo;
        if($request->password != null){
            $usuario->password = bcrypt($request->password);
        }

        if($usuario->save()){
            \Alert::message('Usuario modificado correctamente', 'success');
          return redirect("/usuarios");
        }else{
            \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("auth.edit");
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
        if( User::destroy($id)){
            \Alert::message('Usuario eliminado correctamente', 'success');
          return redirect("/usuarios");
        }else{
            \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("/usuarios");
        }
    }
}
