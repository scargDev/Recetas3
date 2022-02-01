<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;



//Rutas de las páginas, también hacen los mismo los controllers, se usan más.

Route::get('/', function () {
    return view('welcome');
});


Route::get('/nosotros', function () {
    return view('nosotros');
});

//LLama al método prueba de la clase  RecetaController, llama una ruta desde el controlador
                                                        //regresar al menú anterior de recetas
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');

//ruta para ir a vista de crear recetas, método create para crear
Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');

//ruta para ir a vista agregar receta, étodo store para almacenar
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
