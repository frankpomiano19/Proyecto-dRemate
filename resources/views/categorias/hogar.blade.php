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
    
@endsection


@section('contenido')

<div>
    
    <livewire:hogar />

</div>


@livewireScripts

@endsection

@section('contenidoJSabajo')

<script src="{{ asset('/js/mostrarProductos.js') }}"></script>
<script src="{{ asset('/js/test.js') }}"></script>


@endsection