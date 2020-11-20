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
                <th>{{ $su_hist->productoUserPropietario->usuario }}</th>
                <th>{{ $su_hist->productoUserComprador->usuario }}</th>
            </tr>
        @endforeach

    </tbody>
</table>
{{ $su_hist_s->render() }}
