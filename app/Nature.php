<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nature extends Model
{
  /**
   * Obtiene los espacios academicos de una naturaleza
   */
   public function academicspace()
   {
       return $this->hasMany('App\Academicspace');
   }
 }
