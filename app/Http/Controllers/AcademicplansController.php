<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academicplan;
use App\Academicprogram;
use App\Faculty;
use App\University;
use App\State;
use Maatwebsite\Excel\Facades\Excel;

class AcademicplansController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      return view("academicplans.index",["universidades"=>$universidades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      $estados = State::pluck('nombre','id')->toArray();
      return view("academicplans.create",["universidades" => $universidades,"estados"=>$estados]);
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
      $plan = new Academicplan;
      $plan->nombre = $request->nombre;
      $plan->academicprogram_id = $request->academicprogram_id;
      $plan->perfil = $request->descripcion;
      $plan->state_id = $request->state_id;
      if($plan->save()){
          \Alert::message('Plan académico creado correctamente', 'success');
          return redirect("/planesacademicos");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("academicplans.create");
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log de materias', 'danger');
       
        $archivo = fopen("storage/planes_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/planesacademicos');
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
      $estados = State::pluck('nombre','id')->toArray();
      $programas = Academicprogram::pluck('nombre','id')->toArray();
      $plan = Academicplan::find($id);
      $idfacultad = \DB::table('academicprograms')
                   ->join('faculties','faculties.id','=','academicprograms.faculty_id')
                   ->where('academicprograms.faculty_id',$plan->academicprogram_id)
                   ->select('faculty_id as id')->get();
      return view("academicplans.edit",["plan"=> $plan,"universidades"=>$universidades,"facultades"=>$facultades,"estados"=>$estados,"programas"=>$programas,"idfacultad"=>$idfacultad[0]->id]);
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
      $plan = Academicplan::find($id);
      $plan->nombre = $request->nombre;
      $plan->academicprogram_id = $request->academicprogram_id;
      $plan->perfil = $request->descripcion;
      $plan->state_id = $request->state_id;

      if($plan->save() ){
          \Alert::message('Plan académico actualizado correctamente', 'success');
          return redirect("/planesacademicos");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("academicplans.edit",["plan" => $plan]);
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log de materias', 'danger');
       
        $archivo = fopen("storage/planes_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/planesacademicos');
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
      $habilidades = Academicplan::find($id)->abilities;
      if(count($habilidades) == 0){
          Academicplan::destroy($id);
          \Alert::message('Plan académico eliminado correctamente', 'success');
          return redirect('/planesacademicos');
      }else{
          \Alert::message('No sé puede eliminar el plan académico', 'danger');
          return redirect('/planesacademicos');
      }
      }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log de materias', 'danger');
       
        $archivo = fopen("storage/planes_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/planesacademicos');
    }
  }
   /**
   * permite crear los planes a partir de un archivo excel
   */
  public function import(){
    try{
    if(\Storage::disk('local')->exists('/public/planes.csv')){
      Excel::load('public/storage/planes.csv', function($reader) {
        foreach ($reader->get() as $book) {
          $plan = new Academicplan();
          $plan->nombre = $book->nombre;
          $plan->academicprogram_id = intval($book->academicprogram_id);
          $plan->state_id = intval($book->state_id);
          $plan->perfil = $book->perfil;
          $plan->save();
        }
      });
      
      \Alert::message('planes académicos importados exitosamente', 'success');
      return redirect('/planesacademicos');
    }else{
      \Alert::message('El archivo planes.csv no existe, importalo por favor', 'danger');
      return redirect('/planesacademicos');
    }
    }catch(Exception $e){
      \Alert::message('ocurrio un error, por favor revise el log de materias', 'danger');
       
        $archivo = fopen("storage/planes_log.txt", "a");
        fwrite($archivo, "===================== ERROR ===========================");
        fwrite($archivo, "\r\n". $e->getMessage()."\r\n");
        fwrite($archivo, "=======================================================");
        fclose($archivo);
        return redirect('/planesacademicos');
    }
  }
}
