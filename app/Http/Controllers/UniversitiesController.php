<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
use Maatwebsite\Excel\Facades\Excel;

class UniversitiesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::all();
      return view("universities.index",["universidades"=>$universidades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $universidad = new University;
      return view("universities.create",["universidad"=> $universidad]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $universidad = new University;
      $universidad->nombre = $request->nombre;

      if($universidad->save()){
           \Alert::message('Universidad creada correctamente', 'success');
          return redirect("/universidades");
      }else{
           \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("universidades.create");
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
      $universidad = University::find($id);
      return view("universities.edit",["universidad"=> $universidad]);
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
      $universidad = University::find($id);
      $universidad->nombre = $request->nombre;

      if($universidad->save()){
           \Alert::message('Universidad actualizada correctamente', 'success');
          return redirect("/universidades");
      }else{
           \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("universidades.edit",["universidad" => $universidad]);
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
      $facultades = University::find($id)->faculties;

      if(count($facultades) == 0){
          University::destroy($id);
          \Alert::message('Universidad eliminada correctamente', 'success');
          return redirect('/universidades');
      }else {
          \Alert::message('No se puede eliminar la Universidad', 'danger');
          return redirect('/universidades');
      }
  }

  public function import(){
    //dd(public_path( ));
    Excel::load('public/book.csv', function($reader) {

      foreach ($reader->get() as $book) {
            $u = new University();
            $u->nombre = $book->nombre;
            $u->save();
            }

});
  }

}
