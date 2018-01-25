<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typeability;

class TypeabilitiesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $tiposHabilidades = Typeability::all();
      return view("typeabilities.index",["tiposHabilidades"=>$tiposHabilidades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $tiposhabilidad = new Typeability;
      return view("typeabilities.create",["tiposhabilidad" => $tiposhabilidad]);
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
      $tipoHabilidad = new Typeability;
      $tipoHabilidad->nombre = $request->nombre;

      if($tipoHabilidad->save()){
          \Alert::message('Tipo de habilidad creada correctamente', 'success');
          return redirect('/tiposhabilidad');
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("typeabilities.create");
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/tipo_habilidades_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/tiposhabilidad');
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
      $tiposhabilidad = Typeability::find($id);
      return view("typeabilities.edit",["tiposhabilidad"=>$tiposhabilidad]);
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
      $tiposhabilidad = Typeability::find($id);
      $tiposhabilidad->nombre = $request->nombre;

      if($tiposhabilidad->save()){
          \Alert::message('Tipo de habilidad actualizada correctamente', 'success');
          return redirect('/tiposhabilidad');
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("typeabilities.edit",["tiposhabilidad"=>$tiposhabilidad]);
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/tipo_habilidades_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/tiposhabilidad');
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
      $habilidad = Typeability::find($id)->abilities;
      if(count($habilidad) == 0){
          Typeability::destroy($id);
          \Alert::message('Tipo de habilidad eliminada correctamente', 'success');
          return redirect('/tiposhabilidad');
      }else{
          \Alert::message('El tipo de habilidad no se puede eliminar', 'danger');
          return redirect('/tiposhabilidad');
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/tipo_habilidades_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/tiposhabilidad');
    }
  }

}
