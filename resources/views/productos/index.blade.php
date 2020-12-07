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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="css/styleSubastaRapida.css">
    <link rel="stylesheet" href="js/jquery.countdown.package-2.1.0/css/jquery.countdown.css">

@endsection

@section('contenido')

    <main class="sub-rapida-main-content py-4">
        <div class="container sub-rapida-principal">

            <div class="row py-4">
                <div class="col-lg-2 py-2 columna-barra-lateral">
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-subasta-cur" data-toggle="pill"
                            href="#pills-sub-curso" role="tab" aria-controls="v-pills-home" aria-selected="true"
                            onclick="tablasOpc = 0;">
                            <i class="fas fa-address-card"></i>
                            <span class="font-weight-bold small text-uppercase"  href="{{ route('perfil_us') }}">Perfil de usuario</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-subasta-pro" data-toggle="pill"
                            href="#pills-sub-pro" role="tab" aria-controls="v-pills-profile" aria-selected="false"
                            onclick="tablasOpc = 1;">
                            <i class="fas fa-search"></i>
                            <span class="font-weight-bold small text-uppercase">Mis productos en subasta</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-subasta-his" data-toggle="pill"
                            href="#pills-sub-his" role="tab" aria-controls="v-pills-messages" aria-selected="false"
                            onclick="tablasOpc = 2;">
                            <i class="fas fa-search"></i>
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
										<div class="table-responsive font-popin" id="historial_sub">
										
                                            </div>
                                    

                                </div>
                            </section>
                            <div id="subasta_proc_filtro_include" class="row">


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
                                 <h4 class="font-weight-bold font-popin"> Para que exista esta pestaña deben haber un boton registrar  que guarde  las subastas programadas que el usuario quiera, al menos no encontre esta un poco desorganizada y no encuentro algunas funcionalidades</h4>
                                </div>
                            </section>

                            <div class="container">
                                <div class="row justify-content-center" id="id_subasta_programada">

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


@endsection
@push('ajax_crud')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('js/ajax.js')}}"></script>

@endpush 
