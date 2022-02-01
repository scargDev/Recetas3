@extends('layouts.app')


<!-- Estilos, se cargan solo  en los html que querramos, se definió en layouts CDNJS-->
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />">
@endsection


<!-- Inyectae todo el contenido del layout app.blade en yield('content') , se puede cambiar el nombre del layout
content-->
@section('content')

@section('botones')
<a href="{{route('recetas.index')}}" class="btn btn-primary mr-2  text-white">Lista de Recetas</a>

@endsection
<!--hola-->
@section('content')
<h2 class="text-center mb-5">Crear nueva receta </h2>
<div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{route('recetas.store')}}" enctype="multipart/form-data" novalidate>
                <!--Token único crsf seguridad para peticiones-->
                @csrf

                <!--NOMBRE RECETA-->
                <div class="form-group">
                    <label for="nombre">Nombre Receta</label>
                     <!--incluye pintar recuadro en error en caso de haber error y que tome el valor antiguoa antes de enviar formulario-->
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="Nombre receta" value="{{old('nombre')}}" >
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <p> </p>
                 </div>

                 <!--CATEGORÍAS-->
                <div class="form-   group">
                    <label for="categoria">Categoria</label>
                     <select name="categoria" class ="form-control" @error ('nombre') is-invalid @enderror id="categoria"> 
                         <!--captura la variable categorias que contiene la lista de cateforias a escoger-->
                        <option value=" ">--Seleccione--</option>
                         @foreach ( $categorias as $categoria);
                         <!--valida error old y lo siguinete mantiene seleccionada la opcion escogida sino se manteine en cero-->
                        <option value="{{$categoria->id}}" {{old('categoria')==$categoria->id?'selected':''}}>{{$categoria->nombre}} </option>
                        @endforeach
                       </select>
                </div>
                <!--valida error para la vista de crear recetas sobre ecoga una opción del menú-->
                @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

                <div>
                    <p> </p>
                 </div>

                 <!--INGREDIENTES-->

                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                     <!--incluye pintar recuadro en error en caso de haber error y que tome el valor antiguoa antes de enviar formulario. priiedad hiden para esconder y poder usar trix editor-->
                    <input name="ingredientes" type="hidden" id="ingredientes" value="{{old('ingredientes')}}" >
                    <trix-editor class ="form-control" @error ('ingredientes') is-invalid @enderror id="ingredientes" input="ingredientes"> </trix-editor>
                    @error('ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                    
                <div>
                    <p> </p>
                 </div>

                  <!--PREPARACIÓN-->
                <div class="form-group">
                    <label for="preparacion">Preparación</label>
                     <!--incluye pintar recuadro en error en caso de haber error y que tome el valor antiguoa antes de enviar formulario. priiedad hiden para esconder y poder usar trix editor-->
                    <input name="preparacion" type="hidden" id="preparacion" value="{{old('preparacion')}}" >
                    <trix-editor class ="form-control" @error ('preparacion') is-invalid @enderror id="preparacion" input="preparacion"> </trix-editor>
                    @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                
                <div>
                    <p> </p>
                 </div>


                <!--IMÁGENES-->
                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" class ="form-control" @error ('imagen') is-invalid @enderror id="imagen" input="imagen" class="form control"/ name="imagen">
                    @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>


                <div>
                   <p> </p>
                </div>

                <!--Botón agregar-->
                <div class="form-group"> 
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

<!-- Estilos-->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>> 
@endsection
