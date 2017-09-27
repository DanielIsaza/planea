<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuthorize extends Model
{
  /**
* obtiene el usuario asociado
*/
  public function user()
  {
      return $this->belongsTo('App\User');
  }
  /**
* obtiene el rol asociado
*/
  public function rol()
  {
      return $this->belongsTo('App\Rol');
  }
  /**
* obtiene el programa asociado
*/
  public function academicprogram()
  {
      return $this->belongsTo('App\academicprogram');
  }
}
