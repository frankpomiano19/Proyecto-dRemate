<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->

    <!--<title>@yield('titulo')-dRemate</title>-->

    @yield('cont_cabe')
    <!-- Scripts -->
    @yield('contenidoJS')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

    @yield('contenidoCSS')

</head>

<body>

    @php
    $stringRuta = \Request::route()->getName();
    if($stringRuta == "welcome"){
        
    }
    @endphp

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">

        <div class="container">
            <a class="navbar-brand" href="{{route("welcome")}}">dRemate</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <!--Barra de busqueda-->
                  <form class="form-inline">
                    <div class="input-group">
                      <input type="search" class="form-control" placeholder="Nombre de producto" aria-label="Username" aria-describedby="basic-addon1">
                      <div class="input-group-prepend">
                            <button type="submit"><i class="fa fa-search fa-lg fa-fw"></i></button> 
                      </div>
                    </div>
                  </form>                  
                <!-- Fin de Barra de busqueda-->                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @if($stringRuta == 'welcome') active  @endif ">
                        <a class=" nav-link" href="{{ route('welcome') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item @if($stringRuta == 'subastaRapida') active  @endif ">
                        <a class=" nav-link" href="{{ route('subastaRapida') }}">Subasta rapida
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">

                    @guest

                        <li class="nav-item @if($stringRuta == 'login') active  @endif">
                            <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item @if($stringRuta == 'register') active  @endif">
                                <a class="nav-link" href="{{ route('register') }}">Registrarse
                                    <span class="sr-only">(current)</span>

                                </a>
                            </li>

                        @endif

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->usuario }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest


                    <!--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuario
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Salir</a>
                        </div>
                    </li>
                -->
                </ul>
            </div>
        </div>
    </nav>
    <br>


    @yield('contenido')
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; dRemate 2020 - 3030</small>
        </div>
    </footer>



    <script src="js/jquery-3.5.1.js"></script>
    <!--<script src="js/poper-1.16.1.js"></script>-->
    <script src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
    @yield('contenidoJSabajo')

</body>

</html>
