<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
  /**
   * Obtiene las facultades de la universidad
   */
  public function faculties()
  {
      return $this->hasMany('App\Faculty');
  }
}
