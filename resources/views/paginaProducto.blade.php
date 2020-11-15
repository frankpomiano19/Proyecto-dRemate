@extends('layouts.app')

@section('contenidoCSS')
    <link rel="stylesheet" href="css/app.css"/>
@endsection

    
    <div class="container">
        <br><br><br><br>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Producto subastado con exito
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <h1 class="text-center">
            {{$datospro->nombre_producto}}
        </h1>

        <div class="row">

            <div class="col-md-6">
                <img class="img-fluid" src="https://www.diproelsac.com/dipro/722-large_default/horno-microondas-menumaster-jet14.jpg" alt="">
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold">Descripción:</h5>
                        <p>{{$datospro->descripcion}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Categoría:</h5>
                        <p>{{$datospro->categoria_id}}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Estado:</h5>
                        <p>{{$datospro->estado}}</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold">Garantia:</h5>
                        <p>{{$datospro->garantia}}</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Condición:</h5>
                        <p>{{$datospro->condicion}}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Precio Inicial:</h5>
                        <p>S/ {{$datospro->precio_inicial}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Inicio subasta:</h5>
                        <p>{{$datospro->inicio_subasta}}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">Fin subasta:</h5>
                        <p>{{$datospro->final_subasta}}</p>
                    </div>
                </div>
            <div>

            
        </div>
            <button class="btn btn-success"><a href="{{ url('registroProducto') }}">Registrar otro producto</a></button>
            <button class="btn btn-success">Ir al menú</button>
        </div>

    </div>
