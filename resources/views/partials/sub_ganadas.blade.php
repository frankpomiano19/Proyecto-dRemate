@extends('layouts.app')

@section('cont_cabe')
<title>Perfil - dRemate</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenidoJS')
    <!-- Colocar js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="../css/stylePerfil.css">

@endsection

@section('contenido')

<div class="text-center text-white">
<div class="text-center text-white">
<br><br>
<table class="table table-hover table-striped">
    <thead class="thead-dark">
            <tr>
                <th>Nombre del</th>
                <th>Subastador</th>
                <th>Precio pagado</th>
                <th>Inicio de subasta</th>
                <th>Fin de subasta</th>
                <th>Accion</th>
            </tr>
    </thead>

    <tbody id="" name="">
        {{-- @foreach ($productosSub_s as $productosSub)
            <tr>
               <td>{{ $productosSub->nombre_producto }}</td>
               <td>{{ $productosSub->descripcion }}</td>
               <td>{{ $productosSub->precio_inicial }}</td>
               <td>{{ $productosSub->inicio_subasta }}</td>
               <td>{{ $productosSub->final_subasta }}</td>
               <td><a href="" class="btn btn-success">Pagar al subastador</a></td>
            </tr>
        @endforeach --}}

            <tr>
               <td></td>
               <td></td>
               <td>{{ auth()->user()->id}}</td>
               <td></td>
               <td></td>
               <td><a href="" class="btn btn-success">Pagar al subastador</a></td>
            </tr>

    </tbody>
</table>
@if ($pujasMezcla)
    <div class="bg-dark">
        <p>Hay</p>
    </div>
@else
    <div class="bg-dark">
        <p>NO NAY</p> 
    </div> 
@endif

<div class="bg-dark">
        
    {{-- {{ $productos }} --}}

    @foreach ($pujasMezcla as $info)
    <p>Id: {{ $info->productoId }} - Nombre: {{ $info->nombreProducto}} - Cierre subasta: {{ $info->finalSubasta }} - Precio: {{ $info->valorPuja }} </p><button class="btn btn-success">Pagar producto</button><br>
    @endforeach
    <p>----------------------------------------</p>

</div>


@endsection
@section('contenidoJSabajo')
<script src="{{asset("js/vue.js")}}"></script>
<script src="{{asset("js/axios.js")}}"></script>
<script src="{{asset('js/jsPerfil.js')}}"></script>

@endsection
@push('ajax_crud')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('js/ajax.js')}}"></script>

@endpush 
