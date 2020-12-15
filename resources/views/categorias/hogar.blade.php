@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')

   
    
    @livewireStyles

    <script src="{{ asset('/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.countdown.package-2.1.0/js/jquery.countdown.js') }}"></script>

    
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



@endsection