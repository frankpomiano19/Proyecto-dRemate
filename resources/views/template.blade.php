@extends('layouts.app')


@section('share-content')
    <meta property="og:url" content="https://huamanangel.github.io/pruebaBorrar/" />
    <meta property="og:type" content="dreamte " />
    <meta property="og:title" content="Caminante no hay camino" />
    <meta property="og:description" content="Empresa encargada de hacer varios gaa" />
    <meta property="og:image" content="https://data.pixiz.com/output/user/frame/preview/400x400/9/0/0/7/2917009_563ba.jpg" /> --}}
@endsection


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

            <i class="fa fa-question-circle-o" aria-hidden="true"></i>
            <i class="fa fa-question-circle-o" aria-hidden="true"></i>
            <i class="fa fa-question-circle-o" aria-hidden="true"></i>

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
