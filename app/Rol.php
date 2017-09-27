<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  /**
   * Obtiene los permisos del rol
   */
  public function autorize()
  {
      return $this->hasMany('App\Authorize');
  }
}
