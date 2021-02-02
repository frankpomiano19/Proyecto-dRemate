@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
    @livewireStyles
    
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/styleProduct.css">
    <link href="{{ asset('css/mostrarProductos.css') }}" rel="stylesheet">
@endsection


@section('contenido')

    <br><br>
    @if($productos->count())
        <h4 class="ml-5 mb-3">Mis productos favoritos</h4>
        <div class="row">

            @foreach ($productos as $producto)
            
                @foreach ($favoritos as $favorito)

                    @if ($favorito == $producto->id)

                        <div class="col-md-5 mx-5">
                            {{-- <a href="{{ route('producto.detalles',$producto->id) }} " style="color:black"> --}}
                                <div class="producto fix">
                                    <div class="contenedor-imagen">
                                        <a class="text-dark" href="{{ route('producto.detalles',$producto->id) }} "><img src="{{$producto->image_name1}}" alt="" class="imagen"></a>
                                        
                                    </div>
                                        
                                    <div class="texto"> 
                                        <div class="titulo row ">          
                                            <div class="col"><h3><a class="text-dark" href="{{ route('producto.detalles',$producto->id) }} ">{{$producto->nombre_producto}}</a></h3></div>

                                            <div class="col">
                                                <form method="POST" action="{{ route('producto.favorito') }}">
                                                    {{ csrf_field() }}
                                                    @csrf
                                                    <input type="hidden" name="favorito" value={{ $producto->id }}>
                                                    <input type="hidden" name="indice" value=0>
                                                    <button type="submit" class="btn float-right" data-toggle="tooltip" data-placement="bottom" title="Quitar de favorito"><img src="{{asset('img/assets/corazon.png')}}"></button>
                                                </form>
                                                @if($suscrito == "1")
                                                    <form method="POST" action="{{ route('enviar.correo') }}">
                                                        {{ csrf_field() }}
                                                        @csrf
                                                        <input type="hidden" name="productoCorreo" value={{ $producto->id }}>
                                                        <input type="hidden" name="usuario" value={{ Auth::user()->usuario }}>
                                                        <input type="hidden" name="email" value={{ Auth::user()->email }}>
                                                        <button type="submit" class="btn" data-toggle="tooltip" data-placement="top" title="Enviar a mi correo"><img src="{{asset('img/assets/email.png')}}"></button>


                                                    </form>
                                                @else
                                                    <button type="button" class="btn" data-toggle="modal" data-placement="top" title="Enviar a mi correo" data-target="#exampleModal">
                                                        <img src="{{asset('img/assets/email.png')}}">
                                                    </button>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-center" id="exampleModalLabel">Necesitas estar suscrito</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Debes estar suscrito para enviar la informacíon del producto a tu correo. Puedes hacerlo con el botón inferior "Suscribirme" o hacerlo en cualquier momento desde las pestaña "Mi perfil", tal como lo muestra la imagen. Es totalmente gratis.<br></p>
                                                                    <img class="img-fluid" src="http://imgfz.com/i/BxFkYKs.png">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                    <form method="POST" action="{{ route('suscripcion.usuario') }}">
                                                                        {{ csrf_field() }}
                                                                        @csrf
                                                                        <input type="hidden" name="idUsuario" value={{ Auth::user()->id }}>
                                                                        <input type="hidden" name="nameUser" value={{ Auth::user()->usuario }}>
                                                                        <input type="hidden" name="email" value={{ Auth::user()->email }}>
                                                                        <button type="submit" class="btn btn-success">Suscribirme</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <h5>Precio inicial: S/ {{$producto->precio_inicial}}</h5>
                                        <p>
                                        {{$producto->descripcion}}
                                        </p>
                                        <div class="row">
                                            <div class="col"><h6>Departamento:{{$producto->ubicacion}}</h6><p>{{$producto->distrito}}</></p></div>
                                        </div>
                                    </div>  
                                        
                                        
                                </div>
                            {{-- </a> --}}
                            <div class="abajo-producto"></div>
                        </div>

                    @endif
                @endforeach
            @endforeach
        </div>
            
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h4 class="my-1">Ups, no existe producto con esas condiciones.</h4>
                    <img class="img-fluid my-3 animate__animated  animate__flash" src="{{ asset('img/undraw_Taken_re_yn20.svg') }}" style="width: 30%; heigth: 30%;" alt="insertar SVG con la etiqueta image">
                </div>
            </div>
        </div>
    @endif
    </div>
    

@livewireScripts

@endsection

@section('contenidoJSabajo')
@endsection