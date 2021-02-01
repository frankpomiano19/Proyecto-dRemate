@extends('layouts.app')



@section('share-content')
    <meta property="og:url" content="http://dremate.herokuapp.com/producto-{{ $prod->id }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $prod->nombre_producto }}" />
    <meta property="og:description" content="{{ $prod->descripcion }}" />
    <meta property="og:image" content="{{ $prod->image_name1 }}" />
@endsection



@section('cont_cabe')
    <title>Product - dRemate</title>

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
    <link rel="stylesheet" href="css/styleProduct.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        
@endsection


@section('contenido')
{{-- Configuracion de variables --}}
@php

  \Carbon\Carbon::setLocale('es');  
@endphp
{{-- Fin  --}}
  <!-- Modal de usuario bloqueado-->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">El producto {{$prod->nombre_producto}} ha sido bloqueado</h5>
           
        </div>
        <div class="modal-body">
          El producto del usuario {{$prod->productoUserPropietario->usuario}} ha sido bloqueado. Este usuario ha sido reportado por infringir las normas de la página. Le recomendamos volver a Subasta Rápida.
        </div>
        <div class="modal-footer">
          
          <a class="btn btn-success" href="{{ route('subastaRapida') }}" role="button">Subasta Rápida</a>
        </div>
      </div>
    </div>
  </div>
    
<!-- Modal de bloqueo de producto-->
<div class="modal fade" id="BloqueoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usted no puede ofertar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        El propietario de la subasta le ha impedido ofertar este producto. Puede volver a Subasta Rápida.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-success" href="{{ route('subastaRapida') }}" role="button">Subasta Rápida</a>
      </div>
    </div>
  </div>
</div>

  {{-- <h2 style="display: none">Saldo disponible: S/.{{auth()->user()->us_din}}.00 </h2> --}}
 

{{-- Informacion del producto --}}
<div class="container-lg" style="margin-top: 20px;">
  <div class="row">
      <div class="panel-sup col-lg-8 col-md-7 col-12">
          <div id="panel-1" class="panel">
              <div style="width: 80%; float: left;">
                  <h6>Categorías > <a href="{{ route($cat->nombre_categoria) }}"> {{$cat->nombre_categoria}}</a></h6>
                  <h3>{{ $prod->nombre_producto }}</h3>
              </div>
              <div id="iconos" style="float: right; bottom: auto;">
                  {{-- <i class="fa fa-share"></i> <i class="fas fa-heart"></i> --}}
                  @auth
                  <form method="POST" enctype="multipart/form-data" action="{{ route('producto.favorito') }}">
                    {{ csrf_field() }}
                    @csrf
                    <input type="hidden" name="favorito" value={{ $prod->id }}>
            
                      @foreach ($favoritos as $fav)
            
                        @if ($fav == $prod->id)
                          <?php
                            $favoritoL = 1;
                          ?>
                          @break
                        @else
                          <?php
                            $favoritoL = 0;
                          ?>
                        @endif
            
                      @endforeach
            
                      @if($favoritoL == 1)
                                                                
                        <button type="submit" class="btn"><img src="{{asset('img/assets/corazonroto.png')}}"></button>
                        
                      @else
                        <button type="submit" class="btn"><img src="{{asset('img/assets/corazon.png')}}"></button>
                      @endif      
                      
                    </form>
                  
                  @else
                  <a href=" {{ url('login') }}  "><img src="{{asset('img/assets/corazon.png')}}"></a>
                  @endauth
                    <!-- Your share button code -->
                    <div style="display: inline" class="fb-share-button" 
                    data-href="http://dremate.herokuapp.com/producto-{{ $prod->id }}" 
                    data-layout="button" data-size="small">
                    </div>

                    <a class="btn btn-social-icon btn-sm btn-twitter" href="https://twitter.com/intent/tweet?text={{ $prod->descripcion }}&url=http://dremate.herokuapp.com/producto-{{ $prod->id }}&hashtags={{ $prod->nombre_producto }},dRemate">
                      <span class="fa fa-twitter"></span>
                    </a>
              </div>

  

                
              <!-- Swiper -->
              <div style="height: 500px; width: 100%; background-color: black; clear: both;">
                  <div class="swiper-container gallery-top">
                      <div class="swiper-wrapper">
                          <div class="swiper-slide flex"><img src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name1 }} @endif" alt="" class="img-ajustada"></div>
                          <div class="swiper-slide flex"><img src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name2 }} @endif" alt="" class="img-ajustada"></div>
                          <div class="swiper-slide flex"><img src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name3 }} @endif" alt="" class="img-ajustada"></div>
                          <div class="swiper-slide flex"><img src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name4 }} @endif" alt="" class="img-ajustada"></div>
                      </div>
                      <div class="swiper-button-next swiper-button-white"></div>
                      <div class="swiper-button-prev swiper-button-white"></div>
                  </div>
                  <div class="swiper-container gallery-thumbs">
                      <div class="swiper-wrapper">
                          <div class="swiper-slide" style="background-image:url(@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name1 }} @endif)"></div>
                          <div class="swiper-slide" style="background-image:url(@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name2 }} @endif)"></div>
                          <div class="swiper-slide" style="background-image:url(@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name3 }} @endif)"></div>
                          <div class="swiper-slide" style="background-image:url(@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name4 }} @endif)"></div>
                      </div>
                  </div>
              </div>
              <div id="vendedor">
                  Ofrecido por <span><a href="{{ route('comentarios-now', $prod->productoUserPropietario->id) }}">{{ $prod->productoUserPropietario->usuario }}</a></span>
              </div>
          </div>
      </div>
      {{-- Fin informacion del producto --}}
















      {{-- Puja --}}
      <div class="panel-sup col-lg-4 col-md-5 col-12" id="info-prod" style="padding-top: 0px;">
          <div id="panel-2" class="panel" style="padding: 40px;">


            {{-- Historial de pujas --}}
            <div class="tablas_pujas">

              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <td colspan="2">ULTIMAS PUJAS</td>
                  </tr>
                  <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Puja</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pujastotales as $puja)
                  @if ($puja->producto_id==$prod->id)
                  <tr>
                    <td>{{$usuarios[($puja->user_id)-1]->usuario}}</td>
                    <td>S/.{{$puja->valor_puja}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
  
            </div>
  
            {{-- Fin historial de pujas --}}
            
              <div class="separador"></div>



            {{-- En caso de no haber iniciado --}}
            <div class="comienzosubasta" id="presubasta">

              <div>
                  <h6>Precio inicial</h6>
                  <h1 class="text-center">S/<span>{{$prod->precio_inicial}}</span></h1>
                  <h6 class="text-right"><small>Ver historial de pujas</small></h6>
              </div>
              <div class="separador"></div>


              <div>
                <h6>Subasta inicia en</h6>
                <h1 class="text-center"><div id="comienzosubasta" style="font-size: 20px"></div></h1>
              </div>  
            </div>
            <div class="finalsubasta" id="finalsubasta">

              <h6>La subasta ha finalizado</h6>
            </div>
            <div class="ganador" id="ganador">
              @if ($ultimapuja === null)
                <h1 class="text-center"><span>No hay ganadores</span></h1>
              @else
                <h6>Ganador es</h6>
                <h1 class="text-center"><span>{{$usuarios[($ultimapuja->user_id) - 1]->usuario}}</span></h1>
              @endif
            </div>

          {{--Fin en caso de no haber iniciado --}}


            <div id="botonpuja">
              <div class="tiempo_producto"  id="tiemposubasta">                
                <div>
                    <h6>Oferta más alta</h6>
                    <h1 class="text-center">S/<span>{{$ultimoprecio}}</span></h1>
                    <h6 class="text-right"><small>Ver historial de pujas</small></h6>
                </div>
                <div class="separador" style="width: 100%"></div>

                <div>
                  <h6>Tiempo restante</h6>
                  <h1 class="text-center"><div id="tiempopuja" style="font-size: 20px"></div></h1>

                  <h6 class="text-right"><small>La subasta finaliza el {{ $prod->final_subasta }}</small></h6>
                </div>
                <div class="separador"></div>

              </div>
              
              <div>
                  <h6>Realizar una oferta</h6>                  
                  <div class="flex cont-coin" style="width: 100%;">
                      <div class="flex cont-coin">
                          <img class="coin" id="coin-5" src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name1 }} @endif" alt="coin-5">
                      </div>
                      <div class="flex cont-coin">
                          <img class="coin" id="coin-20" src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name2 }} @endif" alt="coin-20">
                      </div>
                      <div class="flex cont-coin">
                          <img class="coin" id="coin-100" src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name3 }} @endif" alt="coin-100">
                      </div>
                  </div>
              </div>

                  <form action=" {{route('puja.crear')}} " method="POST">
                    @csrf  
                    <div class="flex" class="cant_puja" id="cantpuja">
                      @auth
                      
                        @if ($prodbloq == true)
                            <span style="font-size: 1.8rem;">S/</span>
                            <input type="number" name="valorpuja"  class="message-input" style="width: 100%; font-size: 1.8rem; ">

                        @else
                            No puede ofertar este producto.
                        @endif
                      

                      @else
                      Necesitar estar <a href="{{ url('login') }}">&nbsp; autenticado</a>                   
                      @endauth
                    </div>

                        @error('valorpuja')
                        <div class="alert alert-danger" style="font-size:0.9em" role="alert">
                          Valor no aceptado o insuficiente
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @enderror
                    @error('saldousuario')
                        <div class="alert alert-danger" style="font-size:0.9em" role="alert">
                          Saldo insuficiente
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @enderror

                      <small>Min. oferta: S/{{$ultimoprecio +1}}.00</small><br>
    
                      @auth
                      <!-- id del producto, es invisible para que no se vea mal el cuadro y saque el id del producto para crar la puja --> 
                      <input type="number" id="productoid" name="productoid" style="display: none" value="{{$prod->id}}" readonly><br>
                      <input type="number" id="ultimoprecio" name="ultimoprecio" style="display: none" value="{{$ultimoprecio}}" readonly>
                      <input type="number" id="saldousuario" name="saldousuario" style="display: none" value="{{auth()->user()->us_din}}" readonly>
                      <input type="number" id="idganador" name="idganador" style="display: none" value="{{auth()->user()->id}}" readonly>
                        @if ($prodbloq == true)
                          <div class="flex">
                            <button class="boton_puja my-2" id="botonpuja2">Ofertar</button>
                          </div>
                        @endif
                      
                      @endauth

                      
                      <div class="boton_compra my-2" style="display: none" id="boton_compra">
                        <h5>Compra rápida: S/.{{$prod->precio_inicial}}</h5>
                        <button type="button" class="btn btn-outline-primary">Compra</button>
                      </div>
                  </form>
              <div class="separador"></div>

            </div>

            </div>
      </div>
      {{-- Fin Puja --}}

      {{-- Informacion --}}
      <div class="panel-sup col-md-8 col-sm-12">
          <div id="panel-3" class="panel" style="min-height: 500px;">
              <ul class="tabs" role="tablist">
                  <li>
                      <input type="radio" name="tabs" id="tab1" checked />
                      <label for="tab1" role="tab" aria-selected="true" aria-controls="panel1" tabindex="0">Descripción</label>
                      <div id="tab-content1" class="tab-content" role="tabpanel" aria-labelledby="description" aria-hidden="false">
                          <p>{{$prod->descripcion}}
                          </p>
                      </div>
                  </li>


                  {{-- <li>
                      <input type="radio" name="tabs" id="tab2" />
                      <label for="tab2" role="tab" aria-selected="false" aria-controls="panel2" tabindex="0">Opiniones</label>
                      <div id="tab-content2" class="tab-content" role="tabpanel" aria-labelledby="comentarios" aria-hidden="true">
                          <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
                              enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                              consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                              nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla?</p>
                      </div>
                  </li> --}}

                  <li>
                      <input type="radio" name="tabs" id="tab3" />
                      <label for="tab3" role="tab" aria-selected="false" aria-controls="panel3" tabindex="0">Garantía</label>
                      <div id="tab-content3" class="tab-content" role="tabpanel" aria-labelledby="specification" aria-hidden="false">
                          <p>{{$prod->garantia}}</p>
                      </div>
                  </li>
                  <div style="clear: both;"></div>
              </ul>


              <br>
          </div>
      </div>
      {{-- Fin informacion --}}
      {{-- Ubicacion --}}
      <div class="panel-sup col-md-4 col-sm-12">
          <div id="panel-4" class="panel">
              <h2>Ubicación: {{$prod->ubicacion}}</h2>
              <p><b>Referencia: </b>{{$prod->distrito}} </p>
              <div id="ubicacion">
                <div id="mapa" style="height: 390px;width:23em;" ></div>
              </div>
          </div>
      </div>


  
      {{-- Fin ubicacion --}}
      <div class="panel-sup col-md-8 col-sm-12" style="min-height: 600px">
          <div id="panel-5" class="panel">
              <!-- Contenedor Principal -->
              <div class="comments-container">
                  <h1>Negociación de acuerdos</h1>


                  <ul id="comments-list" class="comments-list">
                    {{-- Inicio de comentario respuesta y preguntas --}}
                    @if($commentUsers->count()<=0)
                    <h2>No hay ninguna pregunta. Se el primero</h2>
                    @endif
                    @foreach($commentUsers as $commentUser)

                      <li>
                          <div class="comment-main-level">
                              <div class="wrapright">
                                  <div class="right">
                                      <!-- Contenedor del Comentario -->
                                      <div class="comment-box">
                                          <div class="comment-head">
                                              <h6 class="comment-name @if($commentUser->menSubUserEmisor->id==$prod->user_id ) by-author @else @endif "><a href="{{ route('comentarios-now', $commentUser->menSubUserEmisor->id) }}">{{ $commentUser->menSubUserEmisor->usuario }}</a></h6>
                                            {{-- Fecha --}}
                                              <span>
                                                @php
                                                 echo \Carbon\Carbon::parse($commentUser->created_at)->diffForHumans();   
                                                 @endphp
                                              </span>
                                              {{-- <i class="fa fa-reply"></i>
                                              <i class="fa fa-heart"></i> --}}
                                          </div>
                                          <div class="comment-content">
                                            {{ $commentUser->men_sub_mensaje }}
                                          </div>
                                          <small id="show-responder">Responder</small>
                                          {{-- Formulario de responser --}}



                                          <br>
                                          <div>
                                              {{-- <div id="rpta-nivel-2" style="clear: right; border: none;" class="hide"> --}}
                                              <div style="clear: right; border: none;" >
                                                <form action="{{ route('sendCommentResponse') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="idComentarioR" value="{{ $commentUser->id }}">

                                                      <div style="float:left; width:100%; height: 38px;">
                                                          <div class="flex" style="margin-right: 90px;height: 38px; padding: 0 10px;">
                                                              <input type="text" name="textComentarioR" class="message-input form__field" style="width: 100%; " placeholder="Escribe un mensaje...">
                
                                                          </div>
                                                          {{-- Error en entrada respuesta --}}
                                                          @if($errors->responseFormError->any())
                                                          <div>
                                                            <ul>
                                                              @foreach($errors->responseFormError->all() as $error)
                                                                <li class="text-danger">{{ $error }}</li>
                                                              @endforeach
                                                            </ul>
                                                          </div>
                                                        @endif
                                                        {{-- Fin --}}
    
                                                      </div>

                                                      <br>
                                                      <div class="flex" style="float: right; width: 80px; margin-left: -80px; height: 38px;">
                                                          <button class="enviar-mensaje" type="submit">Enviar</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                          {{--Fin  Formulario de responser --}}


                                      </div>
                                  </div>
                              </div>
                              <div class="left">
                                  <!-- Avatar -->
                                  <div class="comment-avatar" style="float: ;"><img src="@if($commentUser->menSubUserEmisor->id==$prod->user_id ) {{ asset('img/assets/usuarioOP.png') }} @else {{ asset('img/assets/usuarioAnonimo.png') }} @endif" alt=""></div>

                              </div>
                          </div>
                          <!-- Respuestas de los comentarios -->
                          <ul class="comments-list reply-list">

                            @foreach ($commentUser->menSubRespuesta as $respuesta)  
                              <li>
                                  <div class="wrapright">
                                      <div class="right">
                                          <!-- Contenedor del Comentario -->
                                          <div class="comment-box">
                                              <div class="comment-head">
                                                  <h6 class="comment-name @if($respuesta->us_response==$prod->user_id ) by-author @else @endif"><a href="#">{{ $respuesta->menSubRespUserResponse->usuario }}</a></h6>
                                                  <span>
                                                    @php
                                                    echo \Carbon\Carbon::parse($respuesta->created_at)->diffForHumans();   
                                                    @endphp
                                                    </span>
                                                  {{-- <i class="fa fa-reply"></i>
                                                  <i class="fa fa-heart"></i> --}}
                                              </div>
                                              <div class="comment-content">
                                                {{ $respuesta->mensub_resp_texto }}
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="left">
                                      <!-- Avatar -->
                                      <div class="comment-avatar"><img src=" @if($respuesta->us_response==$prod->user_id ) {{ asset('img/assets/usuarioOP.png') }} @else {{ asset('img/assets/usuarioAnonimo.png') }} @endif " alt=""></div>

                                  </div>
                              </li>
                              @endforeach
                          </ul>
                      </li>
                      @endforeach
                      {{ $commentUsers->links() }}

                      {{-- Fin modelo comentario y respuesta --}}





                  </ul>
                  <div style="width: 100%;" class="flex">
                      <div class="contenedor-mensaje">
                          <form action="{{ route('enviarMensaje') }}" method="POST">
                            @csrf
                            <div style="float:left; width:100%; height: 48px;">
                                  <div class="flex" style="margin-right: 90px;height: 48px; padding: 0 10px;">
                                      <input type="text" name="mensajeEnviado" class="message-input form__field" style="width: 100%; " placeholder="Hacer una pregunta...">
                                      <input type="hidden" name="idProducto" value="{{ $prod->id }}">
            

                                  </div>
                                  @if($errors->commentFormError->any())
                                  <div>
                                    <ul>
                                      @foreach($errors->commentFormError->all() as $error)
                                        <li class="text-danger" >{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                  </div>
                                @endif

                              </div>
                              <div class="flex" style="float: right; width: 80px; margin-left: -80px; height: 48px;">
                                  <button class="enviar-mensaje">Enviar</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="panel-sup col-md-4 col-sm-12">
          <div id="panel-6" class="panel">
              <h2>Acuerdos Fijados</h2><br><br><br>

            @auth
              @if (auth()->user()->id == $prod->user_id)
              <h4 style="font-size: 10px" class="text-center text-danger">* Solo se permite 6 acuerdos maximo, no podra ser editado ni eliminado</h4>

              <div class="acuerdo flex" id="nuevo-acuerdo">
                     @if ($prod->productoAgreement->count()<6)
                     <span id="texto-nuevo-acuerdo">Agregar un acuerdo</span>
                     <form action="{{ route('setAgreement') }}" style="display: none;" id="inputAcuerdo" method="POST">
                      @csrf
                     <div class="row justify-content-center">
                      <button type="submit"><i class="fa fa-plus-square" aria-hidden="true">&nbsp; <strong>Agregar</strong></i></button>
                        <br>
                        <textarea name="agreementUser" class="auto-expand" id=""  placeholder="Insertar el acuerdo"></textarea>
                        <input type="hidden" name="idProductoNow" value="{{ $prod->id }}">
                        @if($errors->agreementError->any())
                          <div>
                            <ul>
                              @foreach($errors->agreementError->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                        @endif
              
              
                      </div>        
                    </form>
                         
                     @else
                       <div class="row justify-content-center">
                        <h4 style="font-size: 18px" class="text-center text-danger">YA LLEGASTE AL LIMITE DE ACUERDOS</h4>
                       </div>        
              
                     @endif 
              
              </div>
              @else
              @endif
            @else
            @endauth







              {{-- Muestra si no hay acuerdos establecidos --}}
              @if ($prod->productoAgreement->count()!=null)
              @else
                @if (auth()->user()!=null)
                    @if (auth()->user()->id == $prod->user_id)
                        
                    @endif
                @else
                <h4 class="text-muted text-center text-danger">Ningun acuerdo establecido</h4>                      
                @endif
                  
              @endif
              {{-- Fin ---------- --}}



              @foreach ($prod->productoAgreement as $agreement)
                <div class="acuerdo flex">
                  &quot{{ $agreement->agre_message }}&quot
                </div>

              @endforeach
          </div>
      </div>
      
        <!--Contenedor de productos relacionados-->

      <div class="panel-sup col-12 ">
          <div id="panel-7 " class="panel " style="width: 100%; padding: 0 30px; overflow: hidden; ">
              <h2>Ofertas destacadas</h2>
              <div class="row">
                @foreach ($productosRelac as $prodRelac)
                  <div style="padding: 10px;">
                      <div class="card" style="width: 14rem; margin: 10px;">
                          <a href="#"><img class="card-img-top" src="@if($prodRelac->imagen!=null){{ $prodRelac->imagen }} @else {{ $prodRelac->image_name1 }} @endif" alt="coin02.png"></a>

                          <div class="card-body">
                              <a href="{{ route('producto.detalles', $prodRelac->id) }}">
                                  <h5 class="card-title">{{$prodRelac->nombre_producto}}</h5>
                              </a>
                              <p class="card-text">{{ $prodRelac->descripcion }}</p>
                              <small>{{$prodRelac->distrito}}, {{$prodRelac->ubicacion}}</small>
                          </div>
                      </div>
                  </div>
                  @endforeach

              </div>

              <!-- 
              <div class="row ">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 400px; padding: 10px; background-color: blue; border: blueviolet solid 2px; ">
                      <div class="carta">
                          <div class="cont-cart-img ">
                              <img class="img-ajustada " src="coin02.png" alt="coin02.png">
                          </div>

                      </div>
                      <div>
                          Título y otras cosas
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 180px; background-color: blue; border: blueviolet solid 2px; ">
                      <div class="card" style="width: 18rem;">
                          <img class="card-img-top" src="coin02.png" alt="coin02.png">
                          <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 180px; background-color: blue; border: blueviolet solid 2px; ">nlnln</div>
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 180px; background-color: blue; border: blueviolet solid 2px; ">nlnln</div>
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 180px; background-color: blue; border: blueviolet solid 2px; ">nlnln</div>
                  <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="coin02.png" alt="coin02.png">
                      <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                  </div>
                  <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="coin02.png" alt="coin02.png">
                      <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                  </div>
                  <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="coin02.png" alt="coin02.png">
                      <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                  </div>
                  <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="coin02.png" alt="coin02.png">
                      <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                  </div>
              </div> -->

          </div>
      </div>
        <!--Fin de productos relacionados-->

  </div>
  <br><br><br><br>

</div>




{{-- Fin nuevo Diseño --}}
  
@endsection

@section('contenidoJSabajo')
  <script src="js/simplyCountdown.min.js"></script>
  <!-- 
  <script src="js/countdown.js"></script>
  -->
  <script>
    simplyCountdown('#tiempopuja', {

    year: {{$limitepuja->year}}, // required
    month: {{$limitepuja->month}}, // required
    day: {{$limitepuja->day}}, // required
    hours: {{$limitepuja->hour}}, // Default is 0 [0-23] integer
    minutes: {{$limitepuja->minute}}, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: 'Día',
        hours: 'Hora',
        minutes: 'Minuto',
        seconds: 'Segundo',
        pluralLetter: 's'
    },
    plural: true, //use plurals
    inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
    inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
    // in case of inline set to false
    enableUtc: false, //Use UTC as default
    onEnd: function() {
        alert("La subasta ha finalizado");
        document.getElementById('botonpuja').classList.add('oculta');
        document.getElementById('cantpuja').classList.add('oculta');
        document.getElementById('finalsubasta').classList.add('revelado');
        document.getElementById('ganador').classList.add('revelado');

         return; }, //Callback on countdown end, put your own function here
    refresh: 1000, // default refresh every 1s
    sectionClass: 'simply-section', //section css class
    amountClass: 'simply-amount', // amount css class
    wordClass: 'simply-word', // word css class
    zeroPad: false,
    countUp: false
});
  </script>
  <script>
    simplyCountdown('#comienzosubasta', {

    year: {{$iniciosubasta->year}}, // required
    month: {{$iniciosubasta->month}}, // required
    day: {{$iniciosubasta->day}}, // required
    hours: {{$iniciosubasta->hour}}, // Default is 0 [0-23] integer
    minutes: {{$iniciosubasta->minute}}, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: 'Día',
        hours: 'Hora',
        minutes: 'Minuto',
        seconds: 'Segundo',
        pluralLetter: 's'
    },
    plural: true, //use plurals
    inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
    inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
    // in case of inline set to false
    enableUtc: false, //Use UTC as default
    onEnd: function() {
        document.getElementById('tiemposubasta').classList.add('revelado');
        document.getElementById('cantpuja').classList.add('revelado');
        document.getElementById('botonpuja').classList.add('revelado');
        document.getElementById('presubasta').classList.add('oculta');
         return; }, //Callback on countdown end, put your own function here
    refresh: 1000, // default refresh every 1s
    sectionClass: 'simply-section', //section css class
    amountClass: 'simply-amount', // amount css class
    wordClass: 'simply-word', // word css class
    zeroPad: false,
    countUp: false
});
  </script>

  <script>
    var mymap = L.map('mapa').setView([{{$prod->latitud}},{{$prod->longitud}}], 15);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlzdGljYWx0dXJ0bGUiLCJhIjoiY2tpeHVnajEyMHI4ODJxbXk0MHk2dW41biJ9.3j9sAGykKUhTh5pN81XD9w', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);
    L.marker([{{$prod->latitud}},{{$prod->longitud}}]).addTo(mymap);
    
</script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
spaceBetween: 10,
slidesPerView: 4,
loop: true,
freeMode: true,
loopedSlides: 5, //looped slides should be the same
watchSlidesVisibility: true,
watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
spaceBetween: 10,
loop: true,
loopedSlides: 5, //looped slides should be the same
navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
},
thumbs: {
    swiper: galleryThumbs,
},
});

$(document).on('dragstart', 'img', function(evt) {
evt.preventDefault();
});
$(document).ready(function() {
$("#nuevo-acuerdo").click(function() {
    $('#texto-nuevo-acuerdo').hide(1);
    $('#inputAcuerdo').show(1);

});
$("#show-responder").click(function() {
    $("#rpta-nivel-2").toggleClass("hide");

});

});
</script>
{{-- Comentario javascript --}}



@if ($prod->productoUserPropietario->userReportUser->count() >= 30)
<script>  
    $(function(){
        $('#staticBackdrop').modal({
            backdrop:'static',
        });
    });
</script>

{{-- Nuevo diseño --}}

<script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
spaceBetween: 10,
slidesPerView: 4,
loop: true,
freeMode: true,
loopedSlides: 5, //looped slides should be the same
watchSlidesVisibility: true,
watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
spaceBetween: 10,
loop: true,
loopedSlides: 5, //looped slides should be the same
navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
},
thumbs: {
    swiper: galleryThumbs,
},
});

$(document).on('dragstart', 'img', function(evt) {
evt.preventDefault();
});
$(document).ready(function() {
$("#nuevo-acuerdo").click(function() {
    $('#texto-nuevo-acuerdo').hide(1);
    $('#inputAcuerdo').show(1);

});
$("#show-responder").click(function() {
    $("#rpta-nivel-2").toggleClass("hide");

});

});
</script>

@endif
<script>
  moment.locale('es'); 
  console.log(moment("20111031", "YYYYMMDD").fromNow());
  
</script>

@auth
    @if ($prodbloq == false)
    <script>  
      $(function(){
          $('#BloqueoModal').modal({
              backdrop:'static',
          });
      });
    </script>
    @endif
@endauth


    <!-- Colocar js abajo-->
@endsection
