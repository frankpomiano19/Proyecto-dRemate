<div class="row">
@foreach ($su_curso_s as $su_curso)

    @php
    $abc = date_default_timezone_get();
    date_default_timezone_set('America/Lima');
    $valorNP1 = date('Y-m-d H:i:s');
    $tiempoini_aux = new \Carbon\Carbon($su_curso->final_subasta);
    $tiempofin_aux = new \Carbon\Carbon($valorNP1);
    $segundosSub_dif =$tiempoini_aux->diffInSeconds($tiempofin_aux);
    @endphp
    <script>
        programada_fecha_inicial[programada_cantidad] = "{{ $su_curso->inicio_subasta }}";
        programada_fecha_final[programada_cantidad] = "{{ $su_curso->final_subasta }}";
        programada_fecha_diff[programada_cantidad] = "{{ $segundosSub_dif }}";

    </script>


    <div class="col-sm-4 py-1">
        <div class="card">
            <div class="card-body" style="margin-bottom: auto;padding-bottom:0px;">
                <h5 class="card-title titulo-card-header-1">
                    <a href="{{ route('producto.detalles', $su_curso->id) }}">{{ $su_curso->nombre_producto }}</a>
                </h5>
            </div>
            <img class="card-img-top img-logo-size" src="https://na002.leafletcdns.com/pe/data/24/logo.png" alt=""
                srcset="">
            <div class="product__item">
                <div class="product__item__pic img-thumbnail set-bg card-img-top imagen-producto-card"
                    data-setbg="img/trending/trend-1.jpg"
                    style="background-image: url('{{ $su_curso->image_name1 }}');background-size:100% 100%;">
                    <div class="ep">Precio base : ${{ $su_curso->precio_inicial }} </div>
                    <div class="comment">
                        <a href="{{ route('producto.detalles', $su_curso->id) }}" class="btn"><img src="{{asset('img/assets/comentario.png')}}"></a>
                    </div>
                    <div class="view">
                        @auth
                        <form method="POST" enctype="multipart/form-data" action="{{ route('producto.favorito') }}">
                            {{ csrf_field() }}
                                    @csrf
                                    <input type="hidden" name="favorito" value={{ $su_curso->id }}>
                                        @foreach ($favoritos as $fav)

                                            @if ($fav == $su_curso->id)
                                                <?php
                                                    $favoritoL = 1;
                                                ?>
                                                @break
                                            @else
                                                <?php
                                                    $favoritoL = 0;
                                                ?>
                                            @endif

                                        @endforeach

                                        @if($favoritoL == 1)
                                            <input type="hidden" name="fav" value="0"> 
                                            <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Quitar de favorito"><img src="{{asset('img/assets/corazon.png')}}"></button>
                                            
                                        @else
                                            <input type="hidden" name="fav" value="1"> 
                                            <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Agregar como favorito"><img src="{{asset('img/assets/corazonR.png')}}"></button>
                                        @endif
                        </form>
                        @else
                            <a href="{{ url('login') }}" class="btn"><img src="{{asset('img/assets/corazon.png')}}"></a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="card-contenido-cuerpo-1">
                <div class="card-footer">
                    @if ($su_curso->productoPuja->count()>0) 
                    
                    Puja mas alta : S/ {{ $su_curso->productoPuja->last()->valor_puja}}
                    @else
                    Todavia no hay ninguna puja                        
                    @endif
                </div>
                <div class="text-center">Tiempo restante</div>
                <div class="defaultCountdown"> </div>
                <!--<div class="time"></div>-->
                <br>
                <!--
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: {{ rand(0, 100) }}%;">
                        {{ $su_curso->final_subasta }}
                    </div>
                </div>
                <div class="alert alert-success alerta-terminado" role="alert">Carga completa!</div>
                -->
                <a href="{{ route('producto.detalles', $su_curso->id) }}"
                    class="btn btn-primary col-md-12 boton-ver-subasta">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">Ver Subasta</div>


                    </div>
                </a>
            </div>
        </div>
    </div>
    <script>
        programada_cantidad++;
        progresoIndex++;

    </script>
@endforeach
</div>
    <div class="row d-flex justify-content-center">
        {{ $su_curso_s->links() }}
    </div>
