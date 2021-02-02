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
{{-- @php --}}

  @if($muestra == 1)
  <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3>¡Producto enviado a subasta!</h3>
            </div>
            <div class="modal-body">
                <h5>Datos Actualizados:</h5>
                <b>Nombre producto:</b> {{$prod->nombre_producto}}<br>
                <b>Inicio Subasta:</b> {{$prod->inicio_subasta}}<br>
                <b>Final Subasta:</b> {{$prod->final_subasta}}<br>
                <b>Precio inicial:</b> {{$prod->precio_inicial}}
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-success">Aceptar</a>
            </div>
        </div>
    </div>
  </div>
  @else
  <p></p>
  @endif    


  <div class="product">
    <br><br>
    <!--Contenedor de productos relacionados-->
    <div class ="container1">
        <div class="row">
          @foreach ($productosRelac as $prodRelac)
          <div class="col-md">
                <div class="card">
                    <img class="card-img-top" src="@if($prodRelac->imagen!=null){{ $prodRelac->imagen }} @else {{ $prodRelac->image_name1 }} @endif" alt="Card image cap">
                    <a href="{{ route('producto.detalles', $prodRelac->id) }}"><div class="card-body text-center">
                    <h5 class="card-title"> {{$prodRelac->nombre_producto}} </h5>
                    <p class="card-text"><small class="text">Last updated {{Carbon\Carbon::now()->diffForHumans($prodRelac->updated_at)}} </small></p>
                    </div></a>
                </div>
            </div>
            @endforeach

      </div>
    </div>
    // <!--fin del Contenedor de productos relacionados-->
  <br>
  // <!-- Información del producto -->
  <div class="container2">
    <h5 class="categories-product"><a href="#">Categorias</a>  > <a href="#">{{$cat->nombre_categoria}}</a></h5>
    <div class="row">

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
            <input type="hidden" name="fav" value="0">                       
            <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Quitar de favorito"><img src="{{asset('img/assets/corazon.png')}}"></button>
            
          @else
            <input type="hidden" name="fav" value="1">   
            <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Agregar como favorito"><img src="{{asset('img/assets/corazonR.png')}}"></button>
          @endif      
          
        </form>
  {{-- \Carbon\Carbon::setLocale('es');
@endphp --}}

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

 

{{-- Informacion del producto --}}
<div class="container-lg" style="margin-top: 40px;">
  <div class="row">
      <div class="panel-sup col-lg-8 col-md-7 col-12">
          <div id="panel-1" class="panel">
            <div style="width: 100%;">
              <div style="width: 100%; float:left;">
                <div style="margin-right: 160px;">
                  <h6>Categorías > <a href="{{ route($cat->nombre_categoria) }}"> {{$cat->nombre_categoria}}</a></h6>
                  <h3>{{ $prod->nombre_producto }}</h3>
                </div>
              </div>
              <div style="width: 155px; float:left; margin-left:-155px;">
                <div id="cora" style="width: 40px; height: 40px; float:right;" class="flex">
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
                                                                
                        <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Quitar de favorito"><div id="heart-icon-active"></div></button>
                        
                      @else
                        <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Agregar como favorito"><div id="heart-icon-noActive"></div></button>
                      @endif      
                      
                    </form>
                  
                  @else
                  <a href=" {{ url('login') }}  "><img src="{{asset('img/assets/corazon.png')}}"></a>
                  @endauth
                   
                </div>


                <div style="float: right; margin-right: 3px; height: 40px; width: 70px;">
                  <div style="float:right; height: 40px; width: 35px" class="flex">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=dremate.herokuapp.com/producto-{{ $prod->id }}" onclick="newWindow(this.href, 'popup', 800, 750, 1, 1, 0, 0, 0, 1, 0); return false;" target="_blank" class="flex">
                      <div id="face-icon"></div>
                    </a>
                  </div>
  
                  <div style="float:right; height: 40px; width: 35px" class="flex">
                    <a href="https://twitter.com/intent/tweet?text={{ $prod->descripcion }}&url=http://dremate.herokuapp.com/producto-{{ $prod->id }}&hashtags={{ $prod->nombre_producto }},dRemate" onclick="newWindow(this.href, 'popup', 800, 750, 1, 1, 0, 0, 0, 1, 0); return false;" target="_blank" class="flex">
                      <div id="tuit-icon"></div>
                    </a>
                  </div>
                  <div style="clear: both;"></div>
                </div> 
                
                <div style="float: right; height: 40px; width: 40px;" class="flex">
                  <div id="share" data-toggle="modal"></div>
              </div>               
              </div>
              <div style="clear: both"></div>
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

      <div class="panel-sup col-lg-4 col-md-5 col-12" id="info-prod" style="padding-top: 0px;">
          <div id="panel-2" class="panel" style="padding: 40px;">


            {{-- Historial de pujas --}}
            <div id="cont-hitorial-pujas" class="hide">
              <div id="regresar"><small class="ver-historial">Regresar</small></div>
              <div id="tablas_pujas">
                <table class="table table-sm table-bordered">
                  <thead>
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
            </div>
            
  
            {{-- Fin historial de pujas --}}
            

            {{-- En caso de no haber iniciado --}}
            <div class="comienzosubasta" id="presubasta">

              <div>
                  <h6>Precio inicial</h6>
                  <h1 class="text-center">S/<span>{{$prod->precio_inicial}}</span></h1>
                  {{-- <div class="historialClick"><h6 class="text-right"><small class="ver-historial">Ver historial de pujas</small></h6></div> --}}
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
                <div style="width: 100%;">
                    <h6>Oferta más alta</h6>
                    <h1 class="text-center">S/<span>{{$ultimoprecio}}</span></h1>
                  <div class="historialClick">
                    <h6 class="text-right"><small class="ver-historial">Ver historial de pujas</small></h6>
                  </div>
                </div>
                <div>
                  <h6>Tiempo restante</h6>
                  <h1 class="text-center"><div id="tiempopuja" style="font-size: 20px"></div></h1>

                  <h6 class="text-right"><small>La subasta finaliza el {{ $prod->final_subasta }}</small></h6>
                </div>
                <div class="separador"></div>

              </div>
              
              <div style="width: 100%">
                  <h6>Realizar una oferta</h6>                  
                  <div class="flex cont-coin" style="width: 100%;">
                      <div class="flex cont-coin">
                          <img class="coin" id="coin-5" src="img/coin/coin1.png" alt="coin-5">
                      </div>
                      <div class="flex cont-coin">
                          <img class="coin" id="coin-20" src="img/coin/coin2.png" alt="coin-20">
                      </div>
                      <div class="flex cont-coin">
                          <img class="coin" id="coin-100" src="img/coin/coin3.png" alt="coin-100">
                      </div>
                  </div>
              </div>

                  <form action=" {{route('puja.crear')}} " method="POST" autocomplete="off">
                    @csrf  
                    <div class="flex" class="cant_puja" id="cantpuja">
                      @auth
                      
                        @if ($prodbloq == true)
                            <span id="simbolo-soles" class="flex">S/</span>
                            <input type="number" name="valorpuja"  class="message-input" style="width: 100%; font-size: 1.8rem;" min="{{$ultimoprecio +1}}">

                        @else
                            No puede ofertar este producto.
                        @endif
                      

                      @else
                      <p>
                        Para hacer una oferta debes&nbsp;<a href="{{ url('login') }}">Iniciar sesión</a>, o&nbsp;<a href="{{ url('register') }}">Regístrarte</a>

                      </p>   
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
                            <i class="fa fa-question-circle-o" style="cursor: help;" aria-hidden="true" data-toggle="tooltip" data-html="true" title="Cuando ejecutes la puja, se quedara retenido en el sistema. Cuando ganes termine y ganes se te notificara">
                            </i>
                          </div>
                        @endif
                      @endauth
                      
                      <div class="boton_compra my-2" style="display: none" id="boton_compra">
                        <h5>Compra rápida: S/.{{$prod->precio_inicial}}</h5>
                        <button type="button" class="btn btn-outline-primary">Compra</button>
                      </div>
                  </form>

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
              <h2>Ubicación</h2>
              <br>
              <p style="font-weight: 600;">{{$prod->ubicacion}},&nbsp;{{$prod->distrito}} </p>
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
                    <br><h4>No hay ninguna pregunta. Sé el primero</h4><br>
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
                                      <input type="text" name="mensajeEnviado" class="message-input form__field" style="width: 100%; " autocomplete="off" placeholder="Hacer una pregunta..." required>
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
              <h2>Acuerdos Fijados &nbsp;<i class="fa fa-question-circle-o" style="cursor: help;" aria-hidden="true" data-toggle="tooltip" data-html="true" title="Acuerdos que el subastar esta dispuesto a respetar"></i></h2>

              <br><br><br>

            @auth
              @if (auth()->user()->id == $prod->user_id)
              <h4 style="font-size: 10px" class="text-center text-danger">* Solo se permite 6 acuerdos maximo, no podra ser editado ni eliminado</h4>

              <div class="acuerdo flex" id="nuevo-acuerdo">
                     @if ($prod->productoAgreement->count()<6)
                     <span id="texto-nuevo-acuerdo">Agregar un acuerdo</i> </span>
                     
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
              {{-- Fin --}}



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

          </div>
        </div>
        

  </div>
  <br><br><br><br>
  @auth
    @php
        $ayudaRuta = Auth::user()->userHelp->help_subastaPujas;
        $urlPagina = "deleteOneHelpSubPuj";
    @endphp
  @endauth
  @include('includes/PopupHelp/SubPujHelpPopupHtml')

</div>



@endsection

@section('contenidoJSabajo')

    {{-- Script de ayuda popup --}}
    @include('includes/PopupHelp/jsHelpPopupScript')    
    {{-- Fin --}}
  <script src="js/simplyCountdown.min.js"></script>
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

function newWindow(a_str_windowURL, a_str_windowName, a_int_windowWidth, a_int_windowHeight, a_bool_scrollbars, a_bool_resizable, a_bool_menubar, a_bool_toolbar, a_bool_addressbar, a_bool_statusbar, a_bool_fullscreen) {
var int_windowLeft = (screen.width - a_int_windowWidth) / 2;
var int_windowTop = (screen.height - a_int_windowHeight) / 2;
var str_windowProperties = 'height=' + a_int_windowHeight + ',width=' + a_int_windowWidth + ',top=' + int_windowTop + ',left=' + int_windowLeft + ',scrollbars=' + a_bool_scrollbars + ',resizable=' + a_bool_resizable + ',menubar=' + a_bool_menubar + ',toolbar=' + a_bool_toolbar + ',location=' + a_bool_addressbar + ',statusbar=' + a_bool_statusbar + ',fullscreen=' + a_bool_fullscreen + '';
var obj_window = window.open(a_str_windowURL, a_str_windowName, str_windowProperties)
if (parseInt(navigator.appVersion) >= 4) {
obj_window.window.focus();
}
}

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
<script>
  $(document).ready(function()
  {
     $("#mostrarmodal").modal("show");
  });
</script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>
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

$("#nuevo-acuerdo").click(function() {
    $('#texto-nuevo-acuerdo').hide(1);
    $('#inputAcuerdo').show(1);    

});
$(".historialClick").click(function() {
    $('#cont-hitorial-pujas').show(1);    
    $('#botonpuja').hide(1);    
});

$("#regresar").click(function() {
    $('#cont-hitorial-pujas').hide(1);    
    $('#botonpuja').show(1);    
});

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
