<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledgearea extends Model
{
  /**
  * Obtiene los espacios academicos de un area de conocimiento
  */
  public function academicspace()
  {
      return $this->hasMany('App\Academicspace');
  }
}
