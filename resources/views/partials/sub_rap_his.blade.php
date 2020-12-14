<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <!--<th>&nbsp;</th>-->
            <th>Fecha de venta</th>
            <th>Producto vendido</th>
            <th>Precio vendido</th>
            <th>Comprador</th>
            <th>Subastador</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($su_hist_s as $su_hist)
            <tr>
                <th>{{ $su_hist->final_subasta }}</th>
                <th>{{ $su_hist->nombre_producto }}</th>
                <th>{{ $su_hist->precio_inicial + rand(1, 200) }}</th>
                <th><a
                        href="{{ route('comentarios-now', $su_hist->productoUserPropietario->id) }}">{{ $su_hist->productoUserPropietario->usuario }}</a>
                </th>
                <th><a
                        href="{{ route('comentarios-now', $su_hist->productoUserComprador->id) }}">{{ $su_hist->productoUserComprador->usuario }}</a>
                </th>
            </tr>
        @endforeach

    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $su_hist_s->render() }}
</div>
