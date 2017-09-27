<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  /**
  * Obtiene los espacios academicos del semestre
  */
  public function academicspaces()
  {
    return $this->hasMany('App\Academicspace');
  }
}
