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
<!-- Modal para bloqueo de producto a un usuario -->
<div class="modal fade" id="BloqProdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('bloq-user-prod')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Bloquear producto a un usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" value="{{ $producto->id }}" name="idprod_bloq" id="idprod_bloq">
                  Indique el usuario que no pueda ofertar este producto:
                  <select name="user_bloq_id" class="form-control">
                      @foreach ($users as $user)
                        @if (Auth::user()->id != $user->id)
                            <option value="{{$user->id}}">{{$user->usuario}}</option>
                        @endif
                      @endforeach
                </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Bloquear usuario</button>
                </div>
            </div>
        </form>
    </div>
  </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <section class="col-md-6 col-sm-6 col-lg-6 section-side">
                <div class="row col-md-12 d-flex justify-content-center">
                    <img src="{{ $producto->image_name1 }}" class="img-formated" alt="">

                </div>
                <hr class="linea-divisora-medio">
                <div class="row col-md-12 py-3">
                    <p class="text-align-center" for="">Precio base de S/{{ $producto->precio_inicial }}</p>
                </div>
                <div class="row col-md-12">
                    <p class="text-align-center" for="">Usuario vendedor es <a
                            href="{{ route('comentarios-now', $usuarioPerfil->id) }}">{{ $usuarioPerfil->usuario }}</a></p>
                </div>

                <div class="row col-md-12">
                    <ul style="color: red; font-size:0.8em;">
                        <li>Este producto permite ser negociado tomando como precio incial al precio base</li>
                        <li>Cuando presiones el boton "Establecer comunicacion" se le mandara una notificacion al vendedor,
                            para ir a un chat y negociar</li>
                    </ul>
                </div>

                <div class="row col-md-12">
                </div>

                <div class="row col-md-12 py-2 d-flex justify-content-around">
                    @if (Auth::user()->id != $usuarioPerfil->id)
                        <a class="btn btn-danger btn-rojo-comu"
                            href="{{ route('chat-real-time', $producto->id) }}">Establecer comunicacion</a>
                        <button class="btn btn-primary btn-rojo-mens" data-toggle="modal" data-target="#modalMensaje"
                            data-whatever="@mdo">Enviar mensaje al vendedor</button>
                    @else
                        <a class="btn btn-danger btn-rojo-comu" style="cursor: not-allowed" disabled>Establecer
                            comunicacion</a>
                        <button class="btn btn-primary btn-rojo-mens" style="cursor: not-allowed" disabled>Enviar mensaje al
                            vendedor</button>
                    @endif
                    @if (Auth::user()->id == $usuarioPerfil->id)
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BloqProdModal">
                                 Bloquear a un comprador
                            </button>
                    @endif
                </div>
            </section>
            <section class="col-md-6 col-sm-6 col-lg-6 section-side-2">
                <div class="row">
                    <span class="badge-secondary subtitulo-now">Datos del producto</span>
                </div>
                <div class="row container">
                    <div class="col-md-6">
                        <label for="" class="label-fuerte">Producto : </label>
                        <label>{{ $producto->nombre_producto }}</label>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="label-fuerte">Condicion : </label> <label>{{ $producto->condicion }}</label>
                    </div>
                </div>
                <hr class="linea-divisora-medio">
                <div class="row container">
                    <div class="col-md-6">
                        <label for="" class="label-fuerte">Garantia : </label> <label>{{ $producto->garantia }}</label>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="label-fuerte">Precio base : </label>
                        <label>{{ $producto->precio_inicial }}</label>
                    </div>
                </div>
                <hr class="linea-divisora-medio">
                <div class="row container">
                    <div class="col-md-12 d-flex justify-content-center">
                        <label for="" class="label-fuerte">Descripcion </label>
                    </div>
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
                <p class="text-center">{{ $producto->descripcion }}</p>
                <div class="row">
                    <span class="badge-secondary subtitulo-now">Datos del vendedor</span>

                </div>

                <div class="row container">
                    <div class="col-md-6">
                        <label for="" class="label-fuerte">Usuario : </label> <label>{{ $usuarioPerfil->usuario }}</label>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="label-fuerte">Email : </label> <label>{{ $usuarioPerfil->email }}</label>
                    </div>
                </div>
                <hr class="linea-divisora-medio">
                <div class="row container">
                    <div class="col-md-6">
                        <label for="" class="label-fuerte">Youtube : </label> <label>@empty($usuarioPerfil->us_youtube)
                        <em>No encontrado</em> @else{{ $usuarioPerfil->us_youtube }}@endempty</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Facebook : </label> <label>@empty($usuarioPerfil->us_facebook)
                    <em>No encontrado</em>@else{{ $usuarioPerfil->us_facebook }}@endempty</label>
            </div>
        </div>
        <hr class="linea-divisora-medio">
        <div class="row container">
            <div class="col-md-6">
                <label for="" class="label-fuerte">Twitter : </label><label>@empty($usuarioPerfil->us_twitter)
                <em>No encontrado</em>@else {{ $usuarioPerfil->us_twitter }} @endempty</label>
        </div>
        <div class="col-md-6">
            <label for="" class="label-fuerte">Twitch : </label> <label>@empty($usuarioPerfil->us_twitch) <em>No
                encontrado</em>@else{{ $usuarioPerfil->us_twitch }}@endempty</label>
    </div>
</div>
<div class="row">
    <span class="badge-secondary subtitulo-now">Datos de envio</span>
</div>
<div class="row container">
    <div class="col-md-6">
        <label for="" class="label-fuerte">Ubicacion : </label><label>@empty($producto->ubicacion) <em>No
            encontrado</em>@else {{ $producto->ubicacion }} @endempty</label>
</div>
<div class="col-md-6">
    <label for="" class="label-fuerte">Twitch : </label> <label>@empty($producto->distrito) <em>No
        encontrado</em>@else{{ $producto->distrito }}@endempty</label>
</div>
</div>
<hr class="linea-divisora-medio">
<div class="row container text-center">
<div class="col-md-12">
<label for="" class="label-fuerte">Mapa</label>
</div>
</div>

<div class="col-md-12 col-sm-12 col-lg-12">
<iframe
src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d248.57175341142286!2d-75.74884872392501!3d4.567398762624254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1608588746432!5m2!1ses-419!2spe"
width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
tabindex="0"></iframe>
</div>
</section>
</div>
</div>

@if (Auth::user()->id != $usuarioPerfil->id)

<div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="modalMensaje"
aria-hidden="true">
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
    <input type="text" class="form-control" id="recipient-name-1" name="producto-dest"
        value="{{ $producto->nombre_producto }}" disabled>
</div>
<div class="form-group">
    <label for="recipient-name" class="col-form-label">Usuario destino :</label>
    <input type="text" class="form-control" id="recipient-name-2" name="usuario-dest"
        value="{{ $usuarioPerfil->usuario }}" disabled>
</div>
<form method="POST" id="formMessage">
    @csrf
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Asunto :</label>
        <input type="text" class="form-control" id="contentSubject" name="messageSubject"
            placeholder="inserte el asunto">
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Mensaje:</label>
        <textarea class="form-control" id="contentText" name="messageText"
            placeholder="Insertar texto"></textarea>
    </div>
    <input type="hidden" name="idProducto" value="{{ $producto->id }}">
    <input type="hidden" name="idUsuarioDestino" value="{{ $usuarioPerfil->id }}">
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" id="submitButton" data-dismiss="modal">Enviar
    mensaje</button>

    
</div>
</div>
</div>
</div>
@else
@endif

{{-- <style>
body {
    font: normal 12px "Segoe UI", Arial, "Helvetica Neue", Helvetica, sans-serif;
}

a {  
    cursor: pointer;  
    text-decoration:none;  
}

/*------------Container styles --------------*/

#container {
    width:100%;
    height:100%;
}

/*------------Popup styles --------------*/

#popup_box { 
    display:none;
    position:fixed; 
    height:300px;  
    width:300px;  
    background: #fff;  
    left: 50%;
    top: 50%;
    margin-left: -150px;
    margin-top: -150px;
    z-index:100;     
    padding:15px;  
    font-size:15px;  
    -moz-box-shadow: 0 0 5px;
    -webkit-box-shadow: 0 0 5px;
    box-shadow: 0 0 5px;
}
#popupBoxClose { 
    background: #369;
    color: #fff;
    padding: 10px;
    margin: -15px -15px 10px -15px;
    display: block;
    position: relative;
    text-align: right;
}
#popupBoxClose #countDown {
    position: absolute;
    top: 10px;
    left: 10px;
    width: 20px;
    height: 20px;
    background: #fff;
    color: #369;
    text-align: center;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    font-size: 14px;
    font-weight: bold;
}

</style>
<div id="popup_box">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">Close <span id="countDown"></span></a>  
    <h1>This is a Popup</h1>  
</div>
<div id="container"> <!-- Main Page -->
    <h1>test</h1>
    
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra quam enim, ac congue nibh ultricies eget. Proin gravida lacus ut nisi tristique hendrerit. Fusce bibendum placerat pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor lacinia leo, sed accumsan nibh bibendum a. Cras sodales id risus nec dapibus. Nullam nec ullamcorper justo. Nam ac viverra tortor. Aenean libero augue, commodo et vestibulum quis, ultricies fermentum diam. Pellentesque id quam dictum risus pretium consequat sit amet vehicula nunc.</p>

<p>Sed a tellus luctus, tristique nisl imperdiet, sodales neque. Nullam sed dapibus felis. Pellentesque quis venenatis urna. Vivamus tristique magna quis nibh imperdiet fringilla. Praesent eu nisi quis erat euismod pulvinar. Nam scelerisque porta sollicitudin. Fusce odio purus, blandit consectetur nulla non, porttitor accumsan dolor. Aliquam orci justo, dignissim et feugiat nec, mattis quis augue. Fusce sollicitudin sit amet felis vel tincidunt.</p>

<p>Sed nisi libero, lobortis vitae tempor ut, suscipit nec velit. Nam venenatis ante turpis, eget eleifend nibh dignissim sit amet. Phasellus viverra, metus ut pellentesque varius, orci est adipiscing elit, id consectetur odio ante id ligula. Quisque eget felis sollicitudin, aliquet erat nec, dictum est. Suspendisse lacinia tincidunt laoreet. Suspendisse potenti. Suspendisse convallis egestas hendrerit. Nam lobortis lacus eleifend diam tempor, vel sodales sem porttitor. Etiam lobortis tempus dignissim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut egestas velit velit, sit amet facilisis leo auctor eget.</p>

<p>Ut sit amet cursus ante. Donec iaculis erat risus, a dictum tellus pellentesque et. Nullam aliquet fermentum dolor. Duis ut tellus facilisis, tincidunt lorem ut, lobortis tortor. Quisque quis tempor velit, nec volutpat elit. Donec hendrerit, libero vel bibendum adipiscing, purus quam eleifend neque, sed pretium turpis erat vitae purus. Praesent viverra sit amet odio eu sagittis. Curabitur vel semper nisl, ac commodo nunc. Sed sit amet hendrerit metus. In congue nisl a nisi lobortis fringilla. Maecenas dui est, faucibus non condimentum a, rhoncus vel odio. Fusce in nisi massa.</p>

<p>Vestibulum ut sapien eu ligula lobortis dapibus. Quisque ac erat interdum tellus rutrum scelerisque tincidunt sed elit. Vestibulum gravida tincidunt tellus suscipit dapibus. Fusce vulputate malesuada lorem et euismod. Sed vel erat at arcu pellentesque pharetra. Donec cursus lobortis consectetur. Donec convallis massa nisl, et dignissim nisi ultrices ac. Duis ac varius nisi. Suspendisse potenti. Nunc in lacinia diam, quis suscipit nisl. Donec vitae turpis ante. Mauris fringilla fringilla est. Vestibulum vel diam quis velit condimentum accumsan sit amet in tellus.</p>
    
</div>
<h1><button onclick="initCountDown();">boton</button></h1> --}}
{{-- <span id="countdown" class="timer" style="font-size: 30px"></span> --}}
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
<script>

var upgradeTime = 172801;
var seconds = upgradeTime;
function timer() {
       var days        = Math.floor(seconds/24/60/60);
       var hoursLeft   = Math.floor((seconds) - (days*86400));
       var hours       = Math.floor(hoursLeft/3600);
       var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
       var minutes     = Math.floor(minutesLeft/60);
       var remainingSeconds = seconds % 60;
       if (remainingSeconds < 10) {
           remainingSeconds = "0" + remainingSeconds; 
       }
       document.getElementById('countdown').innerHTML = days + ":" + hours + ":" + minutes + ":" + remainingSeconds;
       if (seconds == 0) {
           clearInterval(countdownTimer);
           document.getElementById('countdown').innerHTML = "Completed";
       } else {
           seconds--;
       }
}
var countdownTimer = setInterval('timer()', 1000);
</script>
<script src="{{ asset('js/jsMedioContacto.js') }}"></script>
@endsection
