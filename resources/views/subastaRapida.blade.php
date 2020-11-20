@extends('layouts.app')


@section('cont_cabe')
    <title>Subasta rapida - dRemate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenidoJS')
    <!-- Colocar js-->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>

@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="css/styleSubastaRapida.css">
    <link rel="stylesheet" href="js/jquery.countdown.package-2.1.0/css/jquery.countdown.css">

@endsection


@section('contenido')

    <script>
        var programada_cantidad = 0;
        var programada_fecha_inicial = [0, 0, 0, 0, 0, 0, 0, 0, 0];
        var programada_fecha_final = [0, 0, 0, 0, 0, 0, 0, 0, 0];
        var programada_fecha_diff = [0, 0, 0, 0, 0, 0, 0, 0, 0];


        var programada_cantidad2 = 0;
        var programada_fecha_inicial2 = [0, 0, 0, 0, 0, 0, 0, 0, 0];
        var programada_fecha_final2 = [0, 0, 0, 0, 0, 0, 0, 0, 0];
        var programada_fecha_diff2 = [0, 0, 0, 0, 0, 0, 0, 0, 0];
        var filtroOpc = 0;
        var tablasOpc = -1;


        var progresoIndex = 0;

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
                                                        role="tab" aria-controls="pills-home" onclick="filtroOpc = 0;">Mayor
                                                        tiempo
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="menor-tiempo" data-toggle="pill" href=""
                                                        role="tab" aria-controls="pills-profile" aria-selected="false"
                                                        onclick="filtroOpc = 1;">Menor
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
                                        <!--
                                            <div class="card-footer text-center"><a class="btn btn-fill-1" href="#">Ver mas
                                                    en el
                                                    historial</a>
                                            </div>
                                        -->
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
    <script src="js/moment-2.29.1.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    <script>
        function progresoRun() {
            var $progress = document.getElementsByClassName('progess');
            var $progressBar = document.getElementsByClassName('progress-bar');
            var $alert = document.getElementsByClassName('alerta-terminado');
            //var $progress = $('.progress');
            //var $progressBar = $('.progress-bar');
            //var $alert = $('.alert');
            for (var l = 0; l < $progress.length; l++) {
                $progressBar[l].animate({
                    width: "100%"
                }, 50000);
                $progress[l].delay(100000).fadeOut(50000);

                setTimeout(function() {
                    $progress[l].css('display', 'none');
                    $alert[l].css('display', 'block');
                }, 50000);
            }
        }

    </script>

    <script>
        $(document).ready(function() {
            crearCrono();
            crearCrono2();
            progresoRun();
            /*
            $(document).on('click', '#v-pills-subasta-cur', function(event) {
                crearCrono();
            })
            */
            $(document).on('click', '#v-pills-subasta-pro', function(event) {
                crearCrono2();
            })

            $(document).on('click', '#subasta_proc_filtro_include .pagination a', function(event) {
                event.preventDefault();
                var page0 = $(this).attr('href').split('page=')[1];
                fetch_data(page0);
            });

            function fetch_data(page0) {
                $.ajax({
                    type: 'GET',
                    data: {
                        'filtro': filtroOpc
                    },
                    url: "/subastaRapida/fetch_data?page=" + page0,
                    success: function(data) {
                        var tiempoRestantecarDestroy = document.getElementsByClassName(
                            'defaultCountdown');
                        for (var m = 0; m < tiempoRestantecarDestroy.length; m++) {
                            $(tiempoRestantecarDestroy[m]).countdown('destroy');

                        }
                        $("#subasta_proc_filtro_include").html(data);
                        crearCrono();
                        $("#subasta_proc_filtro_include").removeClass('div-disabled');
                    },
                    beforeSend: function(thisXHR) {
                        $("#subasta_proc_filtro_include").addClass('div-disabled');
                    },

                    statusCode: {
                        404: function() {
                            alert("pagina no encontrada mascota");
                        }
                    },
                    error: function(jqXHR, status, error) {
                        alert("Error al cargar tabla 0");
                    }
                })
            }


            $(document).on('click', '#id_subasta_programada .pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data1(page);

            });

            function fetch_data1(page) {
                $.ajax({
                    url: "/subastaRapida/fetch_data1?page=" + page,
                    success: function(data) {
                        var tiempoRestantecarDestroy = document.getElementsByClassName(
                            'defaultCountdownPro');
                        for (var m = 0; m < tiempoRestantecarDestroy.length; m++) {
                            $(tiempoRestantecarDestroy[m]).countdown('destroy');

                        }

                        $("#id_subasta_programada").html(data);
                        crearCrono2();
                        $("#id_subasta_programada").removeClass('div-disabled');
                    },
                    beforeSend: function(thisXHR) {
                        $("#id_subasta_programada").addClass('div-disabled');
                    },
                    statusCode: {
                        404: function() {
                            alert("pagina no encontrada mascota");
                        }
                    },
                    error: function(jqXHR, status, error) {
                        alert("Error de carga tabla 1");
                    }
                })
            }



            $(document).on('click', '#historial_sub .pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data2(page);

            });

            function fetch_data2(page) {
                $.ajax({
                    url: "/subastaRapida/fetch_data2?page=" + page,
                    success: function(data) {
                        $("#historial_sub").html(data);
                        $("#historial_sub").removeClass('div-disabled');
                    },
                    beforeSend: function(thisXHR) {
                        $("#historial_sub").addClass('div-disabled');
                    },
                    statusCode: {
                        404: function() {
                            alert("pagina no encontrada mascota");
                        }
                    },
                    error: function(jqXHR, status, error) {
                        alert("Error al cargar tabla 2");
                    }
                })
            }
        });

    </script>
    <script>
        function crearCrono() {
            var tiempoRestante = document.getElementsByClassName('defaultCountdown');
            for (var i = 0; i < tiempoRestante.length; i++) {
                $(tiempoRestante[i]).countdown({
                    until: programada_fecha_diff[i]
                });
            }
            programada_cantidad = 0;
        }

        function crearCrono2() {
            var tiempoRestantePro = document.getElementsByClassName('defaultCountdownPro');
            for (var i = 0; i < tiempoRestantePro.length; i++) {
                $(tiempoRestantePro[i]).countdown({
                    until: programada_fecha_diff2[i]
                });
            }
            programada_cantidad2 = 0;
        }

    </script>

    <script>
        $('#menor-tiempo').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "subastaRapida",
                type: 'POST',
                data: {
                    'filtro': 0
                },
                success: function(response) {
                    var tiempoRestantecarDestroy = document.getElementsByClassName(
                        'defaultCountdown');
                    for (var m = 0; m < tiempoRestantecarDestroy.length; m++) {
                        $(tiempoRestantecarDestroy[m]).countdown('destroy');

                    }
                    $("#subasta_proc_filtro_include").html(response);
                    crearCrono();
                    $("#subasta_proc_filtro_include").removeClass('div-disabled');

                },
                beforeSend: function(thisXHR) {
                    $("#subasta_proc_filtro_include").addClass('div-disabled');
                },
                statusCode: {
                    404: function() {
                        alert("pagina no encontrada mascota");
                    }
                },
                error: function(jqXHR, status, error) {
                    alert("Error al cargar");
                }
            });
        });


        $('#mayor-tiempo').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "subastaRapida",
                type: 'POST',
                data: {
                    'filtro': 1
                },
                success: function(response) {
                    var tiempoRestantecarDestroy = document.getElementsByClassName(
                        'defaultCountdown');
                    for (var m = 0; m < tiempoRestantecarDestroy.length; m++) {
                        $(tiempoRestantecarDestroy[m]).countdown('destroy');

                    }

                    $("#subasta_proc_filtro_include").html(response);
                    crearCrono();
                    $("#subasta_proc_filtro_include").removeClass('div-disabled');

                },
                beforeSend: function(thisXHR) {
                    $("#subasta_proc_filtro_include").addClass('div-disabled');
                },
                statusCode: {
                    404: function() {
                        alert("pagina no encontrada mascota");
                    }
                },
                error: function(jqXHR, status, error) {
                    alert("Error al cargar");
                }
            });
        });

    </script>


@endsection
