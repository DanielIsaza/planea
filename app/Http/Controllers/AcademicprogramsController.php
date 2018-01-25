<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academicprogram;
use App\Faculty;
use App\University;
use Maatwebsite\Excel\Facades\Excel;

class AcademicprogramsController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universidades = University::pluck('nombre','id')->toArray();
        $programas  = array();
        return view("academicprograms.index",["programas"=>$programas, "universidades"=>$universidades]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universidades = University::pluck('nombre','id')->toArray();
        $programa = new Academicprogram;
        return view("academicprograms.create",["universidades" => $universidades]);
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
        $programa = new Academicprogram;
        $programa->nombre = $request->nombre;
        $programa->faculty_id = $request->faculty_id;
        if($programa->save()){
            \Alert::message('Programa académico creado correctamente', 'success');
            return redirect("/programasacademicos");
        }else{
            \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
            return view("academicprograms.create");
        }
        }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/programas_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/programasacademicos');
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
        $universidades = University::pluck('nombre','id')->toArray();
        $facultades = Faculty::pluck('nombre','id')->toArray();
        $programa = Academicprogram::find($id);
        return view("academicprograms.edit",["programa"=> $programa,"universidades"=>$universidades,"facultades"=>$facultades]);
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
        $programa = Academicprogram::find($id);
        $programa->nombre = $request->nombre;
        $programa->faculty_id = $request->faculty_id;
        if($programa->save()){
            \Alert::message('Programa académico actualizado correctamente', 'success');
            return redirect("/programasacademicos");
        }else{
            \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
            return view("academicprograms.edit",["programa" => $programa]);
        }
        }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/programas_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/programasacademicos');
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
        $planes = Academicprogram::find($id)->academicplans;
        if(count($planes)==0){
            Academicprogram::destroy($id);
            \Alert::message('Programa académico eliminado correctamente', 'success');
            return redirect('/programasacademicos');
        }else{
            \Alert::message('No se puede eliminar el programa académico', 'danger');
            return redirect('/programasacademicos');
        }
        }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/programas_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/programasacademicos');
    }
    }
    /**
   * permite crear los programas a partir de un archivo excel
   */
  public function import(){
    try{
    if(\Storage::disk('local')->exists('/public/programas.csv')){
      Excel::load('public/storage/programas.csv', function($reader) {
        foreach ($reader->get() as $book) {
          $programa = new Faculty();
          $programa->nombre = $book->nombre;
          $programa->faculty_id = intval($book->faculty_id);
          $programa->save();
        }
      });
      
      \Alert::message('Programas académicos importados exitosamente', 'success');
      return redirect('/programas');
    }else{
      \Alert::message('El archivo programas.csv no existe, importalo por favor', 'danger');
      return redirect('/programas');
    }
    }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log', 'danger');
       
        $archivo = fopen("storage/programas_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/programasacademicos');
    }
  }
}