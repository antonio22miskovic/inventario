<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

        	'name' => 'juan',
        	'apellido' => 'lara',
        	'cedula' => '127137013',
        	'email' => 'juan@gmail.com',
        	'password' => bcrypt(1234),
            'planta_id' => 1

        ]);

        User::create([

        	'name' => 'ramon',
        	'apellido' => 'villalobos',
        	'cedula' => '26382644',
        	'email' => 'ramon@gmail.com',
        	'password' => bcrypt(1234),
            'is_admin' => 'true'


        ]);

        User::create([

        	'name' => 'gabriel',
        	'apellido' => 'viloria',
        	'cedula' => '24234442',
        	'email' => 'vilo@gmail.com',
        	'password' => bcrypt(1234),
            'planta_id' => 2,


        ]);

        User::create([

        	'name' => 'maria',
        	'apellido' => 'perez',
        	'cedula' => '2423421',
        	'email' => 'perez@gmail.com',
        	'password' => bcrypt(1234),
             'planta_id' => 3,


        ]);

        User::create([

        	'name' => 'carlos',
        	'apellido' => 'fernandez',
        	'cedula' => '214423425',
        	'email' => 'calos@gmail.com',
        	'password' => bcrypt(1234),
             'planta_id' => 4,


        ]);

        User::create([

        	'name' => 'manuel',
        	'apellido' => 'lopez',
        	'cedula' => '1234312412',
        	'email' => 'manuel@gmail.com',
        	'password' => bcrypt(1234),
             'planta_id' => 5,


        ]);
    }
}
