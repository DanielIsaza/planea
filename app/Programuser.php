<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programuser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','academicprogram_id','user_id',
    ];
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
