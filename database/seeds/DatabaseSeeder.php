<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
          $this->call(PlantaTableSeeder::class);
           $this->call(CategoriaTableSeeder::class);
            $this->call(EquipoTableSeeder::class);
    }
}
