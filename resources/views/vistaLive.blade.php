@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
    @livewireStyles
    
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/styleProduct.css">
    
@endsection


@section('contenido')

<div>
    <br><br>

    @if($productos->count())
        <h4 class="mx-3">Resultados para: "{{ $nombreProducto }}"</h4>
        <div class="row m-3">

        @foreach ($productos as $producto)
            <div class="col-4">
                <div class="card m-1 p-0">
                    <div class="card-body">
                        <h5 class="card-title">{{$producto->nombre_producto}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$producto->ubicacion}}</li>
                        <li class="list-group-item">{{$producto->precio_inicial}}</li>
                        <li class="list-group-item">{{$producto->categoria_id}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">{{$producto->condicion}}</a>
                        <a href="#" class="card-link">{{$producto->ubicacion}}</a>
                    </div>
                </div>
            </div>
                    
        @endforeach
        </div>
        @else
        <div class="text-center">
            <h4 class="my-1">Ups, no existe un producto con nombre "{{ $nombreProducto }}".</h4>
            <img class="img-fluid my-3 animate__animated animate__bounceInLeft" src="{{ asset('img/undraw_Taken_re_yn20.svg') }}" style="width: 30%; heigth: 30%;" alt="insertar SVG con la etiqueta image">
        </div>
    @endif
    
    {{-- <livewire:busqueda> --}}

</div>
@livewireScripts

@endsection

@section('contenidoJSabajo')
@endsection