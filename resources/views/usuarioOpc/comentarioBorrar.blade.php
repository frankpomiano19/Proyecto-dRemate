@extends('layouts.app')


@section('cont_cabe')
    <title>ComentarioBorrar - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="../css/styleComentario.css">
@endsection


@section('contenido')
    <script>
        var contadorComentario = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    </script>
    <br>
    <br>
    <br>
    <main class="container">
        @guest
            <h2>Para poder comentar, necesita identificarse</h2>
        @else

            <div class="row py-4">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div style="float: left; width:15%">
                        <img src="../img/assets/subasta_1.jpg" alt="Avatar" class="imagen-avatar rounded-circle">
                    </div>
                    <div id="cuadro-texto-input" style="float: right;">

                        <div class="ajustar-label-1">
                            <a href="#" class="nombre-url">{{ Auth::user()->usuario }}</a>

                        </div>

                        @if (Auth::user()->userProductoCompradorDestacado->count() >= 2)
                            <div class="ajustar-label-2">
                                <label class="etiqueta-destacado">Subastador<br>destacada</label>
                            </div>
                        @endif

                        <div class="row py-2 evitar-float">
                            <div class="col-md-12 color-input">
                                <textarea class="comentario-now-text" name="comentario-now"
                                    placeholder="Inserte su comentario"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <label
                                    class="ajustar-label-1 label-2-new">{{ Auth::user()->userProductoSubastaGanada->count() }}<br>
                                    subastas<br> ganadas</label>
                                <label
                                    class="ajustar-label-1 label-2-new">{{ Auth::user()->userProductoSubastaIniciada->count() }}<br>
                                    subastas<br> iniciadas</label>
                                <button type="button" class="btn ajustar-label-2 boton-color">Comentar</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-1"></div>

            </div>
        @endguest



        <h4 class="text-center comt-titulo-1">Comentarios mas gustados</h4>

        @if ($comentariosGustado_s->count() > 0)
            @foreach ($comentariosGustado_s as $comentariosGustado)
                <div class="row py-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-9">
                        <div style="float: left; width:15%">
                            <img src="../img/assets/subasta_1.jpg" alt="Avatar" class="imagen-avatar rounded-circle">
                        </div>
                        <div class="comentario-salida" style="float: right;width:85%">

                            <div class="ajustar-label-1">
                                <a href="#"
                                    class="nombre-url">{{ $comentariosGustado->comentUserPerteneciente->usuario }}</a>
                                <label class="">Hace 3 dias</label>
                            </div>
                            @if ($comentariosGustado->comentUserPerteneciente->userProductoCompradorDestacado->count() >= 2)
                                <div class="ajustar-label-2">
                                    <label class="etiqueta-destacado">Subastador<br>destacada</label>
                                </div>
                            @endif




                            <div class="row comentario-contenido">
                                <div class="col-md-12">
                                    <p>{{ $comentariosGustado->com_texto }}
                                    </p>

                                </div>
                            </div>

                            <hr class="linea-separadora-centro-abajo">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn active ajustar-label-1 icon-button-like"><i class="fa fa-thumbs-o-up"></i>
                                        {{ $comentariosGustado->com_like }}</a>
                                    <label class="btn ajustar-label-1 icon-button-like"><i class="fa fa-thumbs-o-down"></i>
                                        {{ $comentariosGustado->com_dislike }}</label>
                                    <label
                                        class="ajustar-label-1 label-2-new">{{ $comentariosGustado->comentUserPerteneciente->userProductoSubastaGanada->count() }}<br>
                                        subastas<br> ganadas</label>
                                    <label
                                        class="ajustar-label-1 label-2-new">{{ $comentariosGustado->comentUserPerteneciente->userProductoSubastaIniciada->count() }}<br>
                                        subastas<br> iniciadas</label>
                                    @guest

                                    @else
                                        @if (Auth::user()->id == $comentariosGustado->comentUserPerteneciente->id)
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
        <!--Comentarios recientes-->
        <h4 class="text-center comt-titulo-1">Comentarios mas recientes</h4>

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
                                <a href="#"
                                    class="nombre-url">{{ $comentariosPerfil->comentUserPerteneciente->usuario }}</a>
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
    </main>




@endsection

@section('contenidoJSabajo')
    <script src="../js/jsComentario.js"></script>
    <!-- Colocar js abajo-->
@endsection
