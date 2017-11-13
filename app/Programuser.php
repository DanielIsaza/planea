<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programuser extends Model
{
    /**
	* Obtiene la facultad del programa
	*/
    public function users()
    {
        return $this->belongsTo('App\Faculty');
    }
    /**
	* Obtiene la facultad del programa
	*/
    public function academicprograms()
    {
        return $this->belongsTo('App\Faculty');
    }
}
