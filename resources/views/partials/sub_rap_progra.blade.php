@foreach ($su_dispo_s as $su_dispo)

    @php

    $abcd = date_default_timezone_get();
    date_default_timezone_set('America/Lima');
    $valorNP2 = date('Y-m-d H:i:s');
    $tiempoini_aux2 = new \Carbon\Carbon($su_dispo->inicio_subasta);
    $tiempofin_aux2 = new \Carbon\Carbon($valorNP2);
    $segundosSub_dif2 =$tiempoini_aux2->diffInSeconds($tiempofin_aux2);
    @endphp
    <script>
        programada_fecha_inicial2[programada_cantidad2] = "{{ $su_dispo->inicio_subasta }}";
        programada_fecha_final2[programada_cantidad2] = "{{ $su_dispo->final_subasta }}";
        programada_fecha_diff2[programada_cantidad2] = "{{ $segundosSub_dif2 }}";
        programada_cantidad2++;

    </script>



    <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="#" class="titulo-card-header-1">{{ $su_dispo->nombre_producto }}</a>
                </h4>
            </div>
            <img class="card-img-top img-logo-size align-center" src="https://na002.leafletcdns.com/pe/data/24/logo.png"
                alt="" srcset="">

            <a href="#"><img class="card-img-top imagen-producto-card" src="@if($su_dispo->imagen!=null){{ $su_dispo->imagen }} @else {{ $su_dispo->image_name1 }} @endif " alt=""></a>
            <div class="card-contenido-cuerpo-1">
                <div class="card-footer">
                    Precio base : S/ {{ $su_dispo->precio_inicial }}
                </div>
                <div class="text-center">Inicia en</div>
                <div class="text-center">{{ $su_dispo->inicio_subasta }}</div>
                <div class="defaultCountdownPro" id="cronoContador-program"> </div>

                <!--<div class="alert alert-success" role="alert">Carga Completa</div>-->
                <div class="sub-rapida-icono">

                    <button type="button" class="navbar-toggler">
                        <i class="fa fa-calendar fa-sm"></i>
                    </button>
                    <button type="button" class="navbar-toggler">
                        <i class="fa fa-bell fa-sm"></i>
                    </button>
                    <button type="button" class="navbar-toggler">
                        <i class="fa fa-heart fa-sm"></i>
                    </button>

                </div>

                <a href="{{ route('producto.detalles', $su_dispo->id) }}"
                    class="btn btn-primary col-md-12 boton-ver-subasta">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">Ver Subasta
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endforeach
{{ $su_dispo_s->links() }}
