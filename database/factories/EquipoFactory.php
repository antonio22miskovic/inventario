<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Equipo;
use App\Planta;
use App\Categoria;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

$factory->define(Equipo::class, function (Faker $faker) {
    return [
    	'nombre' => $faker->name,
    	'modelo'=> $faker->sentence,
    	'marca' => $faker->title,
    	'codigo' => Str::random(6),
    	'descripcion' => $faker->paragraph,
    	'planta_id' => Planta::all()->random()->id,
        'categoria_id' => Categoria::all()->random()->id

    ];
});
