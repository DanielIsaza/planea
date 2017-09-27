<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objectiveespace extends Model
{
  /**
   * Obtiene la habilidad a la que pertenece el objetivo
   */
  public function objective()
  {
      return $this->belongsTo('App\Objective');
  }
  /**
   * Obtiene el espacio academico relacionados
   */
  public function academicspace()
  {
      return $this->belongsTo('App\Academicspace');
  }
  /**
  * Obtiene los pesos del objetivo
  */
  public function weight()
  {
      return $this->hasMany('App\Weight');
  }
}
