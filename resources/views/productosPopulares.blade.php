@extends('layouts.app')

@section('share-content')
    <meta property="og:url" content="http://dremate.herokuapp.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="dRemate" />
    <meta property="og:description" content="Pagina de subasta online para cualquier tipo de persona" />
@endsection


@section('cont_cabe')
    <title>Productos Populares</title>
@endsection

@section('contenidoJS')

    
@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="css/styleProductosPopulares.css">
@endsection


@section('contenido')


<div class="container" id="cuerpo">
    <h1>Productos Populares</h1>
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div id="categoria">
                <div class="input-ordenar-por">
                    <form action="">
                        <div class="select">
                            <select name="slct" id="slct">
                              <option value="0" selected="">Todas</option>
                              <option value="1">Tecnología</option>
                              <option value="2">Hogar</option>
                              <option value="3">Electrodomésticos</option>
                              <option value="4">Instrumentos musicales</option>
                              <option value="5">Hogar</option>
                            </select>
                          </div>
                    </form>
                </div>            
                <div class="texto-ordenar-por">Categoría&nbsp;</div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="ordenar-por">
                <div class="input-ordenar-por">
                    <form action="">
                        <div class="select">
                            <select name="slct" id="slct">
                              <option value="0" selected="">Más populares</option>
                              <option value="1">Menos populares</option>
                            </select>
                          </div>
                    </form>
                </div>            
                <div class="texto-ordenar-por">Ordenar por&nbsp;</div>
            </div>
        </div>
    </div>

    {{-- Lista de productos --}}
    <div id="lista-productos">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="producto fix">
                    <div class="contenedor-imagen">
                        <div style="width: 100%; height: 100%;" class="flex">
                            <img src="img/assets/subasta4.jpg" alt="pic-auction" class="imagen-sub">
                        </div>
                    </div>
                    
                    <div class="texto"> 
                        <div class="titulo">          
                            <h3>Mazo</h3>
                            <i class="fa fa-heart cora"></i>                                
                        </div>
                        <h5>S/321</h5>
                        <p class="texto-descripcion">
                            Lorem ipsum dolor sit amet...
                        </p>
                        <p>2 días, 22:51:51</p>
                        <div class="ubicacion">
                            Surco, Lima
                        </div> 
                    </div>  
                    
                </div>
            </div>
            
        </div>
    </div>
    

</div>



@endsection
@section('contenidoJSabajo')


@endsection
