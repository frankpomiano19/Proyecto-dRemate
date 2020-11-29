@if ($comentariosPerfil_s->count() > 0)
    @foreach ($comentariosPerfil_s as $comentariosPerfil)
        <div class="row py-4">
            <div class="col-md-2"></div>
            <div class="col-md-9">
                <div style="float: left; width:15%">
                    <img src="../img/assets/subasta_1.jpg" alt="Avatar" class="imagen-avatar rounded-circle">
                </div>
                <div class="comentario-salida" style="float: right;width:85%">

                    <div class="ajustar-label-1">
                        <a href="#" class="nombre-url">{{ $comentariosPerfil->comentUserPerteneciente->usuario }}</a>
                        <label class="">Hace 10 dias</label>
                    </div>
                    @if ($comentariosPerfil->comentUserPerteneciente->userProductoCompradorDestacado->count() >= 2)
                        <div class="ajustar-label-2">
                            <label class="etiqueta-destacado">Subastador<br>destacada</label>
                        </div>
                    @endif
                    <div class="row comentario-contenido">
                        <div class="col-md-12">
                            <p>{{ $comentariosPerfil->com_texto }}
                            </p>
                        </div>
                    </div>
                    <hr class="linea-separadora-centro-abajo">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn active ajustar-label-1 icon-button-like"><i class="fa fa-thumbs-o-up"></i>
                                {{ $comentariosPerfil->com_like }}</a>
                            <label class="btn ajustar-label-1 icon-button-like"><i class="fa fa-thumbs-o-down"></i>
                                {{ $comentariosPerfil->com_dislike }}</label>
                            <label
                                class="ajustar-label-1 label-2-new">{{ $comentariosPerfil->comentUserPerteneciente->userProductoSubastaGanada->count() }}<br>
                                subastas<br> ganadas</label>
                            <label
                                class="ajustar-label-1 label-2-new">{{ $comentariosPerfil->comentUserPerteneciente->userProductoSubastaIniciada->count() }}<br>
                                subastas<br> iniciadas</label>
                            @guest

                            @else
                                @if (Auth::user()->id == $comentariosPerfil->comentUserPerteneciente->id)
                                    <button type="button" class="btn ajustar-label-2 boton-color-2">Editar</button>
                                @endif
                            @endguest
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    @endforeach

@else
    <h5 class="text-center comt-titulo-1">No se encontraron comentarios</h4>

@endif
