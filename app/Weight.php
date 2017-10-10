<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
  /**
   * Obtiene la habilidad a la que pertenece el peso
   */
  public function ability()
  {
      return $this->belongsTo('App\Objective');
  }
  /**
   * Obtiene el objetivo al que pertenece el peso
   */
  public function objectivespace()
  {
      return $this->belongsTo('App\Objectiveespace');
  }
}
