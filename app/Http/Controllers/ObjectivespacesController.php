<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academicprogram;
use App\Academicplan;
use App\Academicspace;
use App\Ability;
use App\Objective;
use App\Objectivespaces;
use App\Typeability;
use App\University;
use App\Faculty;
use App\Objectiveespace;
use App\Weight;

class ObjectivespacesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      $tipoHabilidades = Typeability::pluck('nombre','id')->toArray();
      return view("objectivess.index",["universidades"=>$universidades,"tipoHabilidades"=>$tipoHabilidades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      return view("objectivess.create",["universidades" => $universidades]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $espaciobjetivo = new Objectiveespace;
      $espaciobjetivo->academicspace_id = $request->academicspace_id;
      $espaciobjetivo->objective_id = $request->objective_id;
      $espaciobjetivo->peso = $request->peso;

      if($espaciobjetivo->save()){ 
        \Alert::message('Asignación creada correctamente', 'success');
        return redirect("/asignacion");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("objectivess.create");
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
      $objetivoes = Objectiveespace::find($id);
      $objetivo = Objective::where('id',$objetivoes->objective_id)->get()[0];
      $peso = Weight::where('Objectiveespace_id',$id)->select('peso')->get()[0]->peso;
      $universidades = University::pluck('nombre','id')->toArray();
      $facultades = Faculty::pluck('nombre','id')->toArray();
      $programas = Academicprogram::pluck('nombre','id')->toArray();
      $planes = Academicplan::pluck('nombre','id')->toArray();
      $habilidades = Ability::pluck('nombre','id')->toArray();
      $espacios = Academicspace::pluck('nombre','id')->toArray();
      $objetivos = Objective::pluck('nombre','id')->toArray();

      $idHabilidad = Ability::where('id',$objetivo->ability_id)->select('id','academicplan_id')->get()[0];
      $idPlan = Academicplan::where('id',$idHabilidad->academicplan_id)->select('id','academicprogram_id')->get()[0];
      $idPrograma = Academicprogram::where('id',$idPlan->academicprogram_id)->select('id','faculty_id')->get()[0];
      $idFacultad = Faculty::where('id',$idPrograma->faculty_id)->select('id','university_id')->get()[0];

      return view("objectivess.edit",["idHabilidad"=>$objetivo->ability_id,"peso"=>$peso,"objetivoes"=>$objetivoes,"objetivos"=>$objetivos,"espacios"=>$espacios,"universidades"=>$universidades,"facultades"=>$facultades,"programas"=>$programas,"planes"=>$planes,"habilidades"=>$habilidades,"objetivo"=>$objetivo,"idHabilidad"=>$objetivo->ability_id,"idPlan"=>$idPlan->id,"idPrograma"=>$idPrograma->id,"idFacultad"=>$idFacultad->id,"idUniversidad"=>$idFacultad->university_id]);
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
      $objetivo = Objectiveespace::find($id);
      $peso = Weight::find($id);
      $peso->peso = $request->peso;
      if ($peso->save()) {
          \Alert::message('Asignación actualizada correctamente', 'success');
          return redirect("/asignacion");
      }else{
          \Alert::message('Ocurrio un error, intente nuevamente', 'danger');
          return view("objetivess.edit",["objetivo" => $objetivo]);
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
      $peso = Weight::where('Objectiveespace_id',$id);
      if($peso->delete() && Objectiveespace::destroy($id)){
          \Alert::message('Asignación eliminada correctamente', 'success');
          return redirect('/asignacion');
      }else{
          \Alert::message('No se puede eliminar la asignación', 'danger');
          return redirect('/asignacion');
      }
  }

}
