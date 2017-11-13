<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academicprogram extends Model
{
  /**
	* Obtiene la facultad del programa
	*/
    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
    /**
    * Obtiene los planes academicos del programa
    */
    public function academicplans()
    {
        return $this->hasMany('App\Academicplan');
    }
    /**
     * Obtiene los permisos del programa academico
     */
    public function users()
    {
        return $this->hasMany('App\Programuser');
    }
}
