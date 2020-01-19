<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Departamento;
use App\Planta;
use Faker\Generator as Faker;

$factory->define(Departamento::class, function (Faker $faker) {
    return [
    	'descripcion' => $faker->name,
    	'departamento' => $faker->name,
        'planta_id' => Planta::all()->random()->id
    ];
});
