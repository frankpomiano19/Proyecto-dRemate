<div class="text-center text-white">
<div class="text-center text-white">
<div class="">
    <h6 style="" class="bg-warning p-2 my-2 rounded text-dark">¡Importante! Para poder finalizar la transacción se necesita confirmar el pago, esto permitirá que el monto pagado llegue a la cuenta del vendedor.</h6><br>
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
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


