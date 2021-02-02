@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')

    @livewireStyles
    
@endsection

@section('contenidoCSS')
    <link href="{{ asset('css/mostrarProductos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleSubastaRapida.css')}}">
    <link rel="stylesheet" href="css/corazon-icon.css">
    
@endsection


@section('contenido')

<div>
    
    <livewire:busqueda-filtro />

</div>


@livewireScripts

@endsection

@section('contenidoJSabajo')

<script src="{{ asset('/js/mostrarProductos.js') }}"></script>
<script src="{{ asset('/js/test.js') }}"></script>


@endsection