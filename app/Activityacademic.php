<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activityacademic extends Model
{
  /**
      * Obtiene los espacios de una actividad
      */
      public function academicspace()
      {
          return $this->hasMany('App\Academicspace');
      }
}
