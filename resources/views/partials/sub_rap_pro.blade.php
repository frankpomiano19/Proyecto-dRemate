@foreach ($su_curso_s as $su_curso)
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body" style="margin-bottom: auto;padding-bottom:0px;">
                <h5 class="card-title titulo-card-header-1">
                    <a href="#">{{ $su_curso->nombre_producto }}</a>
                </h5>
            </div>
            <img class="card-img-top img-logo-size" src="https://na002.leafletcdns.com/pe/data/24/logo.png" alt=""
                srcset="">
            <div class="product__item">
                <div class="product__item__pic img-thumbnail set-bg card-img-top imagen-producto-card"
                    data-setbg="img/trending/trend-1.jpg"
                    style="background-image: url('{{ $su_curso->imagen }}');background-size:100% 100%;">
                    <div class="ep">Precio base : ${{ $su_curso->precio_inicial }} </div>
                    <div class="comment"><i class="fa fa-comments"></i> {{ rand(1, 200) }}
                    </div>
                    <div class="view"><i class="fa fa-heart"></i> {{ rand(1, 50) }}</div>
                </div>
            </div>
            <div class="card-contenido-cuerpo-1">
                <div class="card-footer">
                    Puja mas alta : S/ {{ $su_curso->precio_inicial + rand(1, 200) }}
                </div>
                <div class="text-center">Tiempo restante</div>
                <div class="defaultCountdown"> </div>
                <!--<div class="time"></div>-->
                <br>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: {{ rand(0, 100) }}%;">
                        {{ $su_curso->final_subasta }}
                    </div>
                </div>
                <div class="alert alert-success" role="alert">Carga completa!</div>


                <a href="#" class="btn btn-primary col-md-12 boton-ver-subasta">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">Ver Subasta</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endforeach
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-md-12 text-center">
        {{ $su_curso_s->onEachSide(5)->links() }}
    </div>
</div>
