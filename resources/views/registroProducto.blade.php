<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro de producto</title>

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        
        
    </head>
    <body class="antialiased m-4" >

        <label for="formGroupExampleInput">Registra tu producto</label>

    <form method="POST" action="{{ route('producto.registro')}}">
            @csrf
            <div class="form-group"; margin:auto>
                <label for="">Título</label>
                <input type="text" class="form-control" name="titulo" id="" placeholder="">
            </div>

            <div class="form-group"; margin:auto>
                <label for="exampleFormControlSelect1">Categoría</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Antiguedades</option>
                  <option>Tecnología</option>
                  <option>Vehículos</option>
                </select>
            </div>
            
            <div>
                <label for="formGroupExampleInput">Estado</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Nuevo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Usado</label>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ubicación</label>
                <br>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Agregar fotos</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <div>
                <label for="exampleFormControlTextarea1">Garantía</label>
                <br>
            </div>
        </form>

        <a href="{{URL::to('registroSubasta')}}"><button type="button" class="btn btn-primary">Siguiente</button></a>

        <script src="{{ asset(mix('js/app.js')) }}"></script>
    </body>
</html>
