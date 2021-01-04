@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
    
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/styleProduct.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        
@endsection


@section('contenido')

    
  <div class="product">
    <br><br>
    <!--Contenedor de productos relacionados-->
    <div class ="container1">
        <div class="row">
          @foreach ($productosRelac as $prodRelac)
          <div class="col-md">
                <div class="card">
                    <img class="card-img-top" src="@if($prodRelac->imagen!=null){{ $prodRelac->imagen }} @else {{ $prodRelac->image_name1 }} @endif" alt="Card image cap">
                    <a href="{{ route('producto.detalles', $prodRelac->id) }}"><div class="card-body text-center">
                    <h5 class="card-title"> {{$prodRelac->nombre_producto}} </h5>
                    <p class="card-text"><small class="text">Last updated {{Carbon\Carbon::now()->diffForHumans($prodRelac->updated_at)}} </small></p>
                    </div></a>
                </div>
            </div>
            @endforeach

      </div>
    </div>
    <!--fin del Contenedor de productos relacionados-->
  <br>
  <!-- Información del producto -->
  <div class="container2">
    <h5 class="categories-product"><a href="#">Categorias</a>  > <a href="#">{{$cat->nombre_categoria}}</a>  </h5>
    <h3 class="product-title">{{$prod->nombre_producto}}</h3>
    <div class="row mb-2">
        <div class="col-md-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name1 }} @endif" alt="Primera imagen">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name2 }} @endif" alt="Segunda Imagen">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name3 }} @endif" alt="Tercera imagen">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="@if($prod->imagen!=null){{ $prod->imagen }} @else {{ $prod->image_name4 }} @endif" alt="Tercera imagen">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              
              <h2 style="display: none">Saldo disponible: S/.{{auth()->user()->us_din}}.00 </h2>
        </div>
        <div class="col">
          <div class="row mb-2">

            <form action=" {{route('puja.crear')}} " method="POST">
              @csrf
              
              @error('valorpuja')
                  <div class="alert alert-danger" role="alert">
                    Valor no aceptado o insuficiente
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @enderror
              @error('saldousuario')
                  <div class="alert alert-danger" role="alert">
                    Saldo insuficiente
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @enderror
                <div class="container text-center p-2">
                  
                  <div class="precio_inicial_producto p-2">
                    <h5>Precio inicial: S/. {{$prod->precio_inicial}}</h5>
                  </div>                  
                  <div class="comienzosubasta" id="presubasta">
                    <h5>Subasta inicia en:<div id="comienzosubasta"></div></h5>
                  </div>
                  <div class="tiempo_producto" id="tiemposubasta">
                    <h5>Subasta finaliza en:<div id="tiempopuja"></div></h5>
                  </div>
                  <div class="finalsubasta" id="finalsubasta">
                    <h5>La subasta ha finalizado</h5>
                  </div>
                  <div class="ganador" id="ganador">
                    @if ($ultimapuja === null)
                        <h4>No hay ganadores</h4>
                    @else
                        <h4>El ganador es:<br>{{$usuarios[($ultimapuja->user_id) - 1]->usuario}} </h4>
                    @endif
                  </div>
                  <br>
                  <div class="cant_puja" id="cantpuja">
                    
                        <input class="form-control" type="text" name="valorpuja" placeholder="Min:S/.{{$ultimoprecio +1}}.00">    
                    
                    
                  </div>
                  <!-- id del producto, es invisible para que no se vea mal el cuadro y saque el id del producto para crar la puja --> 
                  <input type="number" id="productoid" name="productoid" style="display: none" value="{{$prod->id}}" readonly><br>
                  <input type="number" id="ultimoprecio" name="ultimoprecio" style="display: none" value="{{$ultimoprecio}}" readonly>
                  <input type="number" id="saldousuario" name="saldousuario" style="display: none" value="{{auth()->user()->us_din}}" readonly>
                  <input type="number" id="idganador" name="idganador" style="display: none" value="{{auth()->user()->id}}" readonly>
                  <div class="boton_puja my-2" id="botonpuja">
                    <button  type="submit" class="btn btn-outline-primary">Realizar puja</button>
                  </div>
                  <div class="precio_directo my-2">
                    

                    
                      <h5>Precio actual: S/.{{$ultimoprecio}}</h5>
                    
                  </div>
                  
                  <div class="boton_compra my-2" style="display: none" id="boton_compra">
                    <h5>Compra rápida: S/.{{$prod->precio_inicial}}</h5>
                    <button type="button" class="btn btn-outline-primary">Compra</button>
                  </div>
                </div>
              
          </form>

            <div class="tablas_pujas">

              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <td colspan="2">ULTIMAS PUJAS</td>
                  </tr>
                  <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Puja</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pujastotales as $puja)
                  @if ($puja->producto_id==$prod->id)
                  <tr>
                    <td>{{$usuarios[($puja->user_id)-1]->usuario}}</td>
                    <td>S/.{{$puja->valor_puja}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- fin de la Información del producto -->
  <br>

  <div id="detalles" style="min-height: 450px;">
    <div id="descri">
      <div class="container3">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#descripcion">Descripción</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#opiniones">Opiniones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#estadisticas">Estadísticas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#similares">Subastas similares</a>
          </li>
        </ul>
        
        <div class="tab-content">
          <div class="tab-pane container active" id="descripcion">
            <h5 class="tilulo_producto my-2">{{$prod->nombre_producto}}</h5>
            <p style='font-family: "Times New Roman", Times, serif;'> {{$prod->descripcion}} </p>
          </div>
          <div class="tab-pane container fade" id="opiniones">
            <p>Ninguna opinion encontrada</p>
          </div>
          <div class="tab-pane container fade" id="estadisticas">
            <p>Estadisticas no calculadas</p>
          </div>
          <div class="tab-pane container fade" id="similares">
            <p>Area en mantenimiento</p>
          </div>
        </div>
      </div>
    </div>
    
    <div id="ubicacion">
      <h3>Ubicación</h3>
      <div id="mapa" style="height: 400px;"></div>
    </div>
  </div>
  
  
  <div id="fixed"></div>
  
  <br><br>
</div>
  
@endsection

@section('contenidoJSabajo')
  <script src="js/simplyCountdown.min.js"></script>
  <!-- 
  <script src="js/countdown.js"></script>
  -->
  <script>
    simplyCountdown('#tiempopuja', {

    year: {{$limitepuja->year}}, // required
    month: {{$limitepuja->month}}, // required
    day: {{$limitepuja->day}}, // required
    hours: {{$limitepuja->hour}}, // Default is 0 [0-23] integer
    minutes: {{$limitepuja->minute}}, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: 'Día',
        hours: 'Hora',
        minutes: 'Minuto',
        seconds: 'Segundo',
        pluralLetter: 's'
    },
    plural: true, //use plurals
    inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
    inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
    // in case of inline set to false
    enableUtc: false, //Use UTC as default
    onEnd: function() {
        alert("La subasta ha finalizado");
        document.getElementById('botonpuja').classList.add('oculta');
        document.getElementById('cantpuja').classList.add('oculta');
        document.getElementById('finalsubasta').classList.add('revelado');
        document.getElementById('ganador').classList.add('revelado');

         return; }, //Callback on countdown end, put your own function here
    refresh: 1000, // default refresh every 1s
    sectionClass: 'simply-section', //section css class
    amountClass: 'simply-amount', // amount css class
    wordClass: 'simply-word', // word css class
    zeroPad: false,
    countUp: false
});
  </script>
  <script>
    simplyCountdown('#comienzosubasta', {

    year: {{$iniciosubasta->year}}, // required
    month: {{$iniciosubasta->month}}, // required
    day: {{$iniciosubasta->day}}, // required
    hours: {{$iniciosubasta->hour}}, // Default is 0 [0-23] integer
    minutes: {{$iniciosubasta->minute}}, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: 'Día',
        hours: 'Hora',
        minutes: 'Minuto',
        seconds: 'Segundo',
        pluralLetter: 's'
    },
    plural: true, //use plurals
    inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
    inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
    // in case of inline set to false
    enableUtc: false, //Use UTC as default
    onEnd: function() {
        document.getElementById('tiemposubasta').classList.add('revelado');
        document.getElementById('cantpuja').classList.add('revelado');
        document.getElementById('botonpuja').classList.add('revelado');
        document.getElementById('presubasta').classList.add('oculta');
         return; }, //Callback on countdown end, put your own function here
    refresh: 1000, // default refresh every 1s
    sectionClass: 'simply-section', //section css class
    amountClass: 'simply-amount', // amount css class
    wordClass: 'simply-word', // word css class
    zeroPad: false,
    countUp: false
});
  </script>
  <script>
    var mymap = L.map('mapa').setView([-12.0557992,-77.041157], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlzdGljYWx0dXJ0bGUiLCJhIjoiY2tpeHVnajEyMHI4ODJxbXk0MHk2dW41biJ9.3j9sAGykKUhTh5pN81XD9w', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);
    L.marker([-12.0557992,-77.041157]).addTo(mymap);
    
</script>

    <!-- Colocar js abajo-->
@endsection
