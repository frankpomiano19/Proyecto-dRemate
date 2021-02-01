@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>
    @livewireStyles

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
    
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
@endsection


@section('contenido')

<br><br>
<livewire:producto-popular />

@livewireScripts

@endsection

@section('contenidoJSabajo')
@endsection