@extends('layouts.app')


@section('cont_cabe')
    <title>Perfil - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="{{ asset('css/stylePerfil.css') }}">
@endsection


@section('contenido')
    <br>
    <br>
    <section class="container pest-perfil-user">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <label class="pest-perfil-cate h5"> Datos personales </label>
                <form action="">
                    @csrf
                    <div class="row py-2">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="label-input" for="">Usuario</label> <input class="input-cuadro" type="text"
                                name="" id="" placeholder="nombre de usuario">
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="label-input" for="">Celular</label> <input type="text" name="" id=""
                                placeholder="Celular">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="label-input" for="">Correo</label> <input type="text" name="" id=""
                                placeholder="Correo">
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="label-input" for="">Sexo</label>
                            <select name="sexo" id="">
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                    </div>

                    <div class="row text-center py-2">
                        <div class="col-sm-12 col-md-12 col-lg-12  ">
                            <button type="submit" class="btn boton-actualizar">Actualizar</button>
                        </div>
                    </div>
                </form>
                <label class="pest-perfil-cate h5"> Información adicional </label>
                <br>
                <label class="texto-advertencia" for="">* Toda la información colocada en esta seccion sera pública y
                    aparecera en tu subasta</label>
                <form action="">
                    @csrf
                    <div class="row py-2">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="btn btn-social-icon btn-youtube">
                                <span class="fa fa-youtube"></span>
                            </label>
                            <input type="url" name="youtube" id="" placeholder="youtube url">
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="btn btn-social-icon btn-facebook">
                                <span class="fa fa-facebook"></span>
                            </label>
                            <input type="url" name="twitter" id="" placeholder="facebook-url">

                        </div>
                    </div>
                    <div class="row py-2">

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="btn btn-social-icon btn-twitter">
                                <span class="fa fa-twitter"></span>
                            </label>
                            <input type="url" name="twitter" id="" placeholder="twitter url">
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="btn btn-social-icon btn-twitch">
                                <span class="fa fa-twitch"></span>
                            </label>
                            <input type="url" name="twitch" id="" placeholder="twitch-url">

                        </div>


                    </div>

                    <div class="row text-center py-2">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <button type="submit" class="btn boton-actualizar">Actualizar</button>
                        </div>
                    </div>


                </form>
                <label class="pest-perfil-cate h5"> Información de pago </label>
                <div class="row py-2">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label for="">¿Necesitas dinero para jugar?</label>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <button class="btn btn-info boton-actualizar">Recargar
                            Dinero</button>
                    </div>
                </div>

                <!--contenido abajo-->

                <h5 class="texto-titulo-abajo">Algunas cosas que puedes hacer</h5>


                <div class="row text-center">
                    <div class="col-sm-5 col-md-5 col-lg-5 card-cuadro shadow">
                        <div class="icono-card-abajo"><i class="fa fa-gavel icono-real rounded-circle"></i>
                        </div>
                        <br>
                        <br>
                        <br>
                        <h6 class="titulo-card-abajo">Subastador</h6>
                        <ul class="lista-card-abajo">
                            <li><label class="subrayado-card-abajo" for=""> Registra tu productoy subasta</label></li>
                            <li> <label class="subrayado-card-abajo" for="">Deja un mensaje programado al ganador de
                                    tu subasta</label> </li>
                            <li> <label class="subrayado-card-abajo" for="">Restringir a personas participar en tu
                                    subasta</label></li>
                        </ul>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5 card-cuadro shadow">
                        <div><i class="fa fa-user icono-real rounded-circle"></i></div>
                        <br>
                        <br>
                        <h6 class="titulo-card-abajo">Comprador</h6>

                        <ul class="lista-card-abajo">
                            <li><label class="subrayado-card-abajo" for=""> Marcar en tu calendario las subastas
                                    favoritas</label></li>
                            <li> <label class="subrayado-card-abajo" for="">Pujar por algun producto</label> </li>
                            <li> <label class="subrayado-card-abajo" for="">Registrar productos favoritos</label></li>
                        </ul>


                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection
