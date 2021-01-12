@extends('layouts.app')

@section('contenidoCSS')
    <link rel="stylesheet" href="css/app.css"/>
@endsection

    
    <div class="container">
        <br><br><br><br>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Producto registrado con exito
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <h1 class="text-center">
            {{$datosProducto->nombre_producto}}
        </h1>

        <div class="row">

            <div class="col-md-6">
                <img class="img-fluid" src={{$imagen1}} alt="">
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold">Descripción:</h5>
                        <p>{{$datosProducto->descripcion}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h5 class="font-weight-bold">Categoría:</h5>
                        @if($datosProducto->categoria_id==1)
                            <p>Tecnología</p>
                        @elseif($datosProducto->categoria_id==2)
                            <p>Hogar</p>
                        @elseif($datosProducto->categoria_id==3)
                            <p>Electrodomésticos</p>
                        @elseif($datosProducto->categoria_id==4)
                            <p>Joyas</p>
                        @elseif($datosProducto->categoria_id==5)
                            <p>Instrumento musical</p>
                        @else
                            <p>Juguetes</p> 
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5 class="font-weight-bold">Estado:</h5>
                        <p>{{$datosProducto->estado}}</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="font-weight-bold">Ubicación:</h5>
                        <p>{{$datosProducto->selectDepartamento}}</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold">Garantia:</h5>
                        <p>{{$datosProducto->garantia}}</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Condición:</h5>
                        <p>{{$datosProducto->condicion}}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Precio Inicial:</h5>
                        <p>Aún no enviado a subasta</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Inicio subasta:</h5>
                        <p>Por definir</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Fin subasta:</h5>
                        <p>Por definir</p>
                    </div>
                </div>
            <div>

            
        </div>
            <button class="btn btn-success btn-block"><a class="btn btn-success btn-block" href="{{ url('registroProducto') }}">Registrar otro producto</a></button>
            <button class="btn btn-success btn-block"><a class="btn btn-success btn-block" href="{{ url('/menuSubasta') }}">Menú de registro</a></button>
        </div>

    </div>
