@extends('layouts.app')


@section('cont_cabe')
    <title>Registrar producto</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
        <script src="js/jquery-3.5.1.js"></script>
        <script src="parsley.min.js"></script>
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/menuSubasta.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
    
   
  
@endsection


@section('contenido')
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">D'REMATE</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CATEGORIAS
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Articulos de moda</a>
                <a class="dropdown-item" href="#">Productos tecnologicos</a>
                <a class="dropdown-item" href="#">Articulos para el hogar</a>
                <a class="dropdown-item" href="#">Deportes y ocio</a>
                <a class="dropdown-item" href="#">Antigüedades</a>
                <a class="dropdown-item" href="#">Articulos de jardineria</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Ver todas</a>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">SUBASTAS EN VIVO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">NOVEDADES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">REGISTRATE</a>
        </li>
      </ul>
      <ul>
          <li>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </li>
      </ul>
      
    </div>
</nav>

    <body class="antialiased" >

        <div class="container-md border rounded-lg cuerpo">
            <h1 class="text-center">¿Qué deseas hacer?</h1><br>
            <div class="row">
                <div class="col-md-6 col-12 my-1 col-sm-6 center-col text-center"> <a href="{{ url('/registroProducto') }}" class="highlight-button btn btn-large button xs-margin-bottom-five" data-abc="true"><i class="fa fa-edit"></i>Registrar producto</a></div>
                <div class="col-md-6 col-12 my-1 col-sm-6 center-col text-center"> <a href="{{ url('/registroSubasta') }}" class="highlight-button btn btn-large button xs-margin-bottom-five" data-abc="true"><i class="fa fa-tag"></i>Registrar y subastar producto</a></div><br><br><br><br><br><br><br><br><br><br>
            </div>

        </div>
        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <script src="{{ asset('js/fechaSubasta.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="/js/parsley.js"></script>
        <script src="{{ asset('js/producto.js') }}"></script>

        @endsection

        @section('contenidoJSabajo')
        <script src="https://use.fontawesome.com/c9d7a705d9.js"></script>
            <!-- Colocar js abajo-->
        @endsection
