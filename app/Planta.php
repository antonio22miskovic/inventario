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

        'user_id'

    ];
    //uno a uno con user funciona
    public function user(){
    	return $this->belongsTo(User::class);
    }

        // de uno a muchos con equipos
    public function departamentos(){

        return $this->hasMany(Departamento::class);
    }
}
