@extends('layouts.app')


@section('cont_cabe')
    <title>Informacion producto - dRemate</title>

@endsection

@section('contenidoJS')
<!-- Colocar js-->
@endsection

@section('contenidoCSS')
<link rel="stylesheet" href="{{asset('css/infoProducto.css')}}">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@endsection


@section('contenido')
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <section class="col-md-6 col-sm-6 col-lg-6 section-side">
            <div class="row col-md-12 d-flex justify-content-center" >
                <img src="{{$producto->image_name1}}" class="img-formated" alt="">
                
            </div>
            <hr class="linea-divisora-medio">
            <div class="row col-md-12 py-3">
                <p class="text-align-center" for="">Precio base de S/{{$producto->precio_inicial}}</p>
            </div>
            <div class="row col-md-12">
                <p class="text-align-center" for="">Usuario vendedor es <a href="{{ route('comentarios-now', $usuarioPerfil->id) }}">{{$usuarioPerfil->usuario}}</a></p>
            </div>
            
            <div class="row col-md-12">
                <ul style="color: red; font-size:0.8em;">
                    <li>Este producto permite ser negociado tomando como precio incial al precio base</li>
                    <li>Cuando presiones el boton "Establecer comunicacion" se le mandara una notificacion al vendedor, para ir a un chat y negociar</li>
                </ul>
            </div>
            
            <div class="row col-md-12">
            </div>
            
            <div class="row col-md-12 py-2 d-flex justify-content-around">
                @if(Auth::user()->id != $usuarioPerfil->id)
                <a class="btn btn-danger btn-rojo-comu" href="{{route('chat-real-time',$producto->id)}}">Establecer comunicacion</a>
                <button class="btn btn-primary btn-rojo-mens" data-toggle="modal" data-target="#modalMensaje" data-whatever="@mdo">Enviar mensaje al vendedor</button>
                @else
                <a class="btn btn-danger btn-rojo-comu" style="cursor: not-allowed" disabled>Establecer comunicacion</a>
                <button class="btn btn-primary btn-rojo-mens" style="cursor: not-allowed" disabled >Enviar mensaje al vendedor</button>                
                @endif
            </div>
        </section>
        <section class="col-md-6 col-sm-6 col-lg-6 section-side-2">
            <div class="row">
                <span class="badge-secondary subtitulo-now">Datos del producto</span>
            </div>
            <div class="row container">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Producto :  </label> <label>{{$producto->nombre_producto}}</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Condicion :  </label> <label>{{$producto->condicion}}</label>    
                </div>
            </div>
            <hr class="linea-divisora-medio">
            <div class="row container">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Garantia :  </label> <label>{{$producto->garantia}}</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Precio base :  </label> <label>{{$producto->precio_inicial}}</label>
                </div>
            </div>                    
            <hr class="linea-divisora-medio">
            <div class="row container">
                <div class="col-md-12 d-flex justify-content-center">
                    <label for="" class="label-fuerte">Descripcion  </label>
                </div>                    
            </div>
            <p class="text-center">{{$producto->descripcion}}</p>
            <div class="row">
                <span class="badge-secondary subtitulo-now">Datos del vendedor</span>
                
            </div>
            
            <div class="row container">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Usuario :  </label> <label>{{$usuarioPerfil->usuario}}</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Email :  </label> <label>{{$usuarioPerfil->email}}</label>
                </div>
            </div>                    
            <hr class="linea-divisora-medio">
            <div class="row container">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Youtube :  </label> <label>@empty($usuarioPerfil->us_youtube) <em>No encontrado</em>  @else{{$usuarioPerfil->us_youtube}}@endempty</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Facebook :  </label> <label>@empty($usuarioPerfil->us_facebook) <em>No encontrado</em>@else{{$usuarioPerfil->us_facebook}}@endempty</label>
                </div>
            </div>                    
            <hr class="linea-divisora-medio">
            <div class="row container">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Twitter :  </label><label>@empty($usuarioPerfil->us_twitter) <em>No encontrado</em>@else {{$usuarioPerfil->us_twitter}} @endempty</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Twitch :  </label> <label>@empty($usuarioPerfil->us_twitch) <em>No encontrado</em>@else{{$usuarioPerfil->us_twitch}}@endempty</label>
                </div>
            </div>                    
            <div class="row">
                <span class="badge-secondary subtitulo-now">Datos de envio</span>
            </div>
            <div class="row container">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Ubicación :</label><br><label>@empty($producto->ubicacion) <em>No encontrado</em>@else {{$producto->ubicacion}} @endempty</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Referencia :</label><br> <label>@empty($producto->distrito) <em>No encontrado</em>@else{{$producto->distrito}}@endempty</label>
                </div>
            </div>                    
            <hr class="linea-divisora-medio">
            <div class="row container text-center">
                <div class="col-md-12">
                    <label for="" class="label-fuerte">Mapa</label>
                </div>
            </div>                    
            
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div id="mapa" style="height: 390px;"></div>
            </div>
        </section>
    </div>
</div>

@if(Auth::user()->id != $usuarioPerfil->id)

<div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="modalMensaje" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMensajeLabel">Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Producto :</label>
                    <input type="text" class="form-control" id="recipient-name-1" name="producto-dest" value="{{$producto->nombre_producto}}" disabled>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Usuario destino :</label>
                    <input type="text" class="form-control" id="recipient-name-2" name="usuario-dest" value="{{$usuarioPerfil->usuario}}" disabled>
                </div>
                <form method="POST" id="formMessage">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Asunto :</label>
                        <input type="text" class="form-control" id="contentSubject" name="messageSubject" placeholder="inserte el asunto" >
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Mensaje:</label>
                        <textarea class="form-control" id="contentText" name="messageText" placeholder="Insertar texto"></textarea>
                    </div>
                    <input type="hidden" name="idProducto" value="{{$producto->id}}">
                    <input type="hidden" name="idUsuarioDestino" value="{{$usuarioPerfil->id}}" >
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitButton" data-dismiss="modal" >Enviar mensaje</button>                
            </div>
        </div>
    </div>
</div>
@else
@endif

@endsection

@section('contenidoJSabajo')

<script src="{{asset('js/jsMedioContacto.js')}}" ></script>
<script>
    var mymap = L.map('mapa').setView([{{$producto->latitud}},{{$producto->longitud}}], 15);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlzdGljYWx0dXJ0bGUiLCJhIjoiY2tpeHVnajEyMHI4ODJxbXk0MHk2dW41biJ9.3j9sAGykKUhTh5pN81XD9w', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);
    L.marker([{{$producto->latitud}},{{$producto->longitud}}]).addTo(mymap);
    
</script>

@endsection
