@extends('layouts.app')

@section('cont_cabe')
    <title>Subasta rapida - dRemate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenidoJS')
    <!-- Colocar js-->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>

@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="css/styleSubastaRapida.css">
    <link rel="stylesheet" href="js/jquery.countdown.package-2.1.0/css/jquery.countdown.css">

@endsection

@section('contenido')
<br>
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Producto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productos.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('productos.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre_Producto:</strong>
                    <input type="text" name="nombre_producto" class="form-control" placeholder="Nombre_Producto">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <textarea class="form-control" style="height:50px" name="descripcion"
                        placeholder="descripcion"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Estado:</strong>
                    <input type="text" name="estado" class="form-control" placeholder="estado">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ubicacion:</strong>
                    <input type="text" name="ubicacion" class="form-control" placeholder="ubicacion">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection