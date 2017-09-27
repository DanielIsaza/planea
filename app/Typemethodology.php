<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typemethodology extends Model
{
  /**
  * Obtiene los espacios academicos de un tipo de metodologia
  */
  public function academicspace()
  {
      return $this->hasMany('App\Academicspace');
  }
}
