<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> </h2>
        </div>
        <div class="pull-right">
            <!--<a class="btn btn-success" href="{{ route('productos.create') }}" title="Create a project"> <i class="fa fa-plus-circle"></i>
                </a>-->
        </div>
    </div>
</div>

{{-- @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif --}}

<div class="text-center text-white">
<div class="text-center text-white">
<a class="btn btn-success mb-2" href="{{ route('producto.registroee') }}" role="button" class="btn btn-info">Registrar y Subastar producto</a>


<table class="table table-hover table-striped">
    <thead class="thead-dark">
            <tr>
                <th>Nombre del producto</th>
                <th>Precio Inicial</th>
                <th>Descripcion</th>
                <th>Inicio de subasta</th>
                <th>Fin de subasta</th>
            </tr>
    </thead>

    <tbody id="" name="">
          @foreach ($productosSub_s as $productosSub)
        <tr>
               <td>{{ $productosSub->nombre_producto }}</td>
               <td>{{ $productosSub->descripcion }}</td>
               <td>{{ $productosSub->precio_inicial }}</td>
               <td>{{ $productosSub->inicio_subasta }}</td>
               <td>{{ $productosSub->final_subasta }}</td>
        </tr>
            @endforeach

    </tbody>
</table>
<div class="d-flex justify-content-center">
{!! $productosSub_s->links() !!}
</div>

