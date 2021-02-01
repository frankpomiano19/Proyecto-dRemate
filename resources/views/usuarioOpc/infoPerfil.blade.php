@extends('layouts.app')


@section('share-content')
    <meta property="og:url" content="http://dremate.herokuapp.com/info-{{ $usuarioPerfil->id }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Perfil : {{ $usuarioPerfil->usuario }}" />
    <meta property="og:description" content="Perfil de usuario " />
    <meta property="og:image" content="{{ asset('img/assets/usuarioAnonimo.png') }}" />
@endsection


@section('cont_cabe')
    <title>Informacion - dRemate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('contenidoJS')
    <!-- Colocar js-->

    <script>
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
  

@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="../css/styleComentario.css">
    <link rel="stylesheet" href="../css/infoVendedor.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins">


@endsection


@section('contenido')
@php

  \Carbon\Carbon::setLocale('es');  
@endphp
    <script>
        let contadorComentario = [-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1];
        let identificadorComentario = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        let indexComentario = -1;
        let classBotonEditar;
        let classBotonCancelar;
        let classBotonConfirmar;
        let classParrafoComentario;
        let classParrafoComentarioEdit;

    </script>

    @php
    if($usuarioPerfil->us_twitter != null){
    $twitterUrl = $usuarioPerfil->us_twitter;
    }else{
    $twitterUrl="#";
    }

    if($usuarioPerfil->us_youtube != null){
    $youtubeUrl = $usuarioPerfil->us_youtube;
    }else{
    $youtubeUrl="#";
    }

    if($usuarioPerfil->us_facebook != null){
    $facebookUrl = $usuarioPerfil->us_facebook;
    }else{
    $facebookUrl="#";
    }

    if($usuarioPerfil->us_twitch != null){
    $twitchUrl = $usuarioPerfil->us_twitch;
    }else{
    $twitchUrl="#";
    }

    @endphp

  <!-- Modal de usuario bloqueado-->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">El usuario {{$usuarioPerfil->usuario}} ha sido bloqueado</h5>
           
        </div>
        <div class="modal-body">
          Este usuario ha sido reportado por infringir las normas de la página. Le recomendamos volver a Subasta Rápida.
        </div>
        <div class="modal-footer">
          
          <a class="btn btn-success" href="{{ route('subastaRapida') }}" role="button">Subasta Rápida</a>
        </div>
      </div>
    </div>
  </div>



    <main class="container">

        <section class="cabecera">
            <header>
                <div class="container">
                    <div class="heading-wrapper">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="info">
                                    <i class="fa fa-map-marker"></i>
                                    <div class="right-area">
                                        <h5>Cueto Fernandini 512</h5>
                                        <h5>COVIMA, La Molina</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="info">
                                    <i class="fa fa-phone"></i>
                                    <div class="right-area">
                                        <h5>994 212 883</h5>
                                        <h6>LUN-VIERNES, 8AM - 2PM</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="info">
                                    <i class="fa fa-envelope"></i>
                                    <div class="right-area">
                                        <h5>{{ $usuarioPerfil->email }}</h5>
                                        <h6>RESPONDE EN 24 HORAS</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <section class="intro-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1 col-lg-2"></div>
                        <div class="col-md-10 col-lg-8">
                            <div class="intro">
                                <div class="profile-img"><img
                                        src="data:image/jpeg;base64,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"
                                        alt=""></div>
                                <h2 style="color: #333;"><b>{{ $usuarioPerfil->usuario }}</b></h2>
                                <h4 class="font-yellow">Vendedor registrado</h4>
                                <ul class="information margin-tb-30" style="padding-left: 0px;">
                                    <li><b>FECHA DE NACIMIENTO: </b>
                                        @if ($usuarioPerfil->fechadenacimiento != null)
                                            {{ $usuarioPerfil->fechadenacimiento }}
                                        @else
                                            No se registro fecha de nacimiento

                                        @endif
                                    </li>
                                    <li><b>CORREO PERSONAL: </b>{{ $usuarioPerfil->email }}</li>
                                    <li><b>FECHA DE REGISTRO: </b>
                                        @if ($usuarioPerfil->created_at != null)

                                            @php
                                            echo \Carbon\Carbon::parse($usuarioPerfil->created_at)->diffForHumans();   
                                            @endphp
                                        @else
                                            No se registro fecha de creacion
                                        @endif
                                    </li>
                                </ul>
                                <ul class="social-icons" style="padding-left: 0px;margin-bottom: 0px;">
                                    <li><a href="{{ $twitterUrl }}"
                                            class="btn btn-social-icon
                                                                                                                                                                                                        btn-twitter"><span
                                                class="fa fa-twitter"></span></a>
                                    </li>
                                    <li><a href="{{ $facebookUrl }}" class="btn btn-social-icon btn-facebook"><span
                                                class="fa fa-facebook"></span></a></li>
                                    <li><a href="{{ $twitchUrl }}" class="btn btn-social-icon btn-twitch"><span
                                                class="fa fa-twitch"></span></a></li>
                                    <li><a href="{{ $youtubeUrl }}" class="btn btn-social-icon btn-youtube"><span
                                                class="fa fa-youtube"></span></a></li>
                                    <br>
                                </ul>
                                {{-- Compartir perfil --}}
                                <h3 class="text-center m-auto p-4">Comparte mi perfil</h3> 

                                <ul class="social-icons" style="padding-left: 0px;margin-bottom: 0px;">
                                    <li>
                                        <a class="btn btn-social-icon btn-twitter" style="width:100px;font-size:10px" href="https://twitter.com/intent/tweet?text=Perfil de usuario&url=http://dremate.herokuapp.com/info-{{ $usuarioPerfil->id }}&hashtags=dRemate-perfil,dRemate">
                                            <span class="fa fa-twitter">&nbsp;Compartir</span>
                                        </a>        
                                    </li>
                                    <li>
                                        <div class=" fb-share-button " 
                                        data-href="http://dremate.herokuapp.com/info-{{ $usuarioPerfil->id }}" 
                                        data-layout="button_count" data-size="large">
                                        </div>        
                                    </li>
                                </ul>
                                {{-- Fin --}}

                            </div><!-- intro -->
                        </div><!-- col-sm-8 -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>



            <form method="POST" id="form-calificar"
                            action="{{ route('calificar-create')}}">  
                           {{ csrf_field()}}
                           
                            
                            
                                  <div class="rating-group">
                                  <input disabled checked class="rating__input rating__input--none" name="score" id="rating3-none" value="0" type="radio">
                                  <label aria-label="1 star" class="rating__label" for="rating3-1">
                                  <i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-1" value="1" type="radio" required>
                                  <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-2" value="2" type="radio" >
                                  <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-3" value="3" type="radio">
                                  <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-4" value="4" type="radio" >
                                  <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-5" value="5" type="radio" >
                                  </div>
                                  <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                        type="submit" id="calificar-button">Enviar</button>
                                  <input type="hidden" value="{{ $idPerfil }}" name="idUserPerfil" id="hidden-id-user">
                               </form>
                               (
                            {{isset($cantidad)?$cantidad:'Aún no hay votos'}}
                           
                                      <span class="num-ratings"> </span>
                                        <label class="">votos, promedio</label>
                                     
                             {{isset($promedio)?$promedio:'Aún no hay votos'}}
                             )
                             
            <section class="about-section section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="heading">
                                <h3><b>Sobre mí</b></h3>
                                <h6 class="font-lite-black"><b>Descripción</b></h6>
                            </div>
                        </div><!-- col-sm-4 -->
                        <div class="col-sm-8">
                            <p class="margin-b-50" style="font-family: 'Poppins', serif;">{{ $usuarioPerfil->us_descp }}</p>

                            <!-- row -->
                        </div><!-- col-sm-8 -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
            <section class="about-section section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <div class="heading">
                                <h3><b>Mis productos</b></h3>
                                <h6 class="font-lite-black"><b></b></h6>
                            </div>
                        </div><!-- col-sm-12 -->
                    </div>
                    <div  id="info-prod-2">
                        @include('usuarioOpc.partialsUser.comentarioProd')
                    </div>
                </div><!-- container -->
            </section>
        </section>
        @guest
            <!--<h2>Para poder comentar, necesita identificarse</h2>-->
            <div class="p-3 bg-white mt-2 rounded text-center">
                <h2 style="padding-bottom: 15px;">Regístrate para poder comentar</h2><a class="btn btn-success btn-sm px-3"
                    href="{{ route('register') }}" role="button">Registrarse</a>
            </div>
            <form method="POST" id="form-comentar">
                <input type="hidden" value="{{ $idPerfil }}" name="idUserPerfil" id="hidden-id-user">
            </form>

        @else
        <div class="row d-flex justify-content-center py-4" id="Denunciar-perfil-usuario">
            <!-- Boton del modal de denunciar usuario -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Reportar Usuario
                </button>
                
                <!-- Modal de denunciar usuario -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form action="{{route('report-usuario')}}" method="POST">
                        @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reportar a este usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            
                                <input type="number" id="id_denunc" name="id_denunc" style="display: none" value="{{$usuarioPerfil->id}}" readonly><br>
                                <input type="radio" id="denuncia1" name="denuncia" value="Contenido inapropiado" checked>
                                <label for="denuncia1">Contenido inapropiado</label><br>
                                <input type="radio" id="denuncia2" name="denuncia" value="Comentarios spam">
                                <label for="denuncia2">Comentarios spam</label><br>
                                <input type="radio" id="denuncia3" name="denuncia" value="Comentarios que incitan al odio">
                                <label for="denuncia3">Comentarios que incitan al odio</label><br>
                                <input type="radio" id="denuncia4" name="denuncia" value="Contenido engañoso">
                                <label for="denuncia4">Contenido engañoso</label><br>
                                <input type="radio" id="denuncia5" name="denuncia" value="Contenido peligroso">
                                <label for="denuncia5">Contenido peligroso</label><br>
                            
                            
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Reportar</button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
        </div>
            <div class="row py-4" id="cuadro-texto-comentario">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div style="float: left; width:15%">
                        <img src="../img/assets/subasta_1.jpg" alt="Avatar" class="imagen-avatar rounded-circle">
                    </div>
                    <div id="cuadro-texto-input" style="float: right;">

                        <div class="ajustar-label-1">
                            <a href="#" class="nombre-url">{{ Auth::user()->usuario }}</a>
                            <div id="contadorCaracteres">400/0 letras</div>

                        </div>

                        @if (Auth::user()->userProductoCompradorDestacado->count() >= 2)
                            <div class="ajustar-label-2">
                                <label class="etiqueta-destacado">Subastador<br>destacada</label>
                            </div>
                        @endif







                        <div class="row py-2 evitar-float">
                            <div class="col-md-12 color-input">
                                <form method="POST" id="form-comentar">
                                    <textarea class="comentario-now-text autoExpand" id="input-text-area-id"
                                        name="comentarioNow" placeholder="Inserte su comentario" required></textarea>
                                    <input type="hidden" value="{{ $idPerfil }}" name="idUserPerfil" id="hidden-id-user">
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label
                                    class="ajustar-label-1 label-2-new">{{ Auth::user()->userProductoSubastaGanada->count() }}<br>
                                    subastas<br> ganadas</label>
                                <label
                                    class="ajustar-label-1 label-2-new">{{ Auth::user()->userProductoSubastaIniciada->count() }}<br>
                                    subastas<br> iniciadas</label>
                                <button type="button" id="comentar-button"
                                    class="btn ajustar-label-2 boton-color div-disabled">Comentar</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-1"></div>

            </div>
        @endguest



        <h4 class="text-center comt-titulo-1">Comentarios mas gustados</h4>

        @if ($comentariosGustado_s->count() > 0)
            @foreach ($comentariosGustado_s as $comentariosGustado)
                <div class="row py-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-9">
                        <div style="float: left; width:15%">
                            <img src="../img/assets/subasta_1.jpg" alt="Avatar" class="imagen-avatar rounded-circle">
                        </div>
                        <div class="comentario-salida" style="float: right;width:85%">

                            <div class="ajustar-label-1">
                                <a href="#"
                                    class="nombre-url">{{ $comentariosGustado->comentUserPerteneciente->usuario }}</a>
                                <label class="">
                                    @php
                                    echo \Carbon\Carbon::parse($comentariosGustado->created_at)->diffForHumans();   
                                    @endphp
                                </label>
                            </div>
                            @if ($comentariosGustado->comentUserPerteneciente->userProductoCompradorDestacado->count() >= 2)
                                <div class="ajustar-label-2">
                                    <label class="etiqueta-destacado">Subastador<br>destacada</label>
                                </div>
                            @endif




                            <div class="row comentario-contenido">
                                <div class="col-md-12">

                                    <div disabled class="texto-result-comment autoExpand" style="width: 100%">
                                        {{ $comentariosGustado->com_texto }}
                                    </div>


                                </div>
                            </div>

                            <hr class="linea-separadora-centro-abajo">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn active ajustar-label-1 icon-button-like"><i class="fa fa-thumbs-o-up"></i>
                                        {{ $comentariosGustado->com_like }}</a>
                                    <label class="btn ajustar-label-1 icon-button-like"><i class="fa fa-thumbs-o-down"></i>
                                        {{ $comentariosGustado->com_dislike }}</label>
                                    <label
                                        class="ajustar-label-1 label-2-new">{{ $comentariosGustado->comentUserPerteneciente->userProductoSubastaGanada->count() }}<br>
                                        subastas<br> ganadas</label>
                                    <label
                                        class="ajustar-label-1 label-2-new">{{ $comentariosGustado->comentUserPerteneciente->userProductoSubastaIniciada->count() }}<br>
                                        subastas<br> iniciadas</label>
                                    @guest

                                    @else
                                        @if (Auth::user()->id == $comentariosGustado->comentUserPerteneciente->id)
                                            <button type="button" class="btn ajustar-label-2 boton-color-2" disabled>Editar</button>
                                        @endif
                                    @endguest

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-1"></div>

                </div>
            @endforeach

        @else
            <h5 class="text-center comt-titulo-1">No se encontraron comentarios</h4>

        @endif
        <!--Comentarios recientes-->
        <h4 class="text-center comt-titulo-1">Comentarios mas recientes</h4>

        <div id="comentarios-recientes-partial">
            @include('usuarioOpc.partialsUser.comentarioReci')
        </div>
    </main>

    {{-- Configuracion de ayuda --}}
    @auth
        @php
            $ayudaRuta = Auth::user()->userHelp->help_comentariosPerfil;
            $urlPagina = "deleteOneHelpCommentPefil";
        @endphp
    @endauth
    @include('includes/PopupHelp/CommentHelpPopupHtml')

    {{-- Fin configuracion de ayuda --}}

@endsection
@section('contenidoJSabajo')

    {{-- Script de ayuda popup --}}
    @include('includes/PopupHelp/jsHelpPopupScript')    
    {{-- Fin --}}

    <script src="../js/vue.js"></script>
    <script src="../js/axios.js"></script>
    <script src="../js/jsComentario.js"></script>
    <!-- Colocar js abajo-->
    @if ($usuarioPerfil->userReportUser->count() >= 30)
    <script>  
        $(function(){
            $('#staticBackdrop').modal({
                backdrop:'static',
            });
        });
    </script>
    @endif
@endsection
