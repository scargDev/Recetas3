<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //seeder para quemar los datos de usuarios en la tabla
    public function run()
    {

        //Insertar los usuarios con acceso al sistema
        DB::table('users')->insert([
            'name'=>'Saúl',
            'email'=>'saul.carrera@gmail.com',
            'password'=>Hash::make('12345678'),
            'created_at'=>date('Y-m-d H:i:s'),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'=>'Sergio',
            'email'=>'sergio@gmail.com',
            'password'=>Hash::make('12345678'),
            'created_at'=>date('Y-m-d H:i:s'),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
