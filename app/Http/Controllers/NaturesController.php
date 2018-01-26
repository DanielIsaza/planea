<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nature;

class NaturesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $natures = Nature::all();
      return view("natures.index",["natures"=>$natures]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $nature = new Nature;
      return view("natures.create",["nature"=> $nature]);
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
      $nature = new Nature;
      $nature->nombre = $request->nombre;

      if($nature->save()){
          \Alert::message('Naturaleza creada correctamente', 'success');
          return redirect("/naturaleza");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("natures.create");
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/naturaleza_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/areasconocimiento');
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
      $nature = Nature::find($id);
      return view("natures.edit",["nature"=> $nature]);
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
      $nature = Nature::find($id);
      $nature->nombre = $request->nombre;

      if($nature->save()){
          \Alert::message('Naturaleza actualizado correctamente', 'success');
          return redirect("/naturaleza");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("natures.edit",["nature" => $nature]);
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/naturaleza_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/areasconocimiento');
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
      $espacio = Nature::find($id)->academicspace;
      if(count($espacio) == 0){
          Nature::destroy($id);
          \Alert::message('Naturaleza eliminada correctamente', 'success');
          return redirect('/naturaleza');
      }else{
          \Alert::message('No se puede eliminar la naturaleza', 'danger');
          return redirect('/naturaleza');
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/naturaleza_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/areasconocimiento');
    }
  }

}
