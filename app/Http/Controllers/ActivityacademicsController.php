<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activityacademic;

class ActivityacademicsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $actividades = Activityacademic::all();
      return view("activityacademics.index",["actividades"=>$actividades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $actividad = new Activityacademic;
      return view("activityacademics.create",["actividad"=> $actividad]);
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
      $actividad = new Activityacademic;
      $actividad->nombre = $request->nombre;

      if($actividad->save()){
          \Alert::message('Actividad académica creada correctamente', 'success');
          return redirect("/actividadesacademicas");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("activityacademics.create");
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/actividades_academicas_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/actividadesacademicas');
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
      $actividad = Activityacademic::find($id);
      return view("activityacademics.edit",["actividad"=> $actividad]);
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
      $actividad = Activityacademic::find($id);
      $actividad->nombre = $request->nombre;

      if($actividad->save()){
          \Alert::message('Actividad académica actualizada correctamente', 'success');
          return redirect("/actividadesacademicas");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("activityacademics.edit",["actividad" => $actividad]);
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/actividades_academicas_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/actividadesacademicas');
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
      $espacios = Activityacademic::find($id)->academicspace;
      if (count($espacios) == 0) {
          Activityacademic::destroy($id);
          \Alert::message('Actividad académica eliminada correctamente', 'success');
          return redirect('/actividadesacademicas');
      }else{
          \Alert::message('No se puede eliminar la actividad académica', 'danger');
          return redirect('/actividadesacademicas');
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/actividades_academicas_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/actividadesacademicas');
    }
  }
}
