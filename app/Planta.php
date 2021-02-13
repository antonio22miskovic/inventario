<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Equipo;

class Planta extends Model
{
    protected $table ="plantas";

    protected $fillable = [

    	'planta',
    	'descripcion',
    	'localidad',

    ];

     protected $hidden = [

        'user_id'

    ];
    //uno a uno con user funciona
    public function user(){
    	return $this->belongsTo(User::class);
    }

        // de uno a muchos con equipos
    public function equipos(){

        return $this->hasMany(Equipo::class);
    }
}
