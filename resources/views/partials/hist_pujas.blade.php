


<table class="table table-hover table-striped">
    <thead class="thead-dark">
            <tr>
                <th>Fecha de puja</th>
                <th>Nombre del producto</th>
                <th>Cantidad de puja</th>
                
                
            </tr>
    </thead>

    <tbody id="" name="">
        @foreach ($pujas as $puja)
        <tr>
               <td>{{$puja->created_at}} </td>
               <td>{{$puja->productosPujar->nombre_producto}} </td>
               <td>{{$puja->valor_puja}} </td>
               
               
        </tr>
        @endforeach

    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $pujas->links() }}
    </div>