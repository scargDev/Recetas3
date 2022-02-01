<!-- Heredar todo el html de layout app.blade -->
@extends('layouts.app')

<!-- Inyectae todo el contenido del layout app.blade en yield('content') , se puede cambiar el nombre del layout
content-->
@section('content')
@section('botones')
<a href="{{route('recetas.create')}}" class="btn btn-primary mr-2  text-white">Crear Recetas</a>
@endsection

<h2 class="text-center mb-5"> Administrar Recetas</h2>

<!-- Vista de la opción lsta de recetas y sus acciones-->

<div class="col-mid-10 mx-auto bg-primary p-3">
    <table class="table">
        <thead class="bg primary text-black">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $userRecetas as $userReceta)

                
            
            <tr>
                <td>{{$userReceta->nombre}}</td>
                <td>{{$userReceta->categoria_id}}</td>
                <td>
                    <a href="" class="btn btn-success">Ver</a>
                    <a href="" class="btn btn-dark">Editar</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
                <td>.......</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection