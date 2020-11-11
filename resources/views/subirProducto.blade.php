@extends('layouts.app')


@section('cont_cabe')
    <title>Subtitulo - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
@endsection


@section('contenido')
<br>
<div class="container">
    <br>
    <div>
        <p class="text-center">Formulario de subasta</p>
    </div>
    <div id="titulo_producto">
        <h3 class="bold m-2">Datos del producto</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('producto.registro')}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Categoría</label>
                            <select class="custom-select mr-sm-2" name="categoria" id="inlineFormCustomSelect">
                                <option value="Computador" selected>Computador</option>
                                <option value="Ropa">Ropa</option>
                                <option value="Electrodomesticos">Electrodoméstico</option>
                                <option value="Libro">Libro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Estado</label>
                            <select class="custom-select mr-sm-2" name="estado" id="inlineFormCustomSelect">
                                <option value="Nuevo" selected>Nuevo</option>
                                <option value="Usado">Usado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="">Descripción</label>
                          <input type="text" name="descripcion" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-1">
                        </div>
                        <div class="form-group col-md-5">
                          <label for="">Agregar fotos</label>
                          <input type="file" name="foto" class="form-control-file" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Devoluciones</label>
                            <select class="custom-select mr-sm-2" name="devoluciones" id="inlineFormCustomSelect">
                                <option selected value="Si">Sí</option>
                                <option value="No">No</option>
                                <option value="Negociabe">Negociable</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="">Precio inicial</label>
                          <input type="number" name="precioInicial" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha Subasta</label>
                            <input class="form-control" type="datetime-local" name="fecha" value="" id="example-datetime-local-input">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-check">
                              <input class="form-check-input" name="terminos" type="checkbox" id="gridCheck">
                              <label class="form-check-label" for="gridCheck">
                                Aceptar términos y condiciones
                              </label>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <button type="submit" class="btn btn-block btn-success">Agregar producto</button>
                            </div>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
<br>

@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection
