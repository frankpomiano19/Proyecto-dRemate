<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro de Subasta</title>

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        
        
    </head>
    <body class="antialiased" >
        
        <form class="needs-validation" action="{{ route('producto.registroee')}}" method="POST" novalidate>
            @csrf
            <label for="formGroupExampleInput">Registrar subasta</label><br><br>


            <p>_____</p>
            <input type="" name="nombre_producto" value="{{$datosProducto->nombre_producto}}" id="">
            <input type="" name="descripcion" value="{{$datosProducto->descripcion}}" id="">
            <input type="" name="categoria_id" value="{{$datosProducto->categoria_id}}" id="">
            <input type="" name="estado" value="{{$datosProducto->estado}}" id="">
            <input type="hidden" name="condicion" value="{{$datosProducto->condicion}}" id="">
            <input type="" name="ubicacion" value="{{$datosProducto->ubicacion}}" id="">
            <input type="" name="imagen" value="{{$datosProducto->imagen}}" id="">
            <input type="" name="garantia" value="{{$datosProducto->garantia}}" id="">



            <label for="formGroupExampleInput">Precio inicial</label><br>  
            <div class="input-group mb-3">
                <div class="input-group-prepend" id="button-addon3">
                    <button class="btn btn-outline-secondary" type="button">S/</button>
                    <button class="btn btn-outline-secondary" type="button">$</button>
                </div>
                @error('precio_inicial')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Precio mínimo: S/ 1,00
                    Precio máximo S/ 99,000
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
                <input type="text" name="precio_inicial" value="{{ old('precio_inicial') }}" class="form-control" placeholder="">
            </div>
            <div>
                <label for="form-group">Fecha de inicio de la subasta</label>
                @error('inicio_subasta')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      La fecha de inicio está mal
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
                <input type="date" value="{{ old('inicio_subasta') }}" name="inicio_subasta" id=""><br><br>
                @error('final_subasta')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    La fecha de fin está mal
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
                <label for="form-group">Fecha de fin de la subasta</label>
                <input type="date" name="final_subasta" value="{{ old('final_subasta') }}" id=""><br><br>
            </div>

            <button type="submit" class="btn btn-dark">Guardar</button>
        
        </form>
        <div>
            <button type="submit" class="btn btn-outline-info">Regresar</button>
        <a href="{{url("/home")}}"></a>

            
        </div>

        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
