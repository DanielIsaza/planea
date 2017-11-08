<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academicspace extends Model
{
  /**
* Obtiene el plan academico del programa
*/
  public function academicplan()
  {
      return $this->belongsTo('App\Academicplan');
  }
  /**
* Obtiene el plan academico del programa
*/
  public function activityacademic()
  {
      return $this->belongsTo('App\Activityacademic');
  }
  /**
* Obtiene el plan academico del programa
*/
  public function knowledgearea()
  {
      return $this->belongsTo('App\Knowledgearea');
  }
  /**
* Obtiene el plan academico del programa
*/
  public function nature()
  {
      return $this->belongsTo('App\Nature');
  }
  /**
* Obtiene el plan academico del programa
*/
  public function semester()
  {
      return $this->belongsTo('App\Semester');
  }
  /**
* Obtiene el plan academico del programa
*/
  public function typeability()
  {
      return $this->belongsTo('App\Typeability');
  }
  /**
* Obtiene el plan academico del programa
*/
  public function typeevaluation()
  {
      return $this->belongsTo('App\Typeevaluation');
  }
  /**
* Obtiene el plan academico del programa
*/
  public function typemethodology()
  {
      return $this->belongsTo('App\Typemethodology');
  }
  /**
  * Obtiene los objetivos del espacio academico
  */
  public function objective()
  {
      return $this->hasMany('App\Objectiveespace');
  }
  /**
  * Obtiene los requisitos del espacio academico
  */
  public function requirement()
  {
      return $this->hasMany('App\Requirement');
  }
}
