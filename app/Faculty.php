<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
  /**
   * Obtiene la universidad de la facultad
   */
  public function university()
  {
      return $this->belongsTo('App\University');
  }
  /**
  * Obtiene los programas academicos de la facultad
  */
  public function academicprograms()
  {
      return $this->hasMany('App\Academicprogram');
  }
}
