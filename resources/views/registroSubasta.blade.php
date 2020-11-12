<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro de Subasta</title>

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        
        
    </head>
    <body class="antialiased" >

        <form action="{{ route('producto.registroee')}}" method="post">
            @csrf
            <label for="formGroupExampleInput">Registrar subasta</label><br><br>


            <p>_____</p>
            <input type="hidden" name="id" value="{{$datosProducto->id}}" id="">



            <label for="formGroupExampleInput">Precio inicial</label><br>  
            <div class="input-group mb-3">
                <div class="input-group-prepend" id="button-addon3">
                    <button class="btn btn-outline-secondary" type="button">S/</button>
                    <button class="btn btn-outline-secondary" type="button">$</button>
                </div>
                <input type="text" name="precio_inicial" class="form-control" placeholder="">
            </div>

            <div>
                <label for="form-group">Fecha de inicio de la subasta</label>
                <input type="date" name="inicio_subasta" id=""><br><br>
                <label for="form-group">Fecha de fin de la subasta</label>
                <input type="date" name="final_subasta" id=""><br><br>
            </div>

        
            <div class="form-group"; margin:auto>
                <label for="formGroupExampleInput">Título</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>

            <label for="">Método de pago</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Contraentrega
                </label>
            </div>           
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    PayPal
                </label>
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
                <label for="exampleFormControlTextarea1">Notas</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Guardar</button>
        
        </form>
        <div>
            <button type="submit" class="btn btn-outline-info">Regresar</button>
            
        </div>

        <script src="{{ asset(mix('js/app.js')) }}"></script>
    </body>
</html>
