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
        <h4 class="ml-5 mb-3">{{ $productos->count() }} resultados para: "{{ $nombreProducto }}"</h4>
        <div class="row">

            @foreach ($productos as $producto)

            <div class="col-md-5 mx-5" id="verproducto">
                <a href=" {{ route('producto.detalles',$producto->id) }} " style="color:black">
                    <div class="producto fix">
                        <div class="contenedor-imagen">
                            <img src="{{$producto->image_name1}}" alt="" class="imagen">
                        </div>
                            
                        <div class="texto"> 
                            <div class="titulo">          
                                <h3>{{$producto->nombre_producto}}</h3>
                                                         
                            </div>
                            <h5>Precio inicial: S/ {{$producto->precio_inicial}}</h5>
                            <p class="texto-descripcion">
                            {{$producto->descripcion}}
                            </p>
                            <div class="ubicacion" style="display:inline;">
                                <h6>{{$producto->ubicacion}}, {{$producto->distrito}}</h6>   
                                  
                            </div>
                        </div>  
             
                    </div>
                </a>
                <div class="abajo-producto"></div>
            </div>
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