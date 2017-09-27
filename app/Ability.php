<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
  /**
* obtiene el tipo de habilidad de la habilidad
**/
  public function typeability()
  {
      return $this->belongsTo('App\Typeability');
  }
  /**
  * obtiene el tipo de habilidad de la habilidad
  **/
  public function academicplan()
  {
      return $this->belongsTo('App\Academicplan');
  }
  /**
  * Obtiene los objetivos de una habilidad
  */
  public function objective()
  {
      return $this->hasMany('App\Objective');
  }
  /**
  * Obtiene los pesos de una habilidad
  */
  public function weight()
  {
      return $this->hasMany('App\Weight');
  }
}
