@extends('layouts.app')


@section('cont_cabe')
    <title>Registro - dRemate</title>

@endsection

@section('contenidoJS')
    <link rel="stylesheet" href="css/styleLogin.css">

@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection


@section('contenido')
    <main class="main-contenido-central">
        <div clas="main-background" style="background: rgba(102,0,0,0.10);">
            <div class="container cuadro-registro">
                <div class="row">
                    <div class="col-lg-10 col-xl-9 mx-auto">
                        <div class="card card-signin flex-row my-5">
                            <div class="card-img-left d-none d-md-flex">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Registro</h5>
                                <form class="form-signin">
                                    <div class="form-label-group">
                                        <input type="text" id="inputUserame" class="form-control" placeholder="Username"
                                            required autofocus>
                                        <label for="inputUserame">Usuario</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                            required>
                                        <label for="inputEmail">Correo</label>
                                    </div>

                                    <hr>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control"
                                            placeholder="Password" required>
                                        <label for="inputPassword">Contraseña</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputConfirmPassword" class="form-control"
                                            placeholder="Password" required>
                                        <label for="inputConfirmPassword">Repetir Contreseñ</label>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                        type="submit">Registrarse</button>
                                    <a class="d-block text-center mt-2 small" href="#">Login</a>
                                    <hr class="my-4">
                                    <!--
                                                                                                                                                                                                    <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                                                                                                                                                                                            class="fab fa-google mr-2"></i> Sign in with Google</button>
                                                                                                                                                                                                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                                                                                                                                                                                            class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                                                                                                                                                                                                    -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection
