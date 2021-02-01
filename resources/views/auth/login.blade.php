@extends('layouts.app')

@section('cont_cabe')
    <title>Login - dRemate</title>

@endsection

@section('contenidoJS')
    <link rel="stylesheet" href="css/styleLogin.css">
@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('contenido')
    <main class="main-contenido-central ">
        <div class="main-background">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-4 mx-auto">
                        <div class="card card-signin my-5" style="background-color: transparent;border-radius:10%">
                            <div class="style-tarjeta">
                                <div class="card-body">

                                    <div style="text-align:center;">
                                        <img class="rounded-circle" style="background-color:#FFF; width: 8rem; height: 8rem; object-fit:contain;" src="img/assets/subasta_1.jpg"
                                            alt="logo-dRemate">


                                    </div><br>
                                    <h5 class="text-center titulo-1">Ingresar</h5>
                                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <br>

                                        <div class="form-label-group">
                                            <input type="text" id="inputEmail"
                                                class="form-control @error('usuario') is-invalid @enderror"
                                                placeholder="Email address" name="usuario" value="{{ old('usuario') }}"
                                                required autocomplete="usuario" autofocus>
                                            <label for="inputEmail">Usuario</label>

                                            @error('usuario')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-label-group">
                                            <input type="password" id="inputPassword"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password" required
                                                autocomplete="current-password">
                                            <label for="inputPassword">Contraseña</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheck1">Recordar
                                                Contraseña</label>
                                        </div>
                                        <hr class="lineas-separacion">

                                        <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                            type="submit">Ingresar</button>
                                        <hr class="my-2">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Te olvidaste la contraseña?
                                            </a>
                                        @endif

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
        </div>
    </main>

@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection
