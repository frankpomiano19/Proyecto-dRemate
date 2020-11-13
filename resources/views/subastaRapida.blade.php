@extends('layouts.app')


@section('cont_cabe')
    <title>Subasta rapida - dRemate</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('contenidoJS')
    <!-- Colocar js-->

@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="css/styleSubastaRapida.css">
    <link rel="stylesheet" href="js/jquery.countdown.package-2.1.0/css/jquery.countdown.css">

@endsection


@section('contenido')

    <header class="jumbotron font-popin"
        style="margin-bottom:0px;background-image:linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)), url('img/assets/subasta4.jpg');background-size:100% 100%;">
        <div class="text-center text-white">
            <h2 class="titulo-card-header-2">dRemate</h2>
            <hr style="border-color: white">
            <hr style="border-color: white">
            <h3 class="titulo-card-header-2">Bienvenido a la subasta rapida</h3>
            <h4 style="font-size: 15px">Recuerda que para pujar, necesitas estar registrado</h4>
            <div class="btn-group py-4" role="group">
                <a href="" role="button" class="btn btn-info"><i class="fa fa-book">
                        Registrarse</i></a>
                <a href="{{ route('login') }}" role="button" class="btn btn-info"><i class="fa fa-user">
                        Iniciar sesion</i></a>
            </div>
            <h4 style="font-size: 15px">Puedes conocer productos por categorias</h4>
            <div class="btn-group py-4" role="group">
                <a href="{{ route('register') }}" role="button" class="btn btn-info"><i class="fa fa-chevron-right">
                        Conocer
                        mas</i></a>
            </div>

            <hr style="border-color: white">
            <hr style="border-color: white">

            <div>
                <a class="btn btn-social-icon btn-twitter">
                    <span class="fa fa-instagram"></span>
                </a>
                <a class="btn btn-social-icon btn-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a class="btn btn-social-icon btn-twitter">
                    <span class="fa fa-facebook"></span>
                </a>

            </div>
        </div>
    </header>
    @php
    $contador = 0;
    $horasSub_A = [];
    $minutosSub_A = [];
    $segundosSub_A = [];
    @endphp
    <main class="sub-rapida-main-content py-4">
        <div class="container sub-rapida-principal">

            <div class="row py-4">
                <div class="col-lg-2 py-2 columna-barra-lateral">
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill"
                            href="#pills-sub-curso" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-gavel mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Subastas en curso</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill"
                            href="#pills-sub-pro" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-calendar-minus-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Subastas programadas</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill"
                            href="#pills-sub-his" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fa fa-table mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Historial</span></a>

                    </div>
                </div>
                <div class="col-lg-10 contenido-dinamico-lateral">

                    <!--3era-->

                    <div class="container tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-sub-curso" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <section class="py-2">

                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Subastas en curso</h3>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="font-weight-bold titulo-card-header-1">Filtro</label>

                                        </div>
                                        <div class="col-sm-12">
                                            <ul class="nav nav-pills mb-3 " id="" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="mayor-tiempo" data-toggle="pill" href=""
                                                        role="tab" aria-controls="pills-home">Mayor
                                                        tiempo
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="menor-tiempo" data-toggle="pill" href=""
                                                        role="tab" aria-controls="pills-profile" aria-selected="false">Menor
                                                        tiempo</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <div id="subasta_proc_filtro_include" class="row justify-content-center">

                                @include('partials.sub_rap_pro')

                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-2">

                                </div>
                            </div>


                            <!--<a href="#" class="btn btn-primary col-md-12" style="background-color:rgba(129, 149, 175, 1);">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div style="text-align: center;">Ver mas subastas</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </a>-->

                        </div>

                        <div class="tab-pane fade " id="pills-sub-pro" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <section class="py-0">
                                <div class="container">



                                    <h3 class="font-weight-bold font-popin">Subastas Programadas</h3>
                                </div>
                            </section>

                            <div class="container">
                                <div class="row justify-content-center">

                                    @foreach ($su_dispo_s as $su_dispo)


                                        <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h4 class="card-title">
                                                        <a href="#"
                                                            class="titulo-card-header-1">{{ $su_dispo->nombre_producto }}</a>
                                                    </h4>
                                                    <h5 style="text-align: center">Logo-empresa</h5>
                                                </div>

                                                <a href="#"><img class="card-img-top imagen-producto-card"
                                                        src="{{ $su_dispo->imagen }}" alt=""></a>
                                                <div class="card-contenido-cuerpo-1">
                                                    <div class="card-footer">
                                                        Precio base : S/ {{ $su_dispo->precio_inicial }}
                                                    </div>
                                                    <div class="text-center">Inicia en</div>
                                                    <div class="defaultCountdownPro"> </div>  

                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                            {{ $su_dispo->inicio_subasta }}
                                                        </div>
                                                    </div>
                                                    <div class="alert alert-success" role="alert">Loading completed!</div>
                                                    <div class="sub-rapida-icono">

                                                        <button type="button" class="navbar-toggler">
                                                            <i class="fa fa-calendar fa-sm"></i>
                                                        </button>
                                                        <button type="button" class="navbar-toggler">
                                                            <i class="fa fa-bell fa-sm"></i>
                                                        </button>
                                                        <button type="button" class="navbar-toggler">
                                                            <i class="fa fa-heart fa-sm"></i>
                                                        </button>

                                                    </div>

                                                    <a href="#" class="btn btn-primary col-md-12 boton-ver-subasta">
                                                        <div class="row">
                                                            <div class="col-md-12" style="text-align: center">Ver Subasta
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{ $su_dispo_s->render() }}



                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade " id="pills-sub-his" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                        <div class="card-header">
                                            <h3 class="titulo-card-header-2">Historial de productos</h3>
                                        </div>
                                        <div class="card-body card-contenido-cuerpo-2">
                                            <div class="table-responsive font-popin">
                                                <table class="table table-striped">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <!--<th>&nbsp;</th>-->
                                                            <th>Fecha de venta</th>
                                                            <th>Producto vendido</th>
                                                            <th>Precio vendido</th>
                                                            <th>Comprador</th>
                                                            <th>Subastador</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($su_hist_s as $su_hist)

                                                            <tr>
                                                                <th>{{ $su_hist->final_subasta }}</th>
                                                                <th>{{ $su_hist->nombre_producto }}</th>
                                                                <th>{{ $su_hist->precio_inicial + rand(1, 200) }}</th>
                                                                <th>{{ $su_hist->productoUserPropietario->usuario }}</th>
                                                                <th>{{ $su_hist->productoUserComprador->usuario }}</th>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                {{ $su_hist_s->render() }}
                                            </div>
                                        </div>
                                        <div class="card-footer text-center"><a class="btn btn-fill-1" href="#">Ver mas
                                                en el
                                                historial</a>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="container">
        <div id="progress_bar" class="ui-progress-bar ui-container">
            <div class="ui-progress" style="width: 79%;">
                <span class="ui-label" style="display:none;">Procesando <b class="value">79%</b></span>
            </div><!-- .ui-progress -->
        </div><!-- #progress_bar -->

        <div class="content" id="main_content" style="display: none;">
            <p>La barra de progreso ha cargado!</p>
        </div><!-- #main_content -->
    </div><!-- #container -->

    
@php
  $contador2=0;
  $contador3=0;
  $contador4=0;
@endphp



@endsection


@section('contenidoJSabajo')
    <script src="js/jsSubastaRapida.js"></script>
    <script src="js/jquery.chrony.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script> 
    <script>
        $(function () {
            var tiempoRestante = document.getElementsByClassName('defaultCountdown');
            @foreach ($su_curso_s as $su_curso)        

                @php 

                    $ab = date_default_timezone_get(); 
                    date_default_timezone_set('America/Lima'); 
                    $valorN = date('Y-m-d H:i:s');

                    $tiempoini_aux = new \Carbon\Carbon($su_curso->final_subasta);
                    $tiempofin_aux = new \Carbon\Carbon($valorN);
                    $segundosSub_dif =$tiempoini_aux->diffInSeconds($tiempofin_aux);
                @endphp

                $(tiempoRestante[{{$contador3}}]).countdown({until:  {{$segundosSub_dif}}});
                @php
                    $contador3++;
                @endphp
            @endforeach
            @php
                $contador3=0;
            @endphp
        });
    </script> 
    <script>
        $(function () {
            var tiempoRestantePro = document.getElementsByClassName('defaultCountdownPro');
            @foreach ($su_dispo_s as $su_dispo)
                @php 

                    $ab = date_default_timezone_get(); 
                    date_default_timezone_set('America/Lima'); 
                    $valorNP = date('Y-m-d H:i:s');

                    $tiempoini_aux2 = new \Carbon\Carbon($su_dispo->inicio_subasta);
                    $tiempofin_aux2 = new \Carbon\Carbon($valorNP);
                    $segundosSub_dif2 =$tiempoini_aux2->diffInSeconds($tiempofin_aux2);
                @endphp

                $(tiempoRestantePro[{{$contador4}}]).countdown({until:  {{$segundosSub_dif2}}});
                @php
                    $contador4++;
                @endphp
            @endforeach
            @php
                $contador4=0;
            @endphp

        });
    </script>
    
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
    $('#menor-tiempo').click(function(e){
        e.preventDefault();
        $.ajax({
            url : "subastaRapida",
            type : 'POST',
            data : {'filtro' :0},
            success : function(response){
                $("#subasta_proc_filtro_include").html(response);
            },
            statusCode:{
                404: function(){
                    alert("pagina no encontrada mascota");
                }
            },
            error : function(jqXHR,status,error){
                alert("Error al cargar");
            }
        });
    });


    $('#mayor-tiempo').click(function(e){
        e.preventDefault();
        $.ajax({
            url : "subastaRapida",
            type : 'POST',
            data : {'filtro' :1},
            success : function(response){
                $("#subasta_proc_filtro_include").html(response);
            },
            statusCode:{
                404: function(){
                    alert("pagina no encontrada mascota");
                }
            },
            error : function(jqXHR,status,error){
                alert("Error al cargar");
            }
        });
    });

    </script>


@endsection