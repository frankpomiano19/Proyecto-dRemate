@extends('layouts.app')


@section('cont_cabe')
    <title>Proximas subastas - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/styleProduct.css">
    <link href="{{ asset('css/mostrarProductos.css') }}" rel="stylesheet">
@endsection


@section('contenido')
    <br>
    <br>
    
        <h1 class="ml-5 mb-3">Proximas Subastas</h4>
        <div class="row">

            
            @forelse ($proxsub as $prod)
                
            
                

                    

                        <div class="col-md-5 mx-5">
                            <a href="{{ route('producto.detalles',$prod->id) }} " style="color:black">
                                <div class="producto fix">
                                    <div class="contenedor-imagen">
                                        <img src="{{$prod->image_name1}}" alt="" class="imagen">
                                    </div>
                                        
                                    <div class="texto"> 
                                        <div class="titulo">          
                                            <h3>{{$prod->nombre_producto}} </h3>                          
                                        </div>
                                        <h5>Precio inicial:{{ $prod->precio_inicial}}</h5>
                                        <p>
                                            {{$prod->descripcion}}
                                        </p>
                                        <div class="ubicacion" style="display:inline;">
                                            <h6>{{$prod->ubicacion}}</h6><p><b>{{$prod->distrito}}</b></p>
                                            
                                        </div>
                                    </div>  
                                        
                                        
                                </div>
                            </a>
                            <div class="abajo-producto"></div>
                        </div>
            @empty
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h4>Ups, no existe producto con esas condiciones.</h4>
                        
                    </div>
                </div>
            </div>


            @endforelse       
                
           
        </div>
            
    
        
    
    </div>
    

@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection