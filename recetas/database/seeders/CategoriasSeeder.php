<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     // Aquí se ejecuta el seeder, 
     //Estas tablas guardan las categorias de las recetas, quemadas en la BDD
    public function run()
    {
        DB::table('Categorias')->insert([
            'nombre'=>'Ensalada',
            'created_at'=>date('Y-m-d H:i:s'),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('Categorias')->insert([
            'nombre'=>'Sopas',
            'created_at'=>date('Y-m-d H:i:s'),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);


        DB::table('Categorias')->insert([
            'nombre'=>'Postres',
            'created_at'=>date('Y-m-d H:i:s'),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('Categorias')->insert([
            'nombre'=>'Pizza',
            'created_at'=>date('Y-m-d H:i:s'),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);


    }
}
