<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;

class SemestersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $semestres = Semester::all();
      return view("semesters.index",["semestres"=>$semestres]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $semestre = new Semester;
      return view("semesters.create",["semestre"=> $semestre]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $semestre = new Semester;
      $semestre->nombre = $request->nombre;

      if($semestre->save()){
          \Alert::message('Semestre creado correctamente', 'success');
          return redirect("/semestres");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("semesters.create");
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
      $semestre = Semester::find($id);
      return view("semesters.edit",["semestre"=> $semestre]);
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
      $semestre = Semester::find($id);
      $semestre->nombre = $request->nombre;

      if($semestre->save()){
          \Alert::message('Semestre actualizado correctamente', 'success');
          return redirect("/semestres");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("semesters.edit",["semestre" => $semestre]);
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
      $espacios = Semester::find($id)->academicspaces;
      if(count($espacios) == 0){
          Semester::destroy($id);
          \Alert::message('Semestre eliminado correctamente', 'success');
          return redirect('/semestres');
      }else{
          \Alert::message('No se puede eliminar el semestre', 'danger');
          return redirect('/semestres');
      }
  }
}
