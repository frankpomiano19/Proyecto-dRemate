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


<div class="">
    <h6 style="display:inline" class="bg-warning p-2 my-2 rounded text-dark">¡Importante! Para poder finalizar la transacción se necesita confirmar el pago, esto permitirá que el monto pagado llegue a la cuenta del vendedor.</h6><br><br>
    

    <table class="table table-hover table-striped">
        <thead class="thead-light">
                  <tr>
                     <th>No</th>
                     <th>Nombre del producto</th>
                     <th>Departamento</th>
                     <th>Fecha fin subasta</th>
                     <th>Precio final</th>
                     <th>Vendedor</th>
                     <th>Pago</th>
                  </tr>
        </thead>
    
        <tbody id="productos-list" name="productos-list">
              @foreach ($productosGanados as $info)
            <tr class="bg-light">
                   <td>{{ ++$i }}</td>
                   <td>{{ $info->producto }}</td>
                   <td>{{ $info->departamento }}</td>
                   <td>{{ $info->finalSubasta }}</td>
                   <td>{{ $info->ultimaPuja }}</td>
                   <td>{{ $info->usuario }}</td>
                   <td>
                    @if ($info->indicador == 1)
                        <form action="{{ route('pago.vendedor') }}"	 method="POST">
                            @csrf
                            <button type="submit" title="pagar" class="btn btn-success">Confirmar</button>
                            <input type="hidden" name="vendedor" value="{{ $info->idVendedor }}"
                            class="form-control">
                            <input type="hidden" name="monto" value="{{ $info->ultimaPuja }}"
                            class="form-control">
                            <input type="hidden" name="idProducto" value="{{ $info->idProducto }}"
                            class="form-control">

                        </form>
                    @else
                            <button type="submit" title="pagar" class="btn btn-danger" disabled>Pagado</button>
                    @endif

                </td>
    
            </tr>
                @endforeach
    
        </tbody>
    </table>
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
