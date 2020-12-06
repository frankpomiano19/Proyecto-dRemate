@extends('layouts.app')


@section('cont_cabe')
    <title>Producto-Subasta</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!--footer.css pal footer / barra.css pal navbar / no es necesario el fontawesome-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/barra.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/menuSubasta.css">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
@endsection


@section('contenido')
        <div class="container-md border rounded-lg cuerpo">
            <h1 class="text-center">¿Qué deseas hacer?</h1><br>
            <div class="row">
                <div class="col-md-6 col-12 my-1 col-sm-6 center-col text-center"> <a href="{{ url('/registroProducto') }}" class="highlight-button btn btn-large button xs-margin-bottom-five" data-abc="true"><i class="fa fa-edit"></i>Registrar producto</a></div>
                <div class="col-md-6 col-12 my-1 col-sm-6 center-col text-center"> <a href="{{ url('/registroSubasta') }}" class="highlight-button btn btn-large button xs-margin-bottom-five" data-abc="true"><i class="fa fa-tag"></i>Registrar y subastar producto</a></div><br><br><br><br><br><br><br><br><br><br>
            </div>

        </div>
        

        @endsection

        @section('contenidoJSabajo')
        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <script src="{{ asset('js/fechaSubasta.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="/js/parsley.js"></script>
        <script src="{{ asset('js/producto.js') }}"></script>
        <script src="https://use.fontawesome.com/c9d7a705d9.js"></script>
            <!-- Colocar js abajo-->
        @endsection
