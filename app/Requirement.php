<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
	protected $fillable = array('academicspaceD_id','academicspace_id');
	/**
	* Obtiene el plan academico del programa
  	*/
  	public function academicspace()
  	{
    	return $this->belongsTo('App\Academicspace');
  	} 
}