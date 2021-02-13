<?php

use Illuminate\Database\Seeder;
use App\Equipo;

class EquipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Equipo::class,20)->create();
    }
}
