@extends('layouts.app')


@section('cont_cabe')
    <title>Subtitulo - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
@endsection


@section('contenido')
    <br>
    <br>
    <br>
    <div>
        <h1 class="animate__animated animate__backInDown">An animated element</h1>
    </div>
    <h2 class="animate__animated animate__bounceInLeft">Otro elemento animado</h2>
    <div class="animate__animated animate__bounce animate__delay-2s">Example</div>

@endsection

@section('contenidoJSabajo')
    <script>
        Swal.fire({
            html: `<h1>Valor entregado</h1>
                    <p>Cenicienta</p>`,
            title: "Vent realizada",
            text: "Texto",
            icon: "success",
            confirmButtonText: "Aceptar"
        });

    </script>

    <!-- Colocar js abajo-->
@endsection
