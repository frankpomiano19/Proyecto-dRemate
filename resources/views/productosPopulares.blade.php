@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
    
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
@endsection


@section('contenido')

<br><br>
<h1>Aqui van los productos populares{{ $variable }}</h1>
@foreach ($productos as $producto)
    Nombre de producto: {{ $producto->nombre_producto }}, Numero de me gusta: {{ $producto->favorito }} <br>
@endforeach

@endsection

@section('contenidoJSabajo')
@endsection