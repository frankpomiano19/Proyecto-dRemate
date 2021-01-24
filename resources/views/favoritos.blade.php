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
                                                <form>
                                                    <a class="btn float-right"><img src="{{asset('img/assets/corazon.png')}}"></a>
                                                </form>
                                                <form>
                                                    <button type="submit" class="btn"><img src="{{asset('img/assets/email.png')}}"></button>
                                                </form>
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