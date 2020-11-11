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
<form action="{{ route('producto.registro')}}" method="post">
    @csrf
    <div>
        <label>
            Nombre
        </label>
        <input type="text" name="nombre" id="">
    </div>
    <div>
        <label>
            descripcion
        </label>
        <input type="text" name="descripcion" id="">
    </div>
    <div>
        <label>
            categoria
        </label>
        <select name="categoria">
            <option value="1" selected>categoria 1</option> 
            <option value="2">categoria 2</option>
            <option value="3">categoria 3</option>
        </select>
    </div>
    <div>
        <label>
            estado
        </label>
        <<select name="estado">
            <option value="Disponible" selected>Disponible</option> 
            <option value="No disponible">No disponible</option>
            <option value="En curso">En curso</option>
        </select>
    </div>
    <div>
        <label>
            condicion
        </label>
        <<select name="condicion">
            <option value="Nuevo" selected>Nuevo</option> 
            <option value="Usado">No Usado</option>
        </select>
    </div>
    <div>
        <label>
            imagen
        </label>
        <input type="file" name="imagen" id="">
    </div>
    <div>
        <label>
            garantia
        </label>
        <input type="text" name="garantia" id="">
    </div>
    <div>
        <label>
            precio inicial
        </label>
        <input type="text" name="precio_inicial" id="">
    </div>
    <div>
        <label>
            iniciosubasta
        </label>
        <input type="date" name="inicio_subasta" id="">
    </div>
    <div>
        <label>
            fin subasta
        </label>
        <input type="date" name="final_subasta" id="">
    </div>
    <button type="submit" class="btn btn-block btn-success">Agregar producto</button>
</form>

@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection
