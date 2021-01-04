<div class="text-center text-white">
    <div class="text-center text-white">
    
    <h1>Productos favoritos</h1>

    @foreach ($productos as $producto)
        @foreach ($favoritos as $favorito)

            @if ($favorito == $producto->id)
                <p>No: {{ $i++ }}</p>
                <p>Nombre Producto: {{ $producto->nombre_producto }}</p>
                <p>Departamento: {{ $producto->ubicacion }}</p>
                <p>Fecha fin subasta: {{ $producto->fina_subasta }}</p>
                <p>Precio: {{ $producto->precio_inicial }}</p>
                <a href=" {{ route('producto.detalles',$producto->id) }} ">ir</a>
                <p>---------------------------------------</p>

                
            @endif

        @endforeach
    @endforeach

    