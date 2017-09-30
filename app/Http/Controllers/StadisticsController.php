<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
use App\Knowledgearea;
use App\Ability;
use App\Objective;
use App\Academicplan;

class StadisticsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      return view('stadistics.index',["universidades"=>$universidades]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexA()
  {
      $areas = Knowledgearea::pluck('nombre','id')->toArray();
      $universidades = University::pluck('nombre','id')->toArray();
      return view('stadistics.indexA',["universidades"=>$universidades,"areas"=>$areas]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexT()
  {
      $universidades = University::pluck('nombre','id')->toArray();
      $ac = Knowledgearea::find(2);
      $habilidades = Academicplan::find(2)->abilities;
      return view('stadistics.indexT',["universidades"=>$universidades,'ac'=>array($ac),'h' => $habilidades]);
  }
}
