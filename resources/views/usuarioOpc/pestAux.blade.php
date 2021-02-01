
    <section class="container pest-perfil-user">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <label class="pest-perfil-cate h5"> Datos personales </label>
                <div id="usuario-perso-id">
                    @include('usuarioOpc.partialsUser.datosPerso')
                </div>
                <div class="row text-center py-2">
                    <div class="col-sm-12 col-md-12 col-lg-12  ">
                        <button type="button" id="enviar-datos-perso" class="btn boton-actualizar">Actualizar</button>
                    </div>
                </div>


                <label class="pest-perfil-cate h5"> Información adicional </label>
                <br>
                <div id="usuario-publi-id">
                    @include('usuarioOpc.partialsUser.datosPubli')
                </div>
                <div class="row text-center py-2">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <button type="submit" id="enviar-datos-publi" class="btn boton-actualizar">Actualizar</button>
                    </div>
                </div>

                <label class="pest-perfil-cate h5"> Información de pago </label>
                <div class="row py-2">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label for="">¿Necesitas dinero para subastar?</label>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <button class="btn btn-info boton-actualizar" id="enviar-pago-now" type="button">Agregar 40
                            soles</button>
                        <button class="btn btn-info boton-actualizar" data-toggle="modal"
                            data-target="#ventana-modal-pago">Recargar
                            Dinero</button>

                    </div>
                </div>
                <div class="row py-2" id="datos-pago">
                    @include('usuarioOpc.partialsUser.datosDine')
                </div>


                {{-- <div class="row text-center py-2">
                    <div class="col-sm-12 col-md-12 col-lg-12  ">
                        <a href="{{ route('subirProducto-now') }}" class="btn boton-actualizar">Subir producto</a>
                    </div>
                </div>
                <div class="row text-center py-2">
                    <div class="col-sm-12 col-md-12 col-lg-12  ">
                        <a href="{{ route('registroProducto-now') }}" class="btn boton-actualizar">Registrar producto</a>
                    </div>
                </div>

                <div class="row text-center py-2">
                    <div class="col-sm-12 col-md-12 col-lg-12  ">
                        <a href="{{ route('registroSubasta-now') }}" class="btn boton-actualizar">Registrar producto y
                            subastar</a>
                    </div>
                </div> --}}

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
        <div class="modal fade" id="ventana-modal-pago" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>Pago</h2>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="credit-card-div">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control"
                                                        placeholder="Inserte numero de tarjeta">
                                                </div>
                                            </div>
                                            <div class="row py-2">
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <span class="help-block text-muted small-font">Mes de expiracion</span>
                                                    <input type="text" class="form-control" placeholder="MM">
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <span class="help-block text-muted small-font">Año de expiracion</span>
                                                    <input type="text" class="form-control" placeholder="YY">
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <span class="help-block text-muted small-font">CCV</span> <input
                                                        type="text" class="form-control" placeholder="CCV">
                                                </div>                                                                                                                                                                                                                                                                                                                                                                                                        -->
                                            </div>
                                            <div class="row py-2">
                                                <div class="col-md-12 pad-adjust">
                                                    <input type="text" class="form-control"
                                                        placeholder="Nombre en la tarjeta">
                                                </div>
                                            </div>
                                            <div class="row py-2">
                                                <div class="col-md-12 pad-adjust">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" checked class="text-muted">Grabar los
                                                            detalles de pago?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row py-2">
                                                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                                    <input type="button" class="btn btn-danger" data-dismiss="modal"
                                                        value="CANCEL">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                                    <input type="button" class="btn btn-warning btn-block"
                                                        value="PAGAR AHORA">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>


    </section>
