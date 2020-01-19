<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Planta;
use App\Categoria;
use App\Departamento;

class Equipo extends Model
{
    protected $table ="equipos";

    protected $fillable =[

    	'nombre',
    	'modelo',
    	'marca',
    	'codigo',
    	'descripcion',
        'departamento_id',
        'categoria_id'

    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
