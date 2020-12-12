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

<div class="container">
    
    <br>
    <div class="row">
        <div class="col-3">

           {{-- {{ $tipo }} --}}

            <h5>Precio desde</h5>
            @error('precioMin')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="text" class="form-control" name="precioMin" wire:model="precioMin">

            <h5>Hasta</h5>
            @error('precioMax')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="text" class="form-control" name="precioMax" wire:model="precioMax">

            <h5>Categoria</h5>
            <select name="" class="form-control" id="" wire:model="" disabled>
                <option value="">Tecnología</option>
            </select>

            <h5>Condicion</h5>
            @error('condicion')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
                <select class="form-control" name="condicion" id="" wire:model="condicion">
                    <option value="Nuevo" >Nuevo</option>
                    <option value="Usado">Usado</option>
                </select>

            <h5>Departamento</h5>
            @error('departamento')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
                <select name="selectDepartamento" onchange="cambia()" class="form-control mb-1" required=""
                data-parsley-error-message="Escoja su ubicación" wire:model="departamento">
                    <option value="" selected>Seleccionar</option>
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
                </select>
                <br><br>
        </div>

        <div class="col-9">
            <div class="row">
                <div class="col-12 mb-2">
                    <h5>Categoria: Tecnología > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                </div>
            </div>

            @if($productos->count())
                <div class="row">
            
                @foreach ($productos as $producto)
                    <div class="col-4">
                        <div class="card m-1 p-0">
                            <div class="card-body">
                                <h5 class="card-title">{{$producto->nombre_producto}}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$producto->ubicacion}}</li>
                                <li class="list-group-item">{{$producto->precio_inicial}}</li>
                                <li class="list-group-item">{{$producto->categoria_id}}</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">{{$producto->condicion}}</a>
                                <a href="#" class="card-link">{{$producto->ubicacion}}</a>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
                </div>
            @else
                <div class="text-center">
                    <h4 class="my-1">Ups, no existe producto con esas condiciones.</h4>
                    <img class="img-fluid my-3 animate__animated  animate__flash" src="{{ asset('img/undraw_Taken_re_yn20.svg') }}" style="width: 30%; heigth: 30%;" alt="insertar SVG con la etiqueta image">
                </div>
            @endif
        </div>
    </div>
</div>
@section('contenidoJSabajo')
    <script src="js/jsSubastaRapida.js"></script>
    <script src="js/jquery.chrony.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>
    <script src="js/moment-2.29.1.js"></script>    
    <script src="{{ asset('js/producto.js') }}"></script>
@endsection