@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')

    @livewireStyles
    
@endsection

@section('contenidoCSS')
    
@endsection


@section('contenido')

<div>
    
    <livewire:producto-popular />

</div>


@livewireScripts

@endsection

@section('contenidoJSabajo')

<script src="{{ asset('/js/mostrarProductos.js') }}"></script>
<script src="{{ asset('/js/test.js') }}"></script>


@endsection