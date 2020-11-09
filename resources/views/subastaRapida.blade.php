@extends('layouts.app')


@section('cont_cabe')
    <title>Subtitulo - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->

    <script src="js/jsSubastaRapida.js"></script>
@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="css/styleSubastaRapida.css">
@endsection


@section('contenido')
    <br>

    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('img/assets/antique-1125467_1920.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-4">Categorias</h3>
                        <p class="lead"><button class="btn btn-dark">Ir a categorias</button></p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('img/assets/antique-1125467_1920.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-4">Subasta mas popular</h3>
                        <p class="lead"><button class="btn btn-dark">Ver subasta</button></p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('img/assets/antique-1125467_1920.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-4">Producto mas popular</h3>
                        <p class="lead"><button class="btn btn-dark">Ir a subasta</button></p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
    <main class="sub-rapida-main-content">

        <div class="container sub-rapida-principal">
            <div class="container py-3">
                <div class="row">
                    <ol class="col-sm-4 breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item active">Subasta Rapida</li>
                    </ol>
                </div>
            </div>
            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a style="color: black;" class="nav-link active" id="pills-home-tab" data-toggle="pill"
                        href="#pills-sub-curso" role="tab" aria-controls="pills-home" aria-selected="true">Subastas en
                        curso</a>
                </li>
                <li class="nav-item">
                    <a style="color: black;" class="nav-link" id="pills-profile-tab" data-toggle="pill"
                        href="#pills-sub-pro" role="tab" aria-controls="pills-profile" aria-selected="false">Subastas
                        programadas</a>
                </li>
                <li class="nav-item">
                    <a style="color: black;" class="nav-link" id="pills-profile-tab" data-toggle="pill"
                        href="#pills-sub-his" role="tab" aria-controls="pills-his" aria-selected="false">Historial</a>
                </li>
            </ul>
            <div class="container tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-sub-curso" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <section class="py-2">
                        <div class="container">
                            <h3 class="font-weight-bold titulo-card-header-1">Subastas en curso</h3>
                        </div>
                    </section>

                    <label class="py-0 card-contenido-cuerpo-1" for="">Filtro por tiempo restante</label><br>
                    <label class="py-0 card-contenido-cuerpo-1" for=""><input type="radio" name="sub-proceso-orden"> Mayor
                        tiempo</label>
                    <label class="py-0 card-contenido-cuerpo-1" for=""><input type="radio" name="sub-proceso-orden"> Menor
                        tiempo</label>

                    <div class="row">

                        @for ($i = 0; $i < 3; $i++)
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title titulo-card-header-1">
                                            <a href="#">Silla de madera</a>
                                        </h5>

                                        <img class="card-img-top" src="https://na002.leafletcdns.com/pe/data/24/logo.png"
                                            alt="" srcset="">
                                    </div>

                                    <a href="#"><img class="card-img-top imagen-producto-card"
                                            src="img/assets/antique-1125467_1920.jpg" alt=""></a>
                                    <div class="card-contenido-cuerpo-1">
                                        <div class="card-footer">
                                            Puja mas alta : S/ 40.00
                                        </div>
                                        <div class="text-center">Tiempo restante</div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%;">10:30:00</div>
                                        </div>
                                        <div class="alert alert-success" role="alert">Carga completa!</div>


                                        <a href="#" class="btn btn-primary col-md-12 boton-ver-subasta">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: center">Ver Subasta</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        @endfor

                        <a href="#" class="btn btn-primary col-md-12" style="background-color:rgba(129, 149, 175, 1);">
                            <div style="text-align: center;">Ver mas subastas</div>
                        </a>

                    </div>


                </div>
                <div class="tab-pane fade" id="pills-sub-pro" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <section class="py-0">
                        <div class="container">
                            <h3 class="font-weight-bold titulo-card-header-1">Subastas en curso</h3>
                        </div>
                    </section>



                    <div class="container">
                        <div class="row">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#" class="titulo-card-header-1">Silla de madera</a>
                                            </h4>
                                            <h5 style="text-align: center">Logo-empresa</h5>
                                        </div>

                                        <a href="#"><img class="card-img-top imagen-producto-card"
                                                src="img/assets/antique-1125467_1920.jpg" alt=""></a>
                                        <div class="card-contenido-cuerpo-1">
                                            <div class="card-footer">
                                                Precio base : S/ 20.00
                                            </div>
                                            <div class="text-center">Inicia el</div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 100%;">20/10/2020
                                                    13:45
                                                    horas</div>
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
                                                    <div class="col-md-12" style="text-align: center">Ver Subasta</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <a href="#" class="btn btn-primary col-md-12" style="background-color:rgba(129, 149, 175, 1);">
                                <div style="text-align: center;">Ver mas subastas</div>
                            </a>
                        </div>
                    </div>




                </div>

    </main>

@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection
