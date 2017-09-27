<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academicplan extends Model
{
  /**
  * obtiene el programa academico del plan
  */
  public function academicprogram()
  {
      return $this->belongsTo('App\Academicprogram');
  }
  /**
  * obtiene el estado del plan
  */
  public function state()
  {
      return $this->belongsTo('App\State');
  }
  /**
  * obtiene las habilidades del plan academico
  */
  public function abilities()
  {
      return $this->hasMany('App\Ability');
  }
  /**
  * obtiene las habilidades del plan academico
  */
  public function academicspace()
  {
      return $this->hasMany('App\Academicspace');
  }
}
