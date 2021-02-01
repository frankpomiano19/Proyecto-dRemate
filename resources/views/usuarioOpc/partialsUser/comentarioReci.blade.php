@php

  \Carbon\Carbon::setLocale('es');  
@endphp


@if ($comentariosPerfil_s->count() > 0)
    <script>
        contadorComentario = [-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1];
        identificadorComentario = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    </script>
    @php
    $index = -1;
    @endphp
    @foreach ($comentariosPerfil_s as $comentariosPerfil)
        @guest

        @else
            @if (Auth::user()->id == $comentariosPerfil->comentUserPerteneciente->id)
                @php
                $index++;
                @endphp
                <script>
                    indexComentario++;
                    contadorComentario[indexComentario] = indexComentario;
                    identificadorComentario[indexComentario] = "{{ $comentariosPerfil->id }}";

                </script>
            @endif

        @endguest
        <div class="row py-4">
            <div class="col-md-2"></div>
            <div class="col-md-9">
                <div style="float: left; width:15%">
                    <img src="../img/assets/subasta_1.jpg" alt="Avatar" class="imagen-avatar rounded-circle">
                </div>
                <div class="comentario-salida" style="float: right;width:85%">

                    <div class="ajustar-label-1">
                        <a href="#" class="nombre-url">{{ $comentariosPerfil->comentUserPerteneciente->usuario }}</a>
                        <label class="">
                            @php
                            echo \Carbon\Carbon::parse($comentariosPerfil->created_at)->diffForHumans();   
                            @endphp
                        </label>
                    </div>
                    @if ($comentariosPerfil->comentUserPerteneciente->userProductoCompradorDestacado->count() >= 2)
                        <div class="ajustar-label-2">
                            <label class="etiqueta-destacado">Subastador<br>destacada</label>
                        </div>
                    @endif
                    <div class="row comentario-contenido">
                        <div class="col-md-12">
                            <div class="texto-result-comment autoExpand" style="width: 100%">
                                {{ $comentariosPerfil->com_texto }}
                            </div>
                            @guest

                            @else
                                @if (Auth::user()->id == $comentariosPerfil->comentUserPerteneciente->id)
                                    <div class="parrafo-comentario div-ocultar">Edicion
                                        {{ $comentariosPerfil->com_editado + 1 }}
                                    </div>
                                    <form method="POST" id="{{ $index }}">
                                        @csrf
                                        <textarea style="width: 100%;height=200px"
                                            class="parrafo-comentario-edit div-ocultar" type="text"
                                            name="comentarioEditado"></textarea>
                                        <input type="hidden" value="{{ $idPerfil }}" name="idUserPerfilPartial">
                                        <input type="hidden" value="{{ $comentariosPerfil->id }}" name="idComentario">

                                    </form>
                                @endif

                            @endguest
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

                                    <button type="button" class="btn ajustar-label-2 boton-color-2 boton-editar"
                                        onclick="editarOn({{ $index }});">Editar</button>
                                    <button type="button"
                                        class="btn ajustar-label-2 boton-color-2 boton-confirmar div-ocultar"
                                        onclick="enviarEdicionComentarios();    ">Confirmar</button>
                                    <button type="button"
                                        class="btn ajustar-label-2 boton-color-2 boton-cancelar div-ocultar"
                                        onclick="editarOff({{ $index }});">Cancelar</button>

                                @endif
                            @endguest
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    @endforeach
    <div class="row justify-content-center">
        {{ $comentariosPerfil_s->links() }}
    </div>

@else
    <h5 class="text-center comt-titulo-1">No se encontraron comentarios</h4>

@endif
<script>
    indexComentario = -1;
    classBotonEditar = document.getElementsByClassName('boton-editar');
    classBotonCancelar = document.getElementsByClassName('boton-cancelar');
    classBotonConfirmar = document.getElementsByClassName('boton-confirmar');
    classParrafoComentario = document.getElementsByClassName('parrafo-comentario');
    classParrafoComentarioEdit = document.getElementsByClassName('parrafo-comentario-edit');

</script>
