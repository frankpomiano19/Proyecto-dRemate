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

    <script> 

        var tablaOpcVal = [0,0,0];
var tablasOpc = -1;
    </script>
    <header class="jumbotron font-popin"
        style="margin-bottom:0px;background-image:linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)), url('img/assets/subasta4.jpg');background-size:100% 100%;">
        <div class="text-center text-white">
            <h1 class="titulo-card-header-2">d'Remate</h1>
            <hr style="border-color: white">
            <hr style="border-color: white">
            <h1 class="titulo-card-header-2">Bienvenido a la subasta rapida</h1>
            <h2 style="font-size: 20px">Recuerda que para pujar, necesitas estar registrado</h2>
            <div class="btn-group py-4" role="group">
                <a href="" role="button" class="btn btn-info"><i class="fa fa-book">
                        Registrarse</i></a>
                <a href="{{ route('login') }}" role="button" class="btn btn-info"><i class="fa fa-user">
                        Iniciar sesion</i></a>
            </div>
            <h4 style="font-size: 20px">Puedes conocer productos por categorias</h4>
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
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-subasta-cur" data-toggle="pill"
                            href="#pills-sub-curso" role="tab" aria-controls="v-pills-home" aria-selected="true"
                            onclick="tablasOpc = 0;">
                            <i class="fa fa-gavel mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Subastas en curso</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-subasta-pro" data-toggle="pill"
                            href="#pills-sub-pro" role="tab" aria-controls="v-pills-profile" aria-selected="false"
                            onclick="tablasOpc = 1;">
                            <i class="fa fa-calendar-minus-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Subastas programadas</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-subasta-his" data-toggle="pill"
                            href="#pills-sub-his" role="tab" aria-controls="v-pills-messages" aria-selected="false"
                            onclick="tablasOpc = 2;">
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
                            <div id="subasta_proc_filtro_include" class="row">

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
                                <div class="row justify-content-center" id="id_subasta_programada">
                                    @include('partials/sub_rap_progra')
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
                                            <div class="table-responsive font-popin" id="historial_sub">
                                                @include('partials/sub_rap_his')
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
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        /*
        $('#v-pills-subasta-cur').click(function (){
        });



        $('#v-pills-subasta-pro').click(function (){
        });
        
        $('#v-pills-subasta-his').click(function (){
        });
        */
        $(document).ready(function(){


                $(document).on('click','#subasta_proc_filtro_include .pagination a',function(event){
                    event.preventDefault();
                    var page0 = $(this).attr('href').split('page=')[1];
                    fetch_data(page0);

                });

                function fetch_data(page0){
                    $.ajax({
                        url : "/subastaRapida/fetch_data?page="+page0,
                        success : function(data){
                            $("#subasta_proc_filtro_include").html(data);
                        },
                        statusCode:{
                            404: function(){
                                alert("pagina no encontrada mascota");
                            }
                        },
                        error : function(jqXHR,status,error){
                            alert("Error al cargar tabla 0");
                        }                
                    })
                }
            
  
                $(document).on('click','#id_subasta_programada .pagination a',function(event){
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    fetch_data1(page);

                });

                function fetch_data1(page){
                    $.ajax({
                        url : "/subastaRapida/fetch_data1?page="+page,
                        success : function(data){
                            $("#id_subasta_programada").html(data);
                        },
                        statusCode:{
                            404: function(){
                                alert("pagina no encontrada mascota");
                            }
                        },
                        error : function(jqXHR,status,error){
                            alert("Error de carga tabla 1");
                        }                
                    })
                }
            

  
                $(document).on('click','#historial_sub .pagination a',function(event){
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    fetch_data2(page);

                });

                function fetch_data2(page){
                    $.ajax({
                        url : "/subastaRapida/fetch_data2?page="+page,
                        success : function(data){
                            $("#historial_sub").html(data);
                        },
                        statusCode:{
                            404: function(){
                                alert("pagina no encontrada mascota");
                            }
                        },
                        error : function(jqXHR,status,error){
                            alert("Error al cargar tabla 2");
                        }                
                    })
                }
        });










 
    </script>

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

        function crearCrono(){
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

        }


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


        function crearCrono2(){
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

        }
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
                crearCrono();
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
                crearCrono2();

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