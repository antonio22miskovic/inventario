<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Equipo;
use App\Departamento;

class Planta extends Model
{
    protected $table ="plantas";

    protected $fillable = [

    	'planta',
    	'descripcion',
    	'localidad',
        'rif'

    ];

     protected $hidden = [


    ];
    //uno a muchos con user funciona
    public function users(){
        return $this->hasMany(User::class);
    }

        // de uno a muchos con equipos
    public function departamentos(){

        return $this->hasMany(Departamento::class);
    }
}
