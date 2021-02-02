@extends('layouts.app')

@section('cont_cabe')
<title>Perfil - dRemate</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenidoJS')
    <!-- Colocar js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset("js/axios.js")}}"></script>
    <script src="{{asset('fullcalendar/core/main.js')}}"></script>
    <script src="{{asset('fullcalendar/daygrid/main.js')}}"></script>

    
    
@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="../css/stylePerfil.css">
    <link rel="stylesheet" href=" {{asset('fullcalendar/core/main.css')}} ">
    <link rel="stylesheet" href=" {{asset('fullcalendar/daygrid/main.css')}} ">    
    <link rel="stylesheet/less" type="text/css" href="css/styleMenuUsuario.less"/>
    <script src="//cdn.jsdelivr.net/npm/less@3.13" ></script>
    <link rel="stylesheet" href="css/styleMenuUsuario.css" />
    <style>
        #footer{
            display: none;
        }
    </style>

@endsection

@section('contenido')



    {{-- Sidebar --}}

    <div id="abajo">
        <aside id="sidebar" class="nano">
            <div class="nano-content">
                <div class="logo-container"><img src="img/avatar-mujer.png" alt="foto-usuario" id="foto-usuario" class="rounded-circle"></div><a class="compose-button">{{ Auth::user()->usuario }}</a>
                <div class="separator"></div>
                <menu class="menu-segment">
                    <div class=" columna-barra-lateral nano-content">
                        <ul class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">

                            <li>
                            <a class="active" id="v-pills-perfil-tab" data-toggle="pill"
                                href="#v-pills-perfil" role="tab" aria-controls="v-pills-perfil" aria-selected="true"
                                onclick="tablasOpc = 0;">
                                <i class="fa fa-address-card"></i>
                                <span class="font-weight-bold small text-uppercase"  href="{{ route('perfil_us') }}">Mi perfil</span></a>
                            </li>

                            <li>
                            <a class="" id="v-pills-subastas-tab" data-toggle="pill"
                                href="#v-pills-subastas" role="tab" aria-controls="v-pills-subastas" aria-selected="false"
                                onclick="tablasOpc = 1;">
                                <i class="fa fa-search"></i>
                                <span class="font-weight-bold small text-uppercase">Mis productos</span></a>
                            </li>

                            <li>
                            <a class="" id="v-pills-productos-tab" data-toggle="pill"
                                href="#v-pills-productos" role="tab" aria-controls="v-pills-productos" aria-selected="false"
                                onclick="tablasOpc = 2;">
                                <i class="fa fa-search"></i>
                                <span class="font-weight-bold small text-uppercase">Mis subastas</span>
                            </a>
                            </li>

                            <li>
                            <a class="" id="v-pills-ganadas-tab" data-toggle="pill"
                                href="#v-pills-ganadas" role="tab" aria-controls="v-pills-ganadas" aria-selected="false"
                                onclick="tablasOpc = 3;">
                                <i class="fa fa-search"></i>
                                <span class="font-weight-bold small text-uppercase">Subastas ganadas</span>
                            </a>
                            </li>

                            <li>
                            <a class="" id="v-pills-mensajes-tab" data-toggle="pill"
                                href="#v-pills-mensajes" role="tab" aria-controls="v-pills-mensajes" aria-selected="false"
                                onclick="tablasOpc = 4;">
                                <i class="fa fa-search"></i>
                                <span class="font-weight-bold small text-uppercase">Mensajes</span>
                            </a>
                            </li>

                            <li>
                            <a class="" id="v-pills-calendario-tab" data-toggle="pill"
                                href="#v-pills-calendario" role="tab" aria-controls="v-pills-calendario" aria-selected="false"
                                onclick="tablasOpc = 5;">
                                <i class="fa fa-calendar"></i>
                                <span class="font-weight-bold small text-uppercase">Calendario</span>
                            </a>
                            </li>
                            <li>
                            <a class="" id="v-pills-pujas-tab" data-toggle="pill"
                                href="#v-pills-pujas" role="tab" aria-controls="v-pills-pujas" aria-selected="false"
                                onclick="tablasOpc = 6;">
                                <i class="fa fa-search"></i>
                                <span class="font-weight-bold small text-uppercase">Mis pujas</span>
                            </a>
                            </li>
                        </ul>
                    </div>

                </menu>
                <div class="bottom-padding"></div>
            </div>
        </aside>
    </div>



    {{-- Contenido principal --}}

    <main class="sub-rapida-main-content py-4" id="main">

        <div class="overlay"></div>
        <header class="header">
            <h1 class="page-title"><a class="sidebar-toggle-btn trigger-toggle-sidebar"><span class="line"></span><span class="line"></span><span class="line"></span><span class="line line-angle1"></span><span class="line line-angle2"></span></a><a><span class="icon glyphicon glyphicon-chevron-down"></span></a></h1>
        </header>
  
        
  
        <div id="main-nano-wrapper" class="nano">
  
            <div class="nano-content">
                
                {{-- <div class="col-lg-10 contenido-dinamico-lateral"> --}}
  
                    <!--3era-->
  
                    <div class="container tab-content" id="pills-tabContent">
  
                        <div class="tab-pane fade show active" id="v-pills-perfil" role="tabpanel" aria-labelledby="v-pills-perfil-tab">
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
                        </div>
  
  
                        <div class="tab-pane fade " id="v-pills-productos" role="tabpanel" aria-labelledby="v-pills-productos-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Mis productos en subasta</h3>
                                    <h4 class="font-weight-bold font-popin"> </h4>
                                    <div class="card-body card-contenido-cuerpo-2">
                                        <div class="table-responsive font-popin" id="historial_prod_sub">
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
  
                        <div class="tab-pane fade " id="v-pills-favoritos" role="tabpanel" aria-labelledby="v-pills-favoritos-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Mis productos favoritos</h3>
                                    <h4 class="font-weight-bold font-popin"> </h4>
                                    <div class="card-body card-contenido-cuerpo-2">
                                        <div class="table-responsive font-popin" id="historial_prod_sub">
                                            @include('partials/prod_fav')
                                        </div>
                                    </div>
                                </div>
                            </section>
  
                            <div class="container">
                                <div class="row justify-content-center" id="">
  
                                </div>
                            </div>
                        </div>
  
  
                        <div class="tab-pane fade " id="v-pills-subastas" role="tabpanel" aria-labelledby="v-pills-subastas-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Mis productos registrados</h3>
                                    <h4 class="font-weight-bold font-popin"> </h4>
                                    <div class="card-body card-contenido-cuerpo-2">
                                        <div class="table-responsive font-popin" id="historial_prod_reg" >
                                            @include('partials/prod_reg')
                                        </div>
                                    </div>
                                </div>
                            </section>
  
                            <div class="container">
                                <div class="row justify-content-center" id="">
  
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="v-pills-mensajes" role="tabpanel" aria-labelledby="v-pills-mensajes-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Mensajeria
                                        <i class="fa fa-question-circle-o" style="cursor: help;" aria-hidden="true" data-toggle="tooltip" data-html="true" title="Solo se permite enviar mensajes referentes a productos registrados, para enviar un mensaje ir al perfil de usuario y buscar un producto en 'Registro'"></i>                    
                                    </h3>
                                    <h4 class="font-weight-bold font-popin"> </h4>
                                    <div class="card-body" style="padding: 0px;">
                                        <div class="table-responsive font-popin" id="mensajeria-perfil">
                                            @include('partials.men_perfil')
                                        </div>
                                    </div>
                                </div>
                            </section>
  
                            <div class="container">
                                <div class="row justify-content-center" id="">
  
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade " id="v-pills-calendario" role="tabpanel" aria-labelledby="v-pills-calendario-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Calendario</h3>
                                    <h4 class="font-weight-bold font-popin"> </h4>
                                    <div class="card-body" style="padding: 0px;">
                                        <div class="table-responsive font-popin" id="calendar_user">
                                            <div id='calendar'></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </section>
  
                            <div class="container">
                                <div class="row justify-content-center" id="">
  
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="v-pills-pujas" role="tabpanel" aria-labelledby="v-pills-pujas-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Historial de pujas</h3>
                                    <h4 class="font-weight-bold font-popin"> </h4>
                                    <div class="card-body" style="padding: 0px;">
                                        <div class="table-responsive font-popin" id="historial_puj">
                                            @include('partials.hist_pujas')
                                        </div>
                                    </div>
                                </div>
                            </section>
  
                            <div class="container">
                                <div class="row justify-content-center" id="">
  
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="v-pills-ganadas" role="tabpanel" aria-labelledby="v-pills-ganadas-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                        <div class="card-header">
                                            <h3 class="titulo-card-header-2">Subastas ganadas
                                                    <i class="fa fa-question-circle-o" style="cursor: help;" aria-hidden="true" data-toggle="tooltip" data-html="true" title="Aca se mostraran las productos que ganaste la subasta, y se habilitara un boton para terminar la transaccion"></i>                    
                                            </h3>
                                        </div>
                                        <div class="card-body card-contenido-cuerpo-2">
                                            <div class="table-responsive font-popin" id="historial_prod_sub">
                                                @include('partials/sub_gan')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


  
                    </div>
                {{-- </div> --}}
            </div>
          </div>
      </main>

    
{{-- Popup de responder mensajes --}}
<div class="modal fade" id="modalMensajeMostrar" tabindex="-1" role="dialog" aria-labelledby="modalMensajeMostrar"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMensajeMostrarLabel">Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Producto :</label>
                    <input type="text" class="form-control" id="recipientMensajeModal" name="recipientMensajeModal"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Usuario destino :</label>
                    <input type="text" class="form-control" id="recipientReceptorModal" name="recipientReceptorModal"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Asunto :</label>
                    <input type="text" class="form-control" id="recipientAsuntoModal" placeholder="inserte el asunto"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Mensaje:</label>
                    <textarea class="form-control" id="recipientMensajeEmisor" disabled></textarea>
                </div>

                <h5 class="modal-title" id="modalMensajeMostrarLabel2">Responder</h5>
                {{-- Formulario de respondida --}}
                <form method="POST" id="formResponderMensaje">
                    @csrf
                    <input type="hidden" id="recipientIdProductoModal" name="recipientIdProductoModal">
                    <input type="hidden" id="recipientIdModal" name="recipientIdModal">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Asunto :</label>
                        <input type="text" class="form-control" id="recipientAsuntoRespuestaModal"
                            name="recipientAsuntoRespuestaModal" placeholder="inserte el asunto" required>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Responder:</label>
                        <textarea class="form-control" id="recipientMensajeResponder" name="recipientMensajeResponder" required
                            placeholder="Responder mensaje"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="enviarRespuestaNow" class="btn btn-primary" data-dismiss="modal">Responder mensaje</button>
            </div>
        </div>
    </div>
</div>




{{-- Popup de ver mensaje --}}
<div class="modal fade" id="modalMensajeEnviadoMostrar" tabindex="-1" role="dialog" aria-labelledby="modalMensajeMostrar"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMensajeMostrarLabel">Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Producto :</label>
                    <input type="text" class="form-control" id="recipientMensajeModal2" name="recipientMensajeModal"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Usuario emisor :</label>
                    <input type="text" class="form-control" id="recipientReceptorModal2" name="recipientReceptorModal"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Asunto :</label>
                    <input type="text" class="form-control" id="recipientAsuntoModal2" placeholder="inserte el asunto"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Mensaje:</label>
                    <textarea class="form-control" id="recipientMensajeEmisor2" disabled></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    {{-- Configuracion de ayuda --}}
    @auth
        @php
            $ayudaRuta = Auth::user()->userHelp->help_infoPerfil;
            $urlPagina = "deleteOneHelpInfoPerfil";
        @endphp
    @endauth
    @include('includes/PopupHelp/InfoPerfilHelpPopupHtml')

    {{-- Fin configuracion de ayuda --}}



@endsection
@section('contenidoJSabajo')
    {{-- Script de ayuda popup --}}
    @include('includes/PopupHelp/jsHelpPopupScript')    
    {{-- Fin --}}

<script src="{{ asset('js/axios.js') }}"></script>
<script src="{{asset('js/jsPerfil.js')}}"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
    
            var calendar = new FullCalendar.Calendar(calendarEl, {
              plugins: [ 'dayGrid' ],

              events:[
            
            @foreach (auth()->user()->userProductoCalendar as $item)
            {
              title:"{{$item->nombre_producto}}",
              start:"{{$item->inicio_subasta}}",
              end:"{{$item->final_subasta}}",
              color:"#007bff",
              textColor:"#000000",
            },
            @endforeach
            
          ]

            });
            calendar.setOption('locale','Es');
    
            calendar.render();
        });
    
      </script>      
      <script src="js/jsMenuUsuario.js"></script>
      <script src="js/jsScrollBar.js"></script>


@endsection