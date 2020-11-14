@extends('layouts.app')


@section('cont_cabe')
    <title>Product - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
@endsection


@section('contenido')

    <br><br>
  <div class="card-deck border">
    <div class ="container">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <img class="card-img-top" src="img/assets/subasta_1.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                    <h5 class="card-title">Máquina Café Express</h5>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <img class="card-img-top" src="img/assets/subasta_1.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                    <h5 class="card-title">Máquina Capuccinos Zoe</h5>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <img class="card-img-top" src="img/assets/subasta_1.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                    <h5 class="card-title">Máquina bebidas calientes</h5>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <img class="card-img-top" src="img/assets/subasta_1.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                    <h5 class="card-title">Máquina Axioo Latte</h5>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md">
                <div class="card">
                    <img class="card-img-top" src="img/assets/subasta_1.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                    <h5 class="card-title">Coffee Party</h5>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>

    </div>
    </div>
  </div>
  <br>
  <!-- Información del producto -->
  <div class="info_product">
    <h5 class="categories-product"><a href="#">Categorias</a>  > <a href="#">Electrodomésticos</a>  > <a href="#">Cafeteras</a> </h5>
    <h3 class="product-title">{{$prod->nombre_producto}}</h3>
    <div class="row mb-2">
        <div class="col-md-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="img/assets/{{$prod->imagen}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/assets/{{$prod->imagen}}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/assets/{{$prod->imagen}}" alt="Third slide">
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
              <h6 class="code_product">Código: SBT#{{$prod->id}}</h6>
        </div>
        <div class="col-md-6">
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="container text-center p-2 my-2 border">
                
                <div class="precio_inicial_producto p-2">
                  <h5>S/. {{$prod->precio_inicial}}</h5>
                </div>
                <div class="tiempo_producto">
                  <h5>Tiempo: 00:30</h5>
                </div>
                <br>
                <div class="cant_puja">
                  <input class="form-control" type="text" placeholder="Min:S/.{{$prod->precio_inicial +1}}.00">
                </div>
                <div class="boton_puja my-2">
                  <button type="button" class="btn btn-outline-primary">Realizar puja</button>
                </div>
                <div class="precio_directo my-2">
                  <h5>Precio: S/.{{$prod->precio_inicial}}</h5>
                  <h5>Compra rápida: S/.{{$prod->precio_inicial}}</h5>
                </div>
                <div class="boton_compra my-2">
                  <button type="button" class="btn btn-outline-primary">Compra</button>
                </div>
              </div>
            </div>
            <div class="col-md-6">


              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <td colspan="2">Ultimas pujas</td>
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
  <br>

  <div class="col-md-8 my-2">
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
        <p> {{$prod->descripcion}} </p>
        <h5>Caracteristicas</h5>
          <ul>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
          </ul>
      </div>
      <div class="tab-pane container fade" id="opiniones">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, delectus et ratione libero incidunt nemo maiores assumenda quasi facere cupiditate, qui voluptatem quidem sequi, suscipit est tempore officiis quia fuga?</p>
      </div>
      <div class="tab-pane container fade" id="estadisticas">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, delectus et ratione libero incidunt nemo maiores assumenda quasi facere cupiditate, qui voluptatem quidem sequi, suscipit est tempore officiis quia fuga?</p>
      </div>
      <div class="tab-pane container fade" id="similares">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, delectus et ratione libero incidunt nemo maiores assumenda quasi facere cupiditate, qui voluptatem quidem sequi, suscipit est tempore officiis quia fuga?</p>
      </div>
    </div>
  </div>
  <br><br>
@endsection

@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection
