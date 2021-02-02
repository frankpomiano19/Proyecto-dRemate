<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Data para compartir en facebook --}}

    @yield('share-content')

    {{-- Fin para compartir en facebook --}}


    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset('img/assets/subasta4.jpg') }}" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Data para SEO --}}
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/logo4.ico" />
    {{-- Fin Data para SEO --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->

    <!--<title>@yield('titulo')-dRemate</title>-->

    @yield('cont_cabe')
    <!-- Scripts -->
    @livewireStyles
    @yield('contenidoJS')


    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-4.5.3-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/barra.css')}}">
    <link rel="stylesheet" href="{{asset('animateCss/animate.css')}}">
    <link rel="stylesheet" href="{{asset('sweetalert2/dist/sweetalert2.css')}}">
    <link rel="stylesheet" href="{{ asset('css/cssHelp.css') }} ">
    <script src="{{asset('js/moment-2.29.1.js')}}"></script> 
    <script src="{{asset('js/app.js')}}"></script>
    @yield('contenidoCSS')

<!-- Popup paginas relleno -->
<style>
    .nav-horizontal-simple{
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;            
        justify-content: center;
        text-align: center;
    }

    .nav-horizontal-simple>label{
        font-family: monospace;
        text-align:center;
        border-width: 2px 2px 0px 2px;
        border-radius: 10%;
        border-style: inset;
        border-color: rgba(0,0,0,0.5);
        padding: 1px;
        cursor: pointer;
        background: rgba(153,160,208,0.3);
        opacity: 0.5;
    }
    .nav-horizontal-simple>label:hover{
        opacity: 1;
    }
    
    .nav-horizontal-simple>label:active{
        background: rgba(153,160,208,0.6);
    }


    .div-1-conocenos{
        display: none;
    }
    .div-1-conocenos-on{
        display: inline;
        background: rgba(153,160,208,0.1);
        padding: 10px;
    }
    .label-1-title{
        font-size: 18px; 
        font-weight:bold;
    }
    .linea-divide{
        border-width: 4px;
        border-color: rgba(91,91,255,0.5);
        border-radius: 4px;
        width: 80%;
        
    }
    .show-modal-body{
        display: none;
    }
    .show-modal-body-on{
        display: grid;
    }
    .responsive-modal-now{
        width: 60%;
    }
    @media screen and (max-width:800px){
        .responsive-modal-now{
            width: 90%;
            overflow: scroll;
        }
    }
    @media screen and (max-width:1200px){
        .responsive-navbar{
            font-size: 0.61em;
        }
    }

    
</style>



</head>

<body class="clase-formateada">

    {{-- Popup Ayuda --}}
    <div class="modal fade" id="staticBackdropIndexHome" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="staticBackdropIndexHomeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropIndexHomeLabel" style="color: black">¿Deseas activar la ayuda?</h5>
               
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        Se habilitara popup de ayuda en las diferentes paginas que entre
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cambieDeOpinionBoton" class="btn btn-danger" data-dismiss="modal">Cambie de opinion</button>
                <form action="{{ route('addAllHelps') }}" method="POST">
                    @csrf
                    <button class="btn btn-success" id="addAllHelps" role="button" type="submit">OK</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    {{--Fin --}}


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
    <div class="navbar navbar-expand-lg navbar-expand-sm navbar-light responsive-navbar" style="background:#343a40!important;padding-top: 0px;padding-bottom: 0px;">
        <div class="container" style="padding-left: 0px;margin-left: 25px;margin-right: 25px;"><a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="{{route("welcome")}}" style="min-width: 7rem;"><img width="142" src="{{asset('img/logo.png')}}" alt="Cartzilla" style="height: 55px;"></a><a class="navbar-brand d-sm-none mr-2" href="/" style="min-width: 4.625rem;"><img width="74" src="{{asset('img/logo.png')}}" alt="Cartzilla" style="height: 34px;min-width: 93px;"></a>
        <ul class="navbar-nav mega-nav d-none pr-lg-2 mr-lg-2" style="margin-left: 100px;">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle pl-0" href="/category" data-toggle="dropdown"><i class="fa fa-th mr-2" style="color:#dee2e6;"></i>Categorías</a>
                <ul class="dropdown-menu px-2 pl-0 pb-4">
                    <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="{{ url('categorias/joyas') }}"><img src="https://elempresario.mx/sites/default/files/imagecache/nota_completa/moda.jpg" alt="Moda"></a>
                            <a href="{{ url('categorias/joyas') }}"><h6 class="font-size-base mb-2">Joyas</h6></a>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="{{ url('categorias/tecnologia') }}"><img src="https://myperuglobal.com/wp-content/uploads/2015/10/Untitled-design.png" alt="Tecno"></a>
                            <a href="{{ url('categorias/tecnologia') }}"><h6 class="font-size-base mb-2">Tecnologia</h6></a>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="{{ url('categorias/instrumentos') }}"><img src="https://kasaniu.com/wp-content/uploads/2017/08/ScreenHunter_450-Aug.-13-17.43-1170x680.jpg" alt="Anti"></a>
                            <a href="{{ url('categorias/instrumentos') }}"><h6 class="font-size-base mb-2">Instrumentos musicales</h6></a>
                        </div>
                    </div>
                    </div>
                    <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="{{ url('categorias/hogar') }}"><img src="https://www.engelglobal.com/fileadmin/master/Branchen/technical_moulding/TEC_Sport___Freizeit.jpg" alt="Depor"></a>
                            <a href="{{ url('categorias/hogar') }}"><h6 class="font-size-base mb-2">Hogar</h6></a>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="{{ url('/busquedaFiltro') }}"><img src="https://cdn.shopify.com/s/files/1/0899/2262/articles/10-tiendas-de-decoraci-n-de-interiores-para-tu-hogar.jpg?v=1559339599" alt="Hogar"></a>
                            <a href="{{ url('/busquedaFiltro') }}"><h6 class="font-size-base mb-2">Búsqueda por filtro</h6></a>
                        </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                        <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="{{ url('categorias/electrodomesticos') }}"><img src="https://us.emedemujer.com/wp-content/uploads/sites/3/2017/02/Jardiner%C3%ADa-b%C3%A1sica-lo-que-toda-newbie-debe-saber-770x512.jpg" alt="Jardi"></a>
                            <a href="{{ url('categorias/electrodomesticos') }}"><h6 class="font-size-base mb-2">Electrodomésticos</h6></a>
                        </div>
                    </div>
                    </div>
                    </ul>
                </li>
            </ul>
            <div class="input-group-overlay d-none d-lg-flex mx-4">

            <form class="needs-validation" method="POST" enctype="multipart/form-data"
            action="{{ route('busqueda.busquedaespecifica') }}" novalidate>
                @csrf
                <input type="text" name="bproducto" class="form-control" placeholder="Buscar producto" required>
            </form>
            {{-- <livewire:busqueda-especifica> --}}


            {{-- <input class = "form-control appended-form-control" type = "text" placeholder = "Buscar productos">
            <div class = "input-group-append-overlay"><span class = "input-group-text "><i class = "fa fa-search"> </i ></span ></div> --}}
            </div>



            {{-- <input class="form-control appended-form-control" type="text" placeholder="Bur productos"> --}}
            
        
            <ul class="navbar-nav d-none" style="align-items: center;">
                <li class="nav-item @if($stringRuta == 'welcome') active active-2  @endif "><a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>
                @auth
                <li class="nav-item @if($stringRuta == 'registroSubasta-now') active active-2  @endif "><a class="nav-link" href="{{ route('registroSubasta-now') }}">Subastar producto</a>
                </li>
                @else                    
                <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Subastar producto</a>
                </li>
                @endauth

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
                <li class="nav-item"><a class="nav-link" style="font-size: 12px;font-weight: lighter;">S/{{ Auth::user()->us_din }}</a>
                </li>

                        <li class="nav-item dropdown">
                            <label id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->usuario }}
                            </label>
{{-- "badge badge-danger"
dropdown-item bg-danger --}}
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <form method="POST" action="{{ route('suscripcion.usuario') }}">
                                    {{ csrf_field() }}
                                    @csrf
                                @if(Auth::user()->suscripcion == "1")
                                    
                                    <input type="hidden" name="idUsuario" value={{Auth::user()->id}}>
                                    <input type="hidden" name="nameUser" value={{Auth::user()->usuario}}>
                                    <input type="hidden" name="email" value={{Auth::user()->email}}>
                                    <button type="submit" class="dropdown-item bg-danger text-white text-center">Anular suscripción</button>
                                    <a class="dropdown-item" href="{{ route('productos.index') }}">
                                        Mi perfil <span class="badge badge-success mr-0">Suscrito</span>
                                    </a>
                                @else
                                    <input type="hidden" name="idUsuario" value={{Auth::user()->id}}>
                                    <input type="hidden" name="nameUser" value={{Auth::user()->usuario}}>
                                    <input type="hidden" name="email" value={{Auth::user()->email}}>
                                    <button type="submit" class="dropdown-item bg-success text-white text-center">Suscribirse</button>
                                    <a class="dropdown-item" href="{{ route('productos.index') }}">
                                        Mi perfil
                                    </a>
                                @endif
                                </form>
                                <a class="dropdown-item" href="{{ route('productos.favoritos') }}">
                                    Mis productos favoritos
                                </a>
                                <a class="dropdown-item" href="{{ route('prosubastas') }}">
                                    Proximas Subastas
                                </a>
                                <a class="dropdown-item" style="cursor: pointer;" data-toggle="modal" data-target="#staticBackdropIndexHome">
                                    Necesito Ayuda
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
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                              <i class="fa fa-bell-o"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header" >Notificaciones</span>
                              @forelse (auth()->user()->userProductoSubastaGanada as $prodganado)
                                @if (Carbon\Carbon::now()->greaterThan($prodganado->final_subasta))
                                    <a href="{{ route('producto.detalles', $prodganado->id) }}"><span class="ml-3 pull-right text-muted text-sm">Ha ganado el producto {{$prodganado->nombre_producto}} </span></a>
                                <div class="dropdown-divider"></div>
                                @endif
                            

                      


                              @empty
                              <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones por leer </span>
                              @endforelse
                              <div class="dropdown-divider"></div>
                              <a href="{{ route('productos.notificaciones') }}">
                                    Próximas subastas de mi interés
                                </a>
                                <div class="dropdown-divider"></div>

                              

                               
                                
                            <div class="dropdown-divider"></div>
                              
                            
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                              @if (auth()->user()->userRecibeNotiChat->count()>0)
                              {{-- <style>
                                  .contador-notificacion{
                                      position: relative;
                                      border-radius: 50%;
                                      background-color: crimson;
                                      bottom: 50px;
                                      color: #dee2e6;
                                      font-size: 10px;
                                      padding: 0px 5px 0px 5px;
                                      height: 20px;

                                  }
                              </style> --}}
                                  <i class="fa fa-envelope-o" ></i>                                  
                                  
                              @else
                                  <i class="fa fa-envelope-o"></i>                                  
                              @endif  
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-header" >Mensajes</span>
                                @forelse(auth()->user()->userRecibeNotiChat as $notiChat)
                                    
                                <span class="ml-3 pull-right text-muted text-sm">El usuario {{ $notiChat->notiChatUserEnvia->usuario }} quiere establecer comunicacion

                                    </span>
                                    <a href="{{ url('producto/chatTimeReal-2') }}" class="btn btn-primary d-flex justify-content-center" style="background-color: royalblue;">Ir al chat</a>
                                  <div class="dropdown-divider" style="background-color: #343a40;color: #343a40;width: 100%;height: 2px;"></div>
                                @empty
                                <span class="dropdown-header" >Sin mensajes</span>
                                    
                                @endforelse                                  
                                {{-- <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones por leer </span> --}}
                                <div class="dropdown-divider"></div>
                                
                            </div>
                          </li>


                    @endguest
            </ul>
            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center navbar-dark bg-dark" style="margin-right: 50px;margin-left: 50px;">
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
        <a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="/" style="min-width: 7rem;"><img width="151" src="{{asset('img/logo.png')}}" alt="Cartzilla" style="height: 55px;"></a><!--<a class="navbar-brand d-sm-none mr-2" href="/" style="min-width: 4.625rem;"><img width="74" src="img/logo.png" alt="Cartzilla" style="height: 34px;min-width: 74px;"></a>-->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="input-group-overlay d-lg-none my-3">
            <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
            <input class="form-control prepended-form-control" type="text" placeholder="Bur productos">

            </div>
            <ul class="navbar-nav mega-nav pr-lg-2 mr-lg-2">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle pl-0" href="/category" data-toggle="dropdown" style="color:#343a40;font-weight: bold;"><i class="fa fa-th mr-2"></i>Categorías</a>
                <ul class="dropdown-menu px-2 pl-0 pb-4">
                <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://elempresario.mx/sites/default/files/imagecache/nota_completa/moda.jpg" alt="Moda"></a>
                        <a href="{{ url('categorias/joyas') }}"><h6 class="font-size-base mb-2">Joyas</h6></a>
                    </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://myperuglobal.com/wp-content/uploads/2015/10/Untitled-design.png" alt="Tecno"></a>
                        <a href="{{ url('categorias/tecnologia') }}"><h6 class="font-size-base mb-2">Tecnologia</h6></a>
                    </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://kasaniu.com/wp-content/uploads/2017/08/ScreenHunter_450-Aug.-13-17.43-1170x680.jpg" alt="Anti"></a>
                        <a href="{{ url('categorias/electrodomesticos') }}"><h6 class="font-size-base mb-2">Electrodomésticos</h6></a>
                    </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://www.engelglobal.com/fileadmin/master/Branchen/technical_moulding/TEC_Sport___Freizeit.jpg" alt="Depor"></a>
                        <a href="{{ url('/busquedaFiltro') }}"><h6 class="font-size-base mb-2">Deportes</h6></a>
                    </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="{{ url('/busquedaFiltro') }}"><img src="https://cdn.shopify.com/s/files/1/0899/2262/articles/10-tiendas-de-decoraci-n-de-interiores-para-tu-hogar.jpg?v=1559339599" alt="Hogar"></a>
                        <a href="{{ url('/busquedaFiltro') }}"><h6 class="font-size-base mb-2">Búsqueda por filtro</h6></a>
                    </div>
                    </div>
                    <div class="mega-dropdown-column pt-4 px-3">
                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="https://us.emedemujer.com/wp-content/uploads/sites/3/2017/02/Jardiner%C3%ADa-b%C3%A1sica-lo-que-toda-newbie-debe-saber-770x512.jpg" alt="Jardi"></a>
                        <a href="{{ url('/busquedaFiltro') }}"><h6 class="font-size-base mb-2">Jardineria</h6></a>
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
    @livewireScripts

    @yield('contenido')
    <!--Footer-->

<footer id="footer">


    {{-- Opciones --}}
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h4>CONTENIDO</h4>
                        <ul>
                            <div class="copyright">
                                
                                <a href="#" data-toggle="modal" style="color: #dee2e6" data-target="#ventanaModalQuienes">¿Quiénes somos? (Version extendida)</a>                            
                            </div>
                                {{-- <li><a href="#" data-toggle="modal" data-target="#ventanaModalPolitica">Política y privacidad</a></li> --}}
                            {{-- <li><a href="#" data-toggle="modal" data-target="#ventanaModalAtencion">Atención al cliente</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">

                        <h3>D'REMATE</h3>
                        <div class="social-links">
                          <a class="btn btn-social-icon btn-twitter"><span class="fa fa-twitter"></span></a>
                          <a class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
                          <a class="btn btn-social-icon btn-instagram"><span class="fa fa-instagram"></span></a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h4></h4>
                        <div class="copyright">
                            © Copyright <strong><span>D'REMATE</span></strong> 2020 - 3030. All Rights Reserved
                          </div>
                    
                    </div>
                </div>
            </div>

        </div>
    </div>    
    {{-- Fin opciones --}}

  </footer>

      <!--¿Quienes somos?-->
      <div class="modal fade" id="ventanaModalQuienes" style="width:100%;" tabindex="-1" role="dialog" aria-labelledby="ventanaModalQuienesTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content" style="border: 4px inset rgba(153,160,208,0.9);" id="algo">
            <div class="row">
            <div class="col-sm-12">
                <div class="modal-header nav-horizontal-simple">
                    <label for="">
                        Conocenos
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-users fa-stack-1x"></i>
                        </span>
                    </label>
                    <label for="">
                        Valores
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-newspaper-o fa-stack-1x"></i>
                        </span>
                    </label>
                    <label for="">
                        Objetivos
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-line-chart fa-stack-1x"></i>
                        </span>
                    </label>
                </div>
                <div class="modal-body" style="border-width: 0px 2px 0px 2px;border-style: inset;border-color: rgba(0,0,0,0.5);">
                    <div class="row">
                        <div class="col-sm-12 div-1-conocenos" style="text-align: center;">
                            <h2>d'Remate</h2>
                            <h4>¿Quiénes somos?</h4>
                            <p style="font-family: sans-serif;">Somos un grupo de estudiantes sanmarquinos con el objetivo de permitir que todo el público pueda realizar subastas de manera sencilla a través de nuestra página web.
                                <br>
                            </p>
                            <h4>¿Cómo nació la idea?</h4>
                            <p style="font-family: sans-serif;">
                                Después de multiples reuniones donde se discutia como hacer que la persona sin conocimientos tecnicos
                                pueda subastar un producto, sin tanto tramite y directamente
                            
                            </p>

                                {{-- <img src="/gif/gato90.gif" alt="Gato"> --}}
                            </div>
                        <div class="col-sm-12 div-1-conocenos" style="text-align: center;">
                            <div class="row">
        
                                <div class="col-sm-4">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-recycle fa-stack-2x"></i>
                                    </span>
                                    <hr class="linea-divide">
                                    <h4 class="label-1-title">Confiabilidad</h4>                                    
                                    <p>Nunca revelaremos tu información confidencial</p>
                                </div>
                                <div class="col-sm-4">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-xing fa-stack-2x"></i>
                                    </span>
                                    <hr class="linea-divide">
                                    <h4 class="label-1-title">Justicia</h4>
                                    <p>Permitimos a cualquier persona registrarse en la aplicacion web</p>                                    
                                </div>
                                <div class="col-sm-4">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-tree fa-stack-2x"></i>
                                    </span>    
                                    <hr class="linea-divide">
                                    <h4 class="label-1-title">Transparencia</h4>                                                                        
                                    <p>Todas nuestras intenciones son abiertas y cualquiera lo puede verificar</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-building fa-stack-2x"></i>
                                    </span>
                                    <hr class="linea-divide">
                                    <h4 class="label-1-title">Solidaridad</h4>         
                                    <p>Ayudamos a las personas comunes subastar productos</p>                                                               
                                </div>
                                <div class="col-sm-6">
                                    
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-institution fa-stack-2x"></i>
                                    </span>
                                    <hr class="linea-divide">
                                    <h4 class="label-1-title">Respeto</h4>
                                    <p>Todos los comentarios y/o sugerencias seran tratados con respeto</p>                                                                        
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 div-1-conocenos">
                            <ul style="list-style: none">
                                <li style="font-family: sans-serif;;line-height : 1;">
                                    <span class="fa-stack fa-lg" style="float: left; color:rgba(255,0,0,0.8);"><i class="fa fa-bullseye fa-stack-2x"></i></span>
                                    Permitir a la persona común poder subastar su producto.
                                </li>
                                <br>
                                <li style="font-family: sans-serif;;line-height : 1;">
                                    <span class="fa-stack fa-lg" style="float: left; color:rgba(255,0,0,0.5);"><i class="fa fa-bullseye fa-stack-2x"></i></span>
                                    Permitir al usuario poder comprar un producto por medio de subastas online.
                                </li>
                                <br>
                                <li>
                                    {{-- <img src="/gif/buho27.gif" alt="buho"> --}}
                                </li>
                                <br>
                                <li style="font-family: sans-serif;;line-height : 1;">
                                    <span class="fa-stack fa-lg" style="float: left; color:rgba(255,0,0,0.5);"><i class="fa fa-bullseye fa-stack-2x"></i></span>
                                    Darle facilidades al usuario gestionar multiples subastas en linea por medio de esta pagina.
                                </li>
                                <br>
                                <li style="font-family: sans-serif;;line-height : 1;">
                                    <span class="fa-stack fa-lg" style="float: left; color:rgba(255,0,0,0.8);"><i class="fa fa-bullseye fa-stack-2x"></i></span>
                                    Darle seguridad y comodidad al usuario al momento de hacer una puja o comprar un productos.
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-warning" type="button" data-dismiss="modal" >Cerrar</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    @livewireScripts

    <script>
        var opciones_cono=document.getElementsByClassName('div-1-conocenos');
        var nav_cono=document.getElementsByClassName('nav-horizontal-simple');
        var label_nav_cono=nav_cono[0].getElementsByTagName('label');
        

        opciones_cono[0].classList.add('div-1-conocenos-on');
        label_nav_cono[0].style.opacity="1";
        label_nav_cono[0].onclick=function(){
            for(var i=0;i<label_nav_cono.length;i++){
                opciones_cono[i].classList.remove('div-1-conocenos-on');
                label_nav_cono[i].style.opacity="0.5";
            }
            opciones_cono[0].classList.add('div-1-conocenos-on');
            label_nav_cono[0].style.opacity="1";
        }
        label_nav_cono[1].onclick=function(){
            for(var i=0;i<label_nav_cono.length;i++){
                opciones_cono[i].classList.remove('div-1-conocenos-on');
                label_nav_cono[i].style.opacity="0.5";

            }
            opciones_cono[1].classList.add('div-1-conocenos-on');
            label_nav_cono[1].style.opacity="1";
        }
        label_nav_cono[2].onclick=function(){
            for(var i=0;i<label_nav_cono.length;i++){
                opciones_cono[i].classList.remove('div-1-conocenos-on');
                label_nav_cono[i].style.opacity="0.5";

            }
            opciones_cono[2].classList.add('div-1-conocenos-on');
            label_nav_cono[2].style.opacity="1";
        }

        
    </script>

<!--fin Footer-->


    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('bootstrap-4.5.3-dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('bootstrap-4.5.3-dist/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('sweetalert2/dist/sweetalert2.js')}}"></script>
    @yield('contenidoJSabajo')

</body>

</html>
