@extends('layouts.app')


@section('cont_cabe')
    <title>Subasta rapida - dRemate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenidoJS')
    <style>
        .cuerpo {
            margin-top: 80px;
            margin-bottom: 40px;

        }

        .uno {
            background-color: blueviolet;
        }

        .dos {
            background-color: red;
            height: 400px;
        }

    </style>

    <!-- Colocar js-->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>
@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="css/styleSubastaRapida.css">
@endsection

@section('contenido')

    <div class="container-lg cuerpo">
        <h2>Término de búsqueda: </h2>

        <div class="row">
            <div class="col-3 uno">
                <h4>Filtros</h4>
                <form>
                    <div>
                        <h5>Categoría</h5>
                        <select name="categoria" id="">
                            <option value="" selected>Mostrar todos</option>
                            <option value="1">Tecnología</option>
                            <option value="2">Hogar</option>
                            <option value="3">Electrodomésticos</option>
                            <option value="4">Joyas</option>
                            <option value="5">Instrumento musical</option>
                        </select>
                    </div>

                    <div>
                        <h5>Estado</h5>
                        <select name="categoria" id="">
                            <option value="" selected>Mostrar todos</option>
                            <option value="1">Nuevo</option>
                            <option value="2">Usado</option>
                        </select>
                    </div>

                    <div>
                        <h5>Ubicación</h5>
                        <p>Precio mínimo</p>
                        <input type="number">
                        <p>Precio máximo</p>
                        <input type="number">
                    </div>

                    <div>
                        <h5>Ubicación</h5>.
                        <select name="selectDepartamento" onchange="cambia()" class="form-control" required=""
                        data-parsley-error-message="Escoja su ubicación">
                        <option value="">Seleccione</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Ancash">Ancash</option>
                        <option value="Apurímac">Apurímac</option>
                        <option value="Arequipa">Arequipa</option>
                        <option value="Ayacucho">Ayacucho</option>
                        <option value="Cajamarca">Cajamarca</option>
                        <option value="Callao">Callao</option>
                        <option value="Cuzco">Cuzco </option>
                        <option value="Huancavelica">Huancavelica</option>
                        <option value="Huánuco">Huánuco</option>
                        <option value="Ica">Ica</option>
                        <option value="Junín">Junín</option>
                        <option value="La_Libertad">La Libertad</option>
                        <option value="Lambayeque">Lambayeque</option>
                        <option value="Lima">Lima</option>
                        <option value="Loreto">Loreto</option>
                        <option value="Madre_de_Dios">Madre de Dios</option>
                        <option value="Moquegua">Moquegua</option>
                        <option value="Pasco">Pasco</option>
                        <option value="Piura">Piura</option>
                        <option value="Puno">Puno</option>
                        <option value="San_Martín">San Martín</option>
                        <option value="Tacna">Tacna</option>
                        <option value="Tumbes">Tumbes</option>
                        <option value="Ucayali">Ucayali</option>
                    </select><br>

                    <select class="form-control" name="selectProvincia" onchange="cambiaDistrito()" required="">
                        <option>Seleccione la Provincia</option>
                    </select>
                    </div>

                    <input type="submit">
                </form>
            </div>

            <div class="col-sm-12 col-lg-9 dos">
                <div>
                    <p>Ordenar por</p>
                </div>

                <div>
                    <form action="" method="" >
                        <select onchange="this.form.action = this.value; this.disabled = true; this.form.submit()" >
                            <option value="0" selected>Más relevantes</option>
                            <option value="1">Menor precio</option>
                            <option value="2">Mayor precio</option>
                            <option value="3"></option>
                        </select>
                    </form>
                </div>                
            </div>
        </div>

        <div class="row">
            <div class="imagen">

            </div>
            <div class="descripcion">
                <div class="texto">

                </div>
            </div>
        </div>

    </div>

@endsection

@section('contenidoJSabajo')
    <script src="js/jsSubastaRapida.js"></script>
    <script src="js/jquery.chrony.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>
    <script src="js/moment-2.29.1.js"></script>    
    <script src="{{ asset('js/producto.js') }}"></script>
@endsection
