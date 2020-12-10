@extends('layouts.app')

@section('cont_cabe')
<title>Perfil - dRemate</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenidoJS')
    <!-- Colocar js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="../css/stylePerfil.css">

@endsection

@section('contenido')
    <br>
    <br>
    <main class="sub-rapida-main-content py-4">
        <div class="container sub-rapida-principal">

            <div class="row py-4">
                <div class="col-lg-2 py-2 columna-barra-lateral">
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-subasta-cur" data-toggle="pill"
                            href="#pills-sub-curso" role="tab" aria-controls="v-pills-home" aria-selected="true"
                            onclick="tablasOpc = 0;">
                            <i class="fa fa-address-card"></i>
                            <span class="font-weight-bold small text-uppercase"  href="{{ route('perfil_us') }}">Perfil de usuario</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-subasta-pro" data-toggle="pill"
                            href="#pills-sub-pro" role="tab" aria-controls="v-pills-profile" aria-selected="false"
                            onclick="tablasOpc = 1;">
                            <i class="fa fa-search"></i>
                            <span class="font-weight-bold small text-uppercase">Mis productos en subasta</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-subasta-his" data-toggle="pill"
                            href="#pills-sub-his" role="tab" aria-controls="v-pills-messages" aria-selected="false"
                            onclick="tablasOpc = 2;">
                            <i class="fa fa-search"></i>
                            <span class="font-weight-bold small text-uppercase">Mis productos registrados</span></a>

                    </div>
                </div>
                <div class="col-lg-10 contenido-dinamico-lateral">

                    <!--3era-->

                    <div class="container tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-sub-curso" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <section class="py-2">

                                <div class="container">
                                    <h3 class="font-weight-bold font-popin" >Perfil de usuario</h3>
										<div class="table-responsive font-popin" id="">

                                                @include('usuarioOpc.pestAux')
                                        </div>
                                    

                                </div>
                            </section>
                            <div id="" class="row">


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
                                    <h3 class="font-weight-bold font-popin">Mis productos en subasta</h3>
                                 <h4 class="font-weight-bold font-popin"> </h4>
                                 <div class="card-body card-contenido-cuerpo-2">
                                    <div class="table-responsive font-popin" id="">
                                        @include('partials/prod_sub')
                                    </div>
                                </div>


                                </div>
                            </section>

                            <div class="container">
                                <div class="row justify-content-center" id="">

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade " id="pills-sub-his" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                        <div class="card-header">
                                            <h3 class="titulo-card-header-2">Mis productos registrados</h3>
                                        </div>
                                        <div class="card-body card-contenido-cuerpo-2">
                                            <div class="table-responsive font-popin" id="historial_sub">
                                                @include('partials/prod_reg')
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




    

@endsection
@section('contenidoJSabajo')

<script src="{{asset('js/jsPerfil.js')}}"></script>

@endsection
@push('ajax_crud')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('js/ajax.js')}}"></script>

@endpush 
