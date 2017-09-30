<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typemethodology;

class TypemethodologiesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $tipometodologias = Typemethodology::all();
      return view("typemethodologies.index",["tipometodologias"=>$tipometodologias]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $tipometodologia = new Typemethodology;
      return view("typemethodologies.create",["tipometodologia"=> $tipometodologia]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $tipometodologia = new Typemethodology;
      $tipometodologia->nombre = $request->nombre;

      if($tipometodologia->save()){
           \Alert::message('Tipo de metodología creada correctamente', 'success');
          return redirect("/tiposmetodologias");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("typemethodologies.create");
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
      $tipometodologia = Typemethodology::find($id);
      return view("typemethodologies.edit",["tipometodologia"=> $tipometodologia]);
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
      $tipometodologia = Typemethodology::find($id);
      $tipometodologia->nombre = $request->nombre;

      if($tipometodologia->save()){
          \Alert::message('Tipo de metodología actualizada correctamente', 'success');
          return redirect("/tiposmetodologias");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("typemethodologies.edit",["tipometodologia" => $tipometodologia]);
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
      $espacios = typemethodology::find($id)->academicspace;
      if(count($espacios)==0){
          Typemethodology::destroy($id);
          \Alert::message('Tipo de metodología eliminada correctamente', 'success');
          return redirect('/tiposmetodologias');
      }else{
          \Alert::message('No se puede eliminar el tipo de metodología', 'danger');
          return redirect('/tiposmetodologias');
      }
  }
}
