<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Equipo;
use App\Departamento;
use App\Categoria;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

$factory->define(Equipo::class, function (Faker $faker) {
    return [

    	'nombre' => $faker->name,
    	'modelo'=> $faker->sentence,
    	'marca' => $faker->title,
    	'codigo' => Str::random(6),
    	'descripcion' => $faker->name,
    	'departamento_id' => Departamento::all()->random()->id,
        'categoria_id' => Categoria::all()->random()->id

    ];
});
