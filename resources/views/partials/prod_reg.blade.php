<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="text-center text-white">
<div class="text-center text-white">
<a class="btn btn-success" href="{{ route('producto.registroe') }}" role="button" class="btn btn-info">Registrar nuevo Producto

</a>
    

    <table class="table table-hover table-striped">
        <thead class="thead-dark">
                  <tr>
                     <th>No</th>
                     <th>Nombre del producto</th>
                     <th>Descripcion</th>
                     <th>Condicion</th>
                     <th>Precio Inicial</th>
                     <th>Ubicacion</th>
                     <th width="280px">Action</th>
                  </tr>
        </thead>

        <tbody id="productos-list" name="productos-list">
              @foreach ($productos as $producto)
            <tr>
                   <td>{{ ++$i }}</td>
                   <td>{{ $producto->nombre_producto }}</td>
                   <td>{{ $producto->descripcion }}</td>
                   <td>{{ $producto->condicion }}</td>
                   <td>{{ $producto->precio_inicial }}</td>
                   <td>{{ $producto->ubicacion }}</td>
                   <td>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                  
                        <a href="{{ route('productos.show', $producto->id) }}" title="show">
                            <i class="fa fa-eye text-success  fa-lg"></i>
                        </a>
                        <a href="{{ route('productos.edit', $producto->id) }}" >
                            <i class="fa fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fa fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>

                    <a href="" class="btn btn-dark">Subastar</a>

                </td>

            </tr>
                @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $productos->links() !!}

    </div>

