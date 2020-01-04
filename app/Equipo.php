<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Planta;
use App\Categoria;

class Equipo extends Model
{
    protected $table ="equipos";

    protected $fillable =[

    	'nombre',
    	'modelo',
    	'marca',
    	'codigo',
    	'descripcion',

    ];

    protected $hidden = [
    	'planta_id',
        'categoria_id'
    ];

    public function planta(){
        return $this->belongsTo(Planta::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
