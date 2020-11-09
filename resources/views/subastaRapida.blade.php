@extends('layouts.app')


@section('cont_cabe')
    <title>Subasta rapida - dRemate</title>

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
            <div class="row">

                <div class="container py-3">
                    <div class="row text-center align-items-center">
                        <div class="col-sm-12 img-thumbnail text-white titulo-card-header-2"
                            style="background-image:linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)), url('img/assets/subasta4.jpg');background-size:100% 100%;">
                            <h2>dRemate</h2>
                            <hr style="border-color: white">
                            <hr style="border-color: white">
                            <h3>Bienvenido a la subasta rapida</h3>
                            <h4 style="font-size: 15px">Recuerda que para pujar, necesitas estar registrado</h4>
                            <div class="btn-group py-4" role="group">
                                <a href="" role="button" class="btn btn-info"><i class="fa fa-book">
                                        Registrarse</i></a>
                                <a href="{{ route('login') }}" role="button" class="btn btn-info"><i class="fa fa-user">
                                        Iniciar sesion</i></a>
                            </div>
                            <h4 style="font-size: 15px">Puedes conocer productos por categorias</h4>
                            <div class="btn-group py-4" role="group">
                                <a href="{{ route('register') }}" role="button" class="btn btn-info"><i
                                        class="fa fa-chevron-right"> Conocer
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
                    </div>
                </div>





            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#pills-sub-curso"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">Subastas en curso</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#pills-sub-pro" role="tab"
                            aria-controls="v-pills-profile" aria-selected="false">Subastas programadas </a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#pills-sub-his" role="tab"
                            aria-controls="v-pills-messages" aria-selected="false">Historial</a>
                    </div>
                    <!--
                                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                                                                                        aria-labelledby="v-pills-home-tab">...</div>
                                                                                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                                                                        aria-labelledby="v-pills-profile-tab">...</div>
                                                                                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                                                                        aria-labelledby="v-pills-messages-tab">...</div>
                                                                                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                                                                                        aria-labelledby="v-pills-settings-tab">...</div>
                                                                                                </div>
                                                                                            -->
                </div>
                <div class="col-sm-10">

                    <!--3era-->

                    <div class="container tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-sub-curso" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <section class="py-2">

                                <div class="container">
                                    <h3 class="font-weight-bold titulo-card-header-2">Subastas en curso</h3>
                                    <label class="font-weight-bold titulo-card-header-1">Filtro</label>
                                    <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href=""
                                                role="tab" aria-controls="pills-home" aria-selected="true">Mayor tiempo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">Menor tiempo</a>
                                        </li>
                                    </ul>

                                </div>
                            </section>
                            <div class="row justify-content-center">

                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body" style="margin-bottom: auto;padding-bottom:0px;">
                                            <h5 class="card-title titulo-card-header-1">
                                                <a href="#">Silla de madera</a>
                                            </h5>
                                        </div>
                                        <img class="card-img-top img-logo-size"
                                            src="https://na002.leafletcdns.com/pe/data/24/logo.png" alt="" srcset="">
                                        <div class="product__item">
                                            <div class="product__item__pic img-thumbnail set-bg card-img-top imagen-producto-card"
                                                data-setbg="img/trending/trend-1.jpg"
                                                style="background-image: url('img/assets/antique-1125467_1920.jpg');background-size:100% 100%;">
                                                <div class="ep">Precio base : 20$ </div>
                                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                            </div>
                                        </div>
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
                            </div>
                            <a href="#" class="btn btn-primary col-md-12" style="background-color:rgba(129, 149, 175, 1);">
                                <div style="text-align: center;">Ver mas subastas</div>
                            </a>

                        </div>

                        <div class="tab-pane fade " id="pills-sub-pro" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold titulo-card-header-1">Subastas en curso</h3>
                                </div>
                            </section>

                            <div class="container">
                                <div class="row justify-content-center">
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
                                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                        20/10/2020 13:45 horas</div>
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
                                </div>
                                <a href="#" class="btn btn-primary col-md-12"
                                    style="background-color:rgba(129, 149, 175, 1);">
                                    <div style="text-align: center;">Ver mas subastas</div>
                                </a>
                            </div>
                        </div>


                        <div class="tab-pane fade " id="pills-sub-his" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold titulo-card-header-1">Subastas en curso</h3>
                                </div>
                            </section>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="col-sm-4">
                                            <div class="card-header">
                                                <h3 class="titulo-card-header-2">Historial de productos</h3>
                                            </div>
                                            <div class="card-body card-contenido-cuerpo-2">
                                                hola mundo
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <th>Producto vendido</th>
                                                                <th>Precio vendido</th>
                                                                <th>Comprador</th>
                                                                <th>Subastador</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>Empleados</th>
                                                                <th>Juan</th>
                                                                <th>Juan</th>
                                                                <th>Juan</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Empleados</th>
                                                                <th>Juan</th>
                                                                <th>Juan</th>
                                                                <th>Juan</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Empleados</th>
                                                                <th>Juan</th>
                                                                <th>Juan</th>
                                                                <th>Juan</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="card-footer text-center"><a class="btn btn-fill-1" href="#">Ver mas
                                                    en el
                                                    historial</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary col-md-12"
                                    style="background-color:rgba(129, 149, 175, 1);">
                                    <div style="text-align: center;">Ver mas subastas</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </main>

@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection





<!--1era-->
