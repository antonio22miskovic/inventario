<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Planta;
use App\Equipo;

class Departamento extends Model
{
    protected $table ='departamentos';

    protected $fillable =[

    	'departamento',
    	'descripcion',
        'planta_id'

    ];

    public function planta(){
    	return $this->belongsTo(Planta::class);
    }

    public function equipos(){
    	return $this->hasMany(Equipo::class);
    }
}
