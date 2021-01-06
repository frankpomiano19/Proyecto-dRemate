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

@endsection

@section('contenido')
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
                            <span class="font-weight-bold small text-uppercase">Mis productos registrados</span>
                        </a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-subasta-his" data-toggle="pill"
                            href="#pills-pro-gan" role="tab" aria-controls="v-pills-messages" aria-selected="false"
                            onclick="tablasOpc = 2;">
                            <i class="fa fa-search"></i>
                            <span class="font-weight-bold small text-uppercase">Mis subastas ganadas</span>
                        </a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-men-now" data-toggle="pill"
                            href="#pills-men-now" role="tab" aria-controls="v-pills-messages" aria-selected="false"
                            onclick="tablasOpc = 3;">
                            <i class="fa fa-search"></i>
                            <span class="font-weight-bold small text-uppercase">Mensajeria</span>
                        </a>
                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-cal-pro" data-toggle="pill"
                            href="#pills-cal-pro" role="tab" aria-controls="v-pills-messages" aria-selected="false"
                            onclick="tablasOpc = 4;">
                            <i class="fa fa-calendar"></i>
                            <span class="font-weight-bold small text-uppercase">Calendario</span>
                        </a>
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
                        </div>


                        <div class="tab-pane fade " id="pills-sub-pro" role="tabpanel" aria-labelledby="pills-profile-tab">
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

                        <div class="tab-pane fade " id="pills-prod-fav" role="tabpanel" aria-labelledby="pills-profile-tab">
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


                        <div class="tab-pane fade " id="pills-sub-his" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Mis productos registrados</h3>
                                    <h4 class="font-weight-bold font-popin"> </h4>
                                    <div class="card-body card-contenido-cuerpo-2">
                                        <div class="table-responsive font-popin" id="historial_prod_sub">
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
                        <div class="tab-pane fade " id="pills-men-now" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <section class="py-0">
                                <div class="container">
                                    <h3 class="font-weight-bold font-popin">Mensajeria</h3>
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
                        
                        <div class="tab-pane fade " id="pills-cal-pro" role="tabpanel" aria-labelledby="pills-profile-tab">
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

                        {{-- -- --}}


                        <div class="tab-pane fade " id="pills-pro-gan" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                                        <div class="card-header">
                                            <h3 class="titulo-card-header-2">Subastas ganadas</h3>
                                        </div>
                                        <div class="card-body card-contenido-cuerpo-2">
                                            <div class="table-responsive font-popin" id="historial_prod_reg">
                                                @include('partials/sub_gan')
                                            </div>
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



@endsection
@section('contenidoJSabajo')
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
@endsection