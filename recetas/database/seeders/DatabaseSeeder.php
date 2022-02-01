<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     // Este metodo llama al seeder para su ejecución
    public function run()
    {
        //llamar al seeder que quema los datos de categorias
        $this->call(CategoriasSeeder::class);
        //llamar al seeder que quema los datos de usuarios de acceso a la base
        $this->call(UserSeeder::class);
    }
}
