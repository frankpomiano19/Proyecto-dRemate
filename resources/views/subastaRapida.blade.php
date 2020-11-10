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
                                            <form action="{{ route('subastaRapida_filtro_proc') }}" method="POST">
                                                <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                                                    @csrf
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                            href="" role="tab" aria-controls="pills-home"
                                                            aria-selected="true">Mayor tiempo</a>
                                                    </li>
                                                    <li class="nav-item">

                                                        <a type="submit" class="nav-link" id="pills-profile-tab"
                                                            data-toggle="pill" href="" role="tab"
                                                            aria-controls="pills-profile" aria-selected="false">Menor
                                                            tiempo</a>
                                                    </li>

                                                </ul>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </section>
                            <div class="row justify-content-center">


                                @foreach ($su_curso_s as $su_curso)


                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body" style="margin-bottom: auto;padding-bottom:0px;">
                                                <h5 class="card-title titulo-card-header-1">
                                                    <a href="#">{{ $su_curso->nombre_producto }}</a>
                                                </h5>
                                            </div>
                                            <img class="card-img-top img-logo-size"
                                                src="https://na002.leafletcdns.com/pe/data/24/logo.png" alt="" srcset="">
                                            <div class="product__item">
                                                <div class="product__item__pic img-thumbnail set-bg card-img-top imagen-producto-card"
                                                    data-setbg="img/trending/trend-1.jpg"
                                                    style="background-image: url('{{ $su_curso->imagen }}');background-size:100% 100%;">
                                                    <div class="ep">Precio base : ${{ $su_curso->precio_inicial }} </div>
                                                    <div class="comment"><i class="fa fa-comments"></i> {{ rand(1, 200) }}
                                                    </div>
                                                    <div class="view"><i class="fa fa-heart"></i> {{ rand(1, 50) }}</div>
                                                </div>
                                            </div>
                                            <div class="card-contenido-cuerpo-1">
                                                <div class="card-footer">
                                                    Puja mas alta : S/ {{ $su_curso->precio_inicial + rand(1, 200) }}
                                                </div>
                                                <div class="text-center">Tiempo restante</div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                        aria-valuemin="0" aria-valuemax="100"
                                                        style="width: {{ rand(0, 100) }}%;">
                                                        {{ rand(0, 10) }}: {{ rand(0, 60) }} :{{ rand(0, 60) }}
                                                    </div>
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

                                @endforeach
                                {{ $su_curso_s->render() }}







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


                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
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
                                <a href="#" class="btn btn-primary col-md-12"
                                    style="background-color:rgba(129, 149, 175, 1);">
                                    <div style="text-align: center;">Ver mas subastas</div>
                                </a>
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
                                                            <th>Pedro</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Empleados</th>
                                                            <th>Juan</th>
                                                            <th>Juan</th>
                                                            <th>Juan</th>
                                                            <th>Pedro</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Empleados</th>
                                                            <th>Juan</th>
                                                            <th>Juan</th>
                                                            <th>Juan</th>
                                                            <th>Pedro</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Empleados</th>
                                                            <th>Juan</th>
                                                            <th>Juan</th>
                                                            <th>Juan</th>
                                                            <th>Pedro</th>
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
