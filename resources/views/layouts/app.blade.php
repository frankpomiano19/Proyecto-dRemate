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
    <link rel="stylesheet" href="{{asset('bootstrap-4.5.3-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/barra.css')}}">


    @yield('contenidoCSS')

</head>

<body>

    <style>
            .active-2{
                color: red !important;
                background-color: rgba(80, 89, 99, 1) !important;
            }
    </style>
    @php
    $stringRuta = \Request::route()->getName();
    if($stringRuta == "welcome"){
        
    }
    @endphp
<!--
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route("welcome")}}">dRemate</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                
                  <form class="form-inline">
                    <div class="input-group">
                      <input type="search" class="form-control" placeholder="Nombre de producto" aria-label="Username" aria-describedby="basic-addon1">
                      <div class="input-group-prepend">
                            <button type="submit"><i class="fa fa-search fa-lg fa-fw"></i></button> 
                      </div>
                    </div>
                  </form>                  
                               
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
                                <a class="dropdown-item" href="{{ route('perfil_us') }}">
                                    Mi perfil
                                </a>
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
                </ul>
            </div>
        </div>
    </nav>-->
<!--barra navegación-->
<div class="navbar-sticky bg-light fixed-top">
    <div class="navbar navbar-expand-lg navbar-light" style="background:#343a40!important;padding-top: 12px;padding-bottom: 20px;">
        <div class="container" style="padding-left: 0px;margin-left: 25px;margin-right: 25px;"><a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="{{route("welcome")}}" style="min-width: 7rem;"><img width="142" src="{{asset('img/logo.png')}}" alt="Cartzilla" style="height: 55px;"></a><a class="navbar-brand d-sm-none mr-2" href="/" style="min-width: 4.625rem;"><img width="74" src="{{asset('img/logo.png')}}" alt="Cartzilla" style="height: 34px;min-width: 74px;"></a>
        <ul class="navbar-nav mega-nav d-none pr-lg-2 mr-lg-2" style="margin-left: 200px;">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle pl-0" href="/category" data-toggle="dropdown"><i class="fa fa-th mr-2" style="color:#dee2e6;"></i>Categorías</a>
                <ul class="dropdown-menu px-2 pl-0 pb-4">
                    <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://elempresario.mx/sites/default/files/imagecache/nota_completa/moda.jpg" alt="Moda"></a>
                            <a href="/category"><h6 class="font-size-base mb-2">Moda</h6></a>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://myperuglobal.com/wp-content/uploads/2015/10/Untitled-design.png" alt="Tecno"></a>
                            <a href="/category"><h6 class="font-size-base mb-2">Tecnologia</h6></a>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://kasaniu.com/wp-content/uploads/2017/08/ScreenHunter_450-Aug.-13-17.43-1170x680.jpg" alt="Anti"></a>
                            <a href="/category"><h6 class="font-size-base mb-2">Antigüedades</h6></a>
                        </div>
                    </div>
                    </div>
                    <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://www.engelglobal.com/fileadmin/master/Branchen/technical_moulding/TEC_Sport___Freizeit.jpg" alt="Depor"></a>
                            <a href="/category"><h6 class="font-size-base mb-2">Deportes</h6></a>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://cdn.shopify.com/s/files/1/0899/2262/articles/10-tiendas-de-decoraci-n-de-interiores-para-tu-hogar.jpg?v=1559339599" alt="Hogar"></a>
                            <a href="/category"><h6 class="font-size-base mb-2">Hogar</h6></a>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://us.emedemujer.com/wp-content/uploads/sites/3/2017/02/Jardiner%C3%ADa-b%C3%A1sica-lo-que-toda-newbie-debe-saber-770x512.jpg" alt="Jardi"></a>
                            <a href="/category"><h6 class="font-size-base mb-2">Jardineria</h6></a>
                        </div>
                    </div>
                    </div>
                    </ul>
                </li>
            </ul>
            <div class="input-group-overlay d-none d-lg-flex mx-4">
            <input class="form-control appended-form-control" type="text" placeholder="Buscar productos">
            <div class="input-group-append-overlay"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
            </div> 
        
            <ul class="navbar-nav d-none" style="align-items: center;">
                <li class="nav-item @if($stringRuta == 'welcome') active active-2  @endif "><a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item @if($stringRuta == 'subastaRapida') active active-2  @endif "><a class="nav-link" href="{{ route('subastaRapida') }}">Subasta Rápida</a>
                </li>
                @guest
                <li class="nav-item @if($stringRuta == 'login') active active-2  @endif"><a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item @if($stringRuta == 'register') active active-2  @endif"><a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                </li>
                @endif
                @else

                        <li class="nav-item dropdown">
                            <label id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                {{ Auth::user()->usuario }}
                        </label>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('perfil_us') }}">
                                    Mi perfil
                                </a>
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
            </ul>
            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center" style="margin-right: 50px;margin-left: 50px;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-tool navbar-stuck-toggler" href="#">
                    <span class="navbar-tool-tooltip">Expand menu</span>
                    <div class="navbar-tool-icon-box">
                        <i class="navbar-tool-icon czi-menu"></i>
                    </div>
                </a>
                <!--<a class="navbar-tool d-none d-lg-flex" href="#"><span class="navbar-tool-tooltip">Favoritos</span>
                <div class="navbar-tool-icon-box"><i class="fa fa-heart"></i></div></a>-->
                <a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" href="/login" style="display:none;">
                    <div class="navbar-tool-icon-box">
                        <i class="fa fa-user"></i>
                    </div>
                    <!--<div class="navbar-tool-text ml-n3">
                        <small style="font-weight: bold;">Iniciar sesión</small>Mi cuenta
                    </div>-->
                </a>
            <!--<div class="navbar-tool dropdown ml-3"><div class="navbar-tool-icon-box bg-secondary"><i class="fa fa-money"></i></div><div class="navbar-tool-text" style="padding-left: 0px;"><small>Mis créditos</small>$00.00</div>
                </div>-->
            </div>
        </div>
    </div>
    <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2" style="padding-bottom: 0px!important;">
        <div class="container">
        <a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="/" style="min-width: 7rem;"><img width="142" src="{{asset('img/logo.png')}}" alt="Cartzilla" style="height: 55px;"></a><!--<a class="navbar-brand d-sm-none mr-2" href="/" style="min-width: 4.625rem;"><img width="74" src="img/logo.png" alt="Cartzilla" style="height: 34px;min-width: 74px;"></a>-->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="input-group-overlay d-lg-none my-3">
            <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
            <input class="form-control prepended-form-control" type="text" placeholder="Buscar productos">
            </div>
            <ul class="navbar-nav mega-nav pr-lg-2 mr-lg-2">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle pl-0" href="/category" data-toggle="dropdown" style="color:#343a40;font-weight: bold;"><i class="fa fa-th mr-2"></i>Categorías</a>
                <ul class="dropdown-menu px-2 pl-0 pb-4">
                <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://elempresario.mx/sites/default/files/imagecache/nota_completa/moda.jpg" alt="Moda"></a>
                        <a href="/category"><h6 class="font-size-base mb-2">Moda</h6></a>
                    </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://myperuglobal.com/wp-content/uploads/2015/10/Untitled-design.png" alt="Tecno"></a>
                        <a href="/category"><h6 class="font-size-base mb-2">Tecnologia</h6></a>
                    </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://kasaniu.com/wp-content/uploads/2017/08/ScreenHunter_450-Aug.-13-17.43-1170x680.jpg" alt="Anti"></a>
                        <a href="/category"><h6 class="font-size-base mb-2">Antigüedades</h6></a>
                    </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://www.engelglobal.com/fileadmin/master/Branchen/technical_moulding/TEC_Sport___Freizeit.jpg" alt="Depor"></a>
                        <a href="/category"><h6 class="font-size-base mb-2">Deportes</h6></a>
                    </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://cdn.shopify.com/s/files/1/0899/2262/articles/10-tiendas-de-decoraci-n-de-interiores-para-tu-hogar.jpg?v=1559339599" alt="Hogar"></a>
                        <a href="/category"><h6 class="font-size-base mb-2">Hogar</h6></a>
                    </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://us.emedemujer.com/wp-content/uploads/sites/3/2017/02/Jardiner%C3%ADa-b%C3%A1sica-lo-que-toda-newbie-debe-saber-770x512.jpg" alt="Jardi"></a>
                        <a href="/category"><h6 class="font-size-base mb-2">Jardineria</h6></a>
                    </div>
                    </div>
                </div>
                </ul>
            </li>
            </ul>
            <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/" style="color:#343a40;font-weight: bold;">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="/subastaRapida" style="color:#343a40;font-weight: bold;">Subasta Rápida</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="/register" style="color:#343a40;font-weight: bold;">Ingresar</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="/register" style="color:#343a40;font-weight: bold;">Registrarse</a>
            </li>
            </ul>
        </div>
        </div>
    </div>
</div>
<br><br>
<!--fin barra navegación-->

    @yield('contenido')
    <!--Footer-->

<footer id="footer">
    <div class="container">
      <h3>D'REMATE</h3>
      <p></p>
      <div class="social-links">
        <a class="btn btn-social-icon btn-twitter"><span class="fa fa-twitter"></span></a>
        <a class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
        <a class="btn btn-social-icon btn-instagram"><span class="fa fa-instagram"></span></a>
      </div>
      <div class="copyright">
        © Copyright <strong><span>D'REMATE</span></strong> 2020 - 3030. All Rights Reserved
      </div>
    </div>
  </footer>

<!--fin Footer-->



    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <!--<script src="js/poper-1.16.1.js"></script>-->
    <script src="{{asset('bootstrap-4.5.3-dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('bootstrap-4.5.3-dist/js/bootstrap.bundle.js')}}"></script>
    @yield('contenidoJSabajo')
      @stack('ajax_crud')

</body>

</html>
