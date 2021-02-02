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
            {{ $datosProducto->nombre_producto}}
        </h1>

        <div class="row">

            <div class="col-md-6">
                <img class="img-fluid" src={{ $datosProducto->image_name1 }} alt="">
            </div>

            <div class="col-md-6">

                <form method="POST" action="{{ route('enviar.subasta') }}">

                    {{ csrf_field() }}
                    @csrf
                    <div class="row my-2 justify-content-center align-items-center">

                    <div class="col-md-6">

                        @error('inicio_subasta')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Fecha requerida
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @enderror
                        <h5 class="font-weight-bold">Inicio subasta:</h5>
                        <input type="date" class="form-control" value="{{ old('inicio_subasta') }}" name="inicio_subasta" min="2020-11-02" id="fechaInicio" required>

                        @error('precio_inicial')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Precio mínimo 10.00 - Precio máximo 999.99
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @enderror
                        <h5 class="font-weight-bold">Precio Inicial:</h5>
                        <input type="text" name="precio_inicial" value="{{ old('precio_inicial') }}"
                        class="form-control" id="precioInicial"
                        placeholder="Precio mínimo 10.00 - Precio máximo 999.99" required>


                    </div>

                    

                    <div class="col-md-6">

                        @error('final_subasta')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Fecha de fin no valida
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @enderror
                        <h5 class="font-weight-bold">Fin subasta:</h5>
                        <input type="date" class="form-control" name="final_subasta" min="2020-11-02" value="{{ old('final_subasta') }}" id="fechaInicioF" required>
                        <input type="hidden" name="id" value="{{ $datosProducto->id }}">
                        <input type="hidden" name="id" value="{{ $datosProducto->id }}">
                        <button type="submit" class="btn btn-success btn-block m-2">Subastar</button>
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('contenidoJSabajo')
@endsection
