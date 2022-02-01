<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

//Constructor

public function __construct(){
// verifica si en verdad existe una autentificación, y pdoer poder usar o ejecutar los métidos de más abajo   
$this->middleware('auth');
}



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Capturar el listado de recetas creadas a partir del id del usuario autentificado
        $userRecetas=Auth::user()->userRecetas;
        //retorna la vista de recetas
        return view('recetas.index')->with('userRecetas',$userRecetas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //para cargar la tabla de categorias en la vista
        // $categorias variable que manda a la vista crear recetas la latabla caterogias para escoger
        //Cargar categoria sin modelo
        //$categorias=DB::table('categorias')->pluck('nombre', 'id');

        //obtener categoria con un modelo
        $categorias=Categoria::all(['id', 'nombre']);


        //para ir a la vista de crear recetas
        //manda  a la vista crear recetas la lista de categorias a taves de a variable $categorias
        return view('recetas.create')->with('categorias', $categorias);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //método que va a almacenar los datos de recetas ingresadas

    public function store(Request $request) {
        
        //Muestra toda la información cuando se ingersa la petición -- un array con token crsf --revisar ???
        //vardump
        
        //Trae solo la imagen capturada en el html, ayuda a ver que se está recibiendo
        //Store método que permite almacenar las imagens o informacion en el disco duro de un servidor 
        //en la carpeta public
         
        //dd($request['imagen']->store('upload-recetas', 'public'));

        //FASTUPD-->consultar la imagen
               
        //Validación de los campos del formulario 
         
        $data=request()->validate([    
            'nombre'=>'required|min:6',
            'categoria'=>'required',
            'ingredientes'=>'required',
            'preparacion'=>'required',
            //imagen requerida y que solo sea imagen y que adminta 1 MB
            //'imagen'=>'required|image|size:1000'

        ]);


        //Variable para la ruta de la imagen
        $ruta_imagen=$request['imagen']->store('upload-recetas', 'public');

        //Redimensionar la imagen, tamaño
        $img=Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000,550);
        //guardar en el disco duro del servidor
        //guarda cambio de la imagen
        $img->save();


        //Una vez valdidados arriba almacena los datos en la BDD con estas lineas 
        DB::table('recetas')->insert([
            'nombre'=>$data['nombre'],
            'ingredientes'=>$data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            // nunca almacenar en la VBDD 
            'imagen'=> $ruta_imagen,
            //se importa la clase Auth creada antes por Laravel, pero que tome solo el id del usuario
            'user_id'=>Auth::user()->id,
            'categoria_id'=>$data['categoria']
        
        ]);
        
        //redirecciona al index
        return redirect()->action([RecetaController::class,'index']);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
