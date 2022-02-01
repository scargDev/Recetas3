<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creación de tabla categorias
        Schema::create('categorias', function(Blueprint $table){
            $table->id();
            $table->String('nombre');
            
            //auditoria
            $table->timestamps();

        });

        Schema::create('recetas', function (Blueprint $table) {
            
            //tabla recetas
            $table->id();
            $table-> string('nombre');
            $table-> text('ingredientes');
            $table-> text('preparacion');
            $table-> string('imagen');

            //almacena la relación de las tablas
            $table-> foreignId('user_id')->references('id')->on('users')->commet('El usuario que crea la receta');
            $table-> foreignId('categoria_id')->references('id')->on('categorias')->commet('categoria de la receta');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     *
     * 
     * @return void
     *  ESTE MÉTODO VERIFICA SI EXISTE EL SCHEMA LO BORRA Y LO CREA OTRA VEZ
     */
    public function down()
    {
        Schema::dropIfExists('recetas');
        Schema::dropIfExists('categorias');
    }
}
