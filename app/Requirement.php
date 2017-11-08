<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
	/**
	* Obtiene el plan academico del programa
  	*/
  	public function academicspace()
  	{
    	return $this->belongsTo('App\Academicspace');
  	} 
}