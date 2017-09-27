<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeability extends Model
{
  /**
  *obtiene las habilidades de un tipo
  */
  public function abilities()
  {
    return $this->hasMany('App\Ability');
  }
}
