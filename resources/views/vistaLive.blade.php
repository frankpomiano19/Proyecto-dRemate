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
    
    <livewire:busqueda>

</div>
@livewireScripts

@endsection

@section('contenidoJSabajo')
@endsection