@extends('layouts.app')


@section('cont_cabe')
    <title>Informacion producto - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="{{asset('css/infoProducto.css')}}">
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
                    <p class="text-align-center" for="">Usuario vendedor es <a href="#">{{$usuarioPerfil->usuario}}</a></p>
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
                    <button class="btn btn-danger btn-rojo-comu">Establecer comunicacion</button>
                    <button class="btn btn-primary btn-rojo-mens" data-toggle="modal" data-target="#modalMensaje" data-whatever="@mdo">Enviar mensaje al vendedor</button>
                    @else
                    <button class="btn btn-primary btn-rojo-mens" style="cursor: not-allowed" disabled >Enviar mensaje al vendedor</button>
                    <button class="btn btn-danger btn-rojo-comu" style="cursor: not-allowed" disabled>Establecer comunicacion</button>
                    
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
                        <label for="" class="label-fuerte">Ubicacion :  </label><label>@empty($producto->ubicacion) <em>No encontrado</em>@else {{$producto->ubicacion}} @endempty</label>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="label-fuerte">Twitch :  </label> <label>@empty($producto->distrito) <em>No encontrado</em>@else{{$producto->distrito}}@endempty</label>
                    </div>
                </div>                    
                <hr class="linea-divisora-medio">
                <div class="row container text-center">
                    <div class="col-md-12">
                        <label for="" class="label-fuerte">Mapa</label>
                    </div>
                </div>                    

                <div class="col-md-12 col-sm-12 col-lg-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d248.57175341142286!2d-75.74884872392501!3d4.567398762624254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1608588746432!5m2!1ses-419!2spe" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
@endsection
