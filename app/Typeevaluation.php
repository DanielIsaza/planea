<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeevaluation extends Model
{
  /**
  * Obtiene los espacios academicos de un tipo de evaluacion
  */
  public function academicspace()
  {
      return $this->hasMany('App\Academicspace');
  }
}
