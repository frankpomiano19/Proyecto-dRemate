@extends('layouts.app')

@section('share-content')
    <meta property="og:url" content="http://dremate.herokuapp.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="dRemate" />
    <meta property="og:description" content="Pagina de subasta online para cualquier tipo de persona" />
@endsection


@section('cont_cabe')
    <title>Productos Populares</title>
@endsection

@section('contenidoJS')

@livewireStyles

@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="{{ asset('css/styleProductosPopulares.css') }}">
    <link rel="stylesheet" href="css/styleProductosPopulares.css">
@endsection


@section('contenido')


<div>
    <livewire:producto-popular />
</div>


@livewireScripts

@endsection

@section('contenidoJSabajo')



@endsection