@extends('layouts.app')


@section('cont_cabe')
    <title>Home - D'REMATE</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!--footer.css pal footer / barra.css pal navbar / no es necesario el fontawesome-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/barra.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
@endsection


@section('contenido')

<div class="c-hero" style="padding-top:21px;">
    <div class="c-hero__center">
        <h1 class="c-hero__title">SUBASTAS ONLINE D'REMATE</h1>
        <h2 class="c-hero__subtitle">
            ENCUENTRA TODO TIPO DE PRODUCTOS EN NUESTRA PÁGINA
        </h2>
        <hr style="margin-top: 25px;">
        <h5><span class="uppercase">Registrate ahora y empieza</span></h5>
        <a class="red button register" href="/register">REGISTRARSE</a> 
        
        <div class="c-hero__feats">
            <a href="/subastaRapida" class="c-hero__feat">
                <img src="http://imgfz.com/i/gVFiRSt.jpeg">
                    <h2>Subastas<br>
                        En vivo</h2>
                        <span>Conoce más</span>
            </a>
            <a href="/subastaRapida" class="c-hero__feat">
                <img src="http://imgfz.com/i/P5uQzyi.png">
                    <h2>Resultados<br>
                        anteriores</h2>
                    <span>Conoce más</span>
            </a>
            <a href="/category" class="c-hero__feat">
                <img src="http://imgfz.com/i/Rnp1gBz.jpeg">
                    <h2>Categorias<br>
                        Variadas</h2>
                        <span>Conoce más</span>
            </a>
        </div>
    </div>
</div>

<section class="c-callout" style="background-color: #000000;;">
    <div class="c-callout__wrap">
        <span class="c-callout__icon" style="background-image:url(https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/newsletter-3.png);">
        </span>
        <div class="c-callout__message">
            <p>
                <strong>Entérate de los nuevos productos</strong>
            </p>
        </div>
        <a href="#" class="c-callout__btn">
                Novedades
        </a>
    </div>
</section>


<section class="section section-lg text-center" style="position: relative;">
        <div class="shell-wide">
          <h3>Cómo funciona</h3>
          <div class="divider divider-default"></div>
          <div class="range range-xs-center range-50">
            <div class="cell-sm-9 cell-md-6 cell-lg-3">
              <div class="thumbnail-classic unit unit-sm-horizontal unit-md-vertical unit-md-horizontal unit-lg-vertical">
                <div class="thumbnail-classic-icon unit-left"><span class="icon">01</span></div>
                <div class="thumbnail-classic-caption unit-body">
                  <h6 class="thumbnail-classic-title">REGISTRATE</h6>
                  <hr class="divider divider-default divider-sm">
                  <p class="thumbnail-classic-text">Para comenzar a utilizar nuestra página, deberá registrarse. ¡Es completamente gratis!</p>
                </div>
              </div>
            </div>
            <div class="cell-sm-9 cell-md-6 cell-lg-3">
              <div class="thumbnail-classic unit unit-sm-horizontal unit-md-vertical unit-md-horizontal unit-lg-vertical">
                <div class="thumbnail-classic-icon unit-left"><span class="icon">02</span></div>
                <div class="thumbnail-classic-caption unit-body">
                  <h6 class="thumbnail-classic-title">Compra o haz una oferta</h6>
                  <hr class="divider divider-default divider-sm">
                  <p class="thumbnail-classic-text">Puede comprar instantáneamente o hacer una oferta por el producto deseado inmediatamente después del registro.</p>
                </div>
              </div>
            </div>
            <div class="cell-sm-9 cell-md-6 cell-lg-3">
              <div class="thumbnail-classic unit unit-sm-horizontal unit-md-vertical unit-md-horizontal unit-lg-vertical">
                <div class="thumbnail-classic-icon unit-left"><span class="icon">03</span></div>
                <div class="thumbnail-classic-caption unit-body">
                  <h6 class="thumbnail-classic-title">Realiza una puja</h6>
                  <hr class="divider divider-default divider-sm">
                  <p class="thumbnail-classic-text">Ofrece una cantidad de dinero para adquirir cualquier subasta, si tu puja resulta ser la más alta, ¡la subasta es tuya!</p>
                </div>
              </div>
            </div>
            <div class="cell-sm-9 cell-md-6 cell-lg-3">
              <div class="thumbnail-classic unit unit-sm-horizontal unit-md-vertical unit-md-horizontal unit-lg-vertical">
                <div class="thumbnail-classic-icon unit-left"><span class="icon">04</span></div>
                <div class="thumbnail-classic-caption unit-body">
                  <h6 class="thumbnail-classic-title">Gana</h6>
                  <hr class="divider divider-default divider-sm">
                  <p class="thumbnail-classic-text">Gana fácilmente en nuestra subasta y disfruta del producto que tanto deseas.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


<section id="about" class="about">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title" style="padding-bottom: 30px;">
            <h2>¿Quiénes somos?</h2>
            <p>Somos una empresa dedicada a las subastas de productos en linea, que permite a los miembros participar en emocionantes subastas en vivo - en cualquier momento y desde cualquier lugar.</p>
        </div>
        <div class="row content">
            <div class="col-lg-6">
            <p style="color: #5d5a5a;;margin-top: 0px;margin-bottom: 1rem;font-size:16px">
                Disfruta de las distintas ventajas que te ofrecemos para hacer de esta experiencia la mejor de todas.
            </p>
            <ul>
                <li style="color: #444444; "><i class="fa fa-check"></i> Una multitud de opciones, obtén acceso a todos los productos que quieras.</li>
                <li style="color: #444444;"><i class="fa fa-check"></i> Sé parte de una sala de subastas desde la comodidad de tu casa.</li>
                <li style="color: #444444;"><i class="fa fa-check"></i> Encuentra lo que te interesa en pocos segundos por medio de las categorias.</li>
            </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
            <p style="color: #444444;">
            <strong>¿Qué es una subasta en vivo?</strong><br>Las subastas en vivo son eventos de transmisión simultánea que permiten a las personas ofertar por artículos en línea. Con las ofertas en vivo, puede acceder a las subastas de todo el mundo directamente desde su propia computadora. ¡Simplemente conviértase en miembro y estará listo para ofertar!
            </p>
            </div>
        </div>
    </div>
</section>

@endsection

@section('contenidoJSabajo')
    <!-- Colocar js abajo-->
    <script src="https://use.fontawesome.com/c9d7a705d9.js"></script>
    <script src="https://preview.colorlib.com/theme/onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
@endsection
