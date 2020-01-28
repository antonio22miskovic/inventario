<?php

use Illuminate\Database\Seeder;
use App\Planta;

class PlantaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	Planta::create([

        	'planta' => 'pastas',
    		'descripcion' => 'procesamiento de pastas',
    		'localidad' => 'maracay calle x',
            'rif' => '8321986789163412841894612',


        	]);
        	Planta::create([

        	'planta' => 'nuciven',
    		'descripcion' => 'procesamiento de nucitas',
    		'localidad' => 'maracay calle x',
            'rif' => '8363128362163412841894612',


        	]);

        	Planta::create([

        	'planta' => 'molvenca',
    		'descripcion' => ',olinos de venezuela',
    		'localidad' => 'maracay calle x',
            'rif' => '83219863163412841894612',


        	]);

        	Planta::create([

        	'planta' => 'vitalin',
    		'descripcion' => 'alimentos para animales',
    		'localidad' => 'maracay calle x',
            'rif' => '8321986316858841894612',


        	]);

        	Planta::create([

        	'planta' => 'magdaleno',
    		'descripcion' => 'procesamiento de cacao',
    		'localidad' => 'magdaleno calle x',
            'rif' => '832198631283623423425894612',


        	]);
    }
}
