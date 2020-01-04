<?php

namespace App;
use App\Equipo;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

protected $table = "categorias";

protected $fillable = [

	'categoria',
	'descripcion'

];

public function equipos(){
	return $this->hasMany(Equipo::class);
}
}
