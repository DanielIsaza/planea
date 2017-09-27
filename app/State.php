<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  /**
  * Obtiene los planes academicos del estado
  */
  public function academicplans()
  {
      return $this->hasMany('App\Academicplan');
  }
}
