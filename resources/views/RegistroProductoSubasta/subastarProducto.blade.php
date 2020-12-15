@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->   
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/styleProduct.css">
    
@endsection


@section('contenido')

<div class="container">
    <br><br>

    <h1>
            Nombre Producto
    </h1>
    

    <div class="row">

        <div class="col-md-6">
            <img class="img-fluid" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Felpais.com%2Felpais%2F2019%2F10%2F30%2Falbum%2F1572424649_614672.html&psig=AOvVaw2GYprfpa0NjRQIHMrH9mkr&ust=1607824487388000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCLjEuJSrx-0CFQAAAAAdAAAAABAD" alt="">
        </div>

        <div class="col-md-6">
            <div class="row my-2">
                <div class="col-md-12">
                    <h5 class="font-weight-bold">Descripción:</h5>
                    <p>lorem fakasasfaksnfas naonfaonoias nafnklanfkasln nlkafnnakls knfalknasfklnasklf afsnlkalnskfnkl</p>
                </div>
            </div>

            <div class="row my-2 justify-content-center align-items-center">

                <div class="col-md-6">
                    <h5 class="font-weight-bold">Inicio subasta:</h5>
                    <input type="date" class="form-control" value="{{ old('inicio_subasta') }}" name="inicio_subasta" min="2020-11-02" id="fechaInicio" required>
                </div>
                <div class="col-md-6 justify-content-center align-items-center">
                    <h5 class="font-weight-bold">Fin subasta:</h5>
                    <input type="date" class="form-control" name="final_subasta" min="2020-11-02" value="{{ old('final_subasta') }}" id="fechaInicioF" required>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-8">
                    <h5 class="font-weight-bold">Precio Inicial:</h5>
                    <input type="text" name="precio_inicial" value="{{ old('precio_inicial') }}" class="form-control" id="precioInicial" placeholder="Precio mínimo 10.00 - Precio máximo 999.99" required>
                </div>
                <div class="col-md-4">
                    <h5></h5>
                    <button class="btn btn-success btn-block mb-2"><a class="btn btn-success btn-block" href="{{ url('registroSubasta') }}">Subastar</a></button>
                </div>
            </div>

        <div>

        
    </div>

        

    </div>

</div>

@endsection

@section('contenidoJSabajo')
@endsection