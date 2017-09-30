<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knowledgearea;

class KnowledgeareasController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $areas = Knowledgearea::all();
      return view("knowledgeareas.index",["areas"=>$areas]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $area = new Knowledgearea;
      return view("knowledgeareas.create",["area"=> $area]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $area = new Knowledgearea;
      $area->nombre = $request->nombre;

      if($area->save()){
          \Alert::message('Área de conocimiento creada correctamente', 'success');
          return redirect("/areasconocimiento");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("knowledgeareas.create");
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
      $area = Knowledgearea::find($id);
      return view("knowledgeareas.edit",["area"=> $area]);
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
      $area = Knowledgearea::find($id);
      $area->nombre = $request->nombre;

      if($area->save()){
          \Alert::message('Área de conocimiento actualizada correctamente', 'success');
          return redirect("/areasconocimiento");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("knowledgeareas.edit",["area" => $area]);
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
      $espacio = Knowledgearea::find($id)->academicspace;
      if(count($espacio)==0){
          Knowledgearea::destroy($id);
          \Alert::message('Área de conocimiento eliminada correctamente', 'success');
          return redirect('/areasconocimiento');
      }else{
          \Alert::message('No se puede eliminar el área de conocimiento', 'danger');
          return redirect('/areasconocimiento');
      }
  }

}
