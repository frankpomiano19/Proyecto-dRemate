<div class="text-center text-white">
    <div class="text-center text-white">
    <div class="">    
        <table class="table table-hover table-striped">
            <thead class="thead-light">
                      <tr>
                         <th>No</th>
                         <th>Nombre del producto</th>
                         <th>Departamento</th>
                         <th>Fechasas fin subasta</th>
                         <th>Precio final</th>
                         <th>Vendedor</th>
                         <th>Pag</th>
                      </tr>
            </thead>

            {{-- {{ $casa }} --}}
            
            <tbody id="productos-list" name="productos-list">
                  {{-- @foreach ($productosGanados as $info) --}}
                <tr class="bg-light">
                       <td>
                        {{-- {{ ++$i }} --}}
                        </td>
                       <td>NOMBRE</td>
                       <td>dEPARTAmento</td>
                       <td>fechaFinal</td>
                       <td>UltimApuja</td>
                       <td>usUARIO</td>
                       <td>
                        {{-- @if ($info->indicador == 1)
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
                        @else --}}
                                <button type="submit" title="pagar" class="btn btn-danger" disabled>Pagado</button>
                        {{-- @endif --}}
    
                    </td>
        
                </tr>
                    {{-- @endforeach --}}
        
            </tbody>
        </table>
    </div>
    
    
    