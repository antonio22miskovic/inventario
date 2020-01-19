<?php

use Illuminate\Database\Seeder;
use App\Departamento;


class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Departamento::class,100)->create();
    }
}
