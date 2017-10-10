<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\University;
use Maatwebsite\Excel\Facades\Excel;

class FacultiesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      return view("faculties.index",["universidades"=>$universidades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $universidades = University::pluck('nombre','id');
      $facultad = new Faculty;
      return view("faculties.create",["facultad"=> $facultad,"universidades" => $universidades]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $facultad = new Faculty;
      $facultad->nombre = $request->nombre;
      $facultad->university_id = $request->university_id;
      if($facultad->save()){
          \Alert::message('Facultad creada correctamente', 'success');
          return redirect("/facultades");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("faculties.create");
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
      $facultad = Faculty::find($id);
      $universidades = University::pluck('nombre','id');
      return view("faculties.edit",["facultad"=> $facultad,"universidades"=>$universidades]);
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
      $facultad = Faculty::find($id);
      $facultad->nombre = $request->nombre;
      $facultad->university_id = $request->university_id;
      if($facultad->save()){
          \Alert::message('Facultad actualizada correctamente', 'success');
          return redirect("/facultades");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("faculties.edit",["facultad" => $facultad]);
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
      $programas = Faculty::find($id)->academicprograms;
      if(count($programas) == 0){
          Faculty::destroy($id);
          \Alert::message('Facultad eliminada correctamente', 'success');
          return redirect('/facultades');
      }else{
          \Alert::message('No se puede eliminar la facultad', 'danger');
          return redirect('/facultades');
      }
  }
  /**
   * permite crear las facultades a partir de un archivo excel
   */
  public function import(){
    if(\Storage::disk('local')->exists('/public/facultades.csv')){
      Excel::load('public/storage/facultades.csv', function($reader) {
        foreach ($reader->get() as $book) {
          $facultad = new Faculty();
          $facultad->nombre = $book->nombre;
          $facultad->university_id = intval($book->university_id);
          $facultad->save();
        }
      });
      
      \Alert::message('Facultades importadas exitosamente', 'success');
      return redirect('/facultades');
    }else{
      \Alert::message('El archivo facultades.csv no existe, importalo por favor', 'danger');
      return redirect('/facultades');
    }
  }
}
