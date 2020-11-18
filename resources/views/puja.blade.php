@extends('layouts.app')


@section('cont_cabe')
    <title>Home - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
   
  
@endsection


@section('contenido')





<div class="c-hero">
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
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/feat1.png">
                    <h2>Subastas<br>
                        En vivo</h2>
                        <span>Conoce más</span>
            </a>
            <a href="/subastaRapida" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/results-2.png">
                    <h2>Resultados<br>
                        anteriores</h2>
                    <span>Conoce más</span>
            </a>
            <a href="/category" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/valuation-2.png">
                    <h2>Categorias<br>
                        Variadas</h2>
                        <span>Conoce más</span>
            </a>
            <!--<a href="#" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/feat1.png">
                     <h2>Subastas<br>
                    En vivo</h2>
                    <span>Conoce más</span>
            </a>-->
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
                <li style="color: #444444; "><i class="fa fa-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                <li style="color: #444444;"><i class="fa fa-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                <li style="color: #444444;"><i class="fa fa-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
            <p style="color: #444444;">
            ¿Qué es una subasta en vivo?<br>Las subastas en vivo son eventos de transmisión simultánea que permiten a las personas ofertar por artículos en línea. Con las ofertas en vivo, puede acceder a las subastas de todo el mundo directamente desde su propia computadora. ¡Simplemente conviértase en miembro y estará listo para ofertar!
            </p>
            </div>
        </div>
    </div>
</section>



<!-- CATEGORIAS

<section class="c-posts">
        <h2 class="c-posts__title">Explora las diversas categorias</h2>
        <h3 class="c-posts__subtitle">Articulos personales y para el hogar</h3>

        <div class="home-categories" style="display: inline-block;">
    <div class="grid">
    <hr>
    <br>
        <figure class="effect-zoe">
            <img src="https://elempresario.mx/sites/default/files/imagecache/nota_completa/moda.jpg" alt="img25">
            <figcaption>
                <h2>
                    Articulos de
                    <span>Moda</span>
                </h2>
                <p class="description">  
                    asd
                </p>
            </figcaption> 
        </figure>
        <figure class="effect-zoe">
            <img src="https://myperuglobal.com/wp-content/uploads/2015/10/Untitled-design.png" alt="img26">
            <figcaption>
                <h2>
                    Productos
                    <span>Tecnologicos</span>
                </h2>
                <p class="description">  
                    asd
                </p>
            </figcaption> 
        </figure>
        <figure class="effect-zoe">
            <img src="https://cdn.shopify.com/s/files/1/0899/2262/articles/10-tiendas-de-decoraci-n-de-interiores-para-tu-hogar.jpg?v=1559339599" alt="img27">
            <figcaption>
                <h2>
                    Articulos para el
                    <span>HOGAR</span>
                </h2>
                <p class="description">  
                   asd
                </p>
            </figcaption> 
        </figure>
    </div>
    <div class="grid">
        <figure class="effect-zoe">
            <img src="https://www.engelglobal.com/fileadmin/master/Branchen/technical_moulding/TEC_Sport___Freizeit.jpg" alt="img28">
            <figcaption>
                <h2>
                    Deportes y
                    <span>Ocio</span>
                </h2>
                <p class="description">  
                    asd
                </p>
            </figcaption> 
        </figure>
        <figure class="effect-zoe">
            <img src="https://kasaniu.com/wp-content/uploads/2017/08/ScreenHunter_450-Aug.-13-17.43-1170x680.jpg" alt="img28">
            <figcaption>
                <h2>
                    
                    <span>Antigüedades</span>
                </h2>
                <p class="description">  
                    asd
                </p>
            </figcaption> 
        </figure>
        <figure class="effect-zoe">
            <img src="https://us.emedemujer.com/wp-content/uploads/sites/3/2017/02/Jardiner%C3%ADa-b%C3%A1sica-lo-que-toda-newbie-debe-saber-770x512.jpg" alt="img28">
            <figcaption>
                <h2>
                    Articulos de
                    <span>Jardineria</span>
                </h2>
                <p class="description">  
                    asd
                </p>
            </figcaption> 
        </figure>
    </div>
</div>
<br>
<div class="c-posts__btns">
    <a href="/category" class="c-posts__btn">Explora más</a>
</div>
</section>-->

<div class="deals_featured">
    <div class="container">
        <div class="row"><h2>Productos destacados</h2>
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                <!-- Deals -->
                
                <div class="deals">
                    <div class="deals_title">Destacado</div>
                    <div class="deals_slider_container">
                    <!-- Deals Slider -->
                    <div class="owl-carousel owl-theme deals_slider owl-loaded owl-drag">

                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s"  style="width: auto"><div class="owl-item active" style="margin-right: 30px;"><div class="owl-item deals_item">
                    <div class="deals_image"><img src="https://preview.colorlib.com/theme/onetech/images/deals.png" alt="" data-pagespeed-url-hash="4210287633" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                    <div class="deals_content" style="margin-bottom:15px">
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                    <div class="deals_item_category"><a href="#">Headphones</a></div>
                    <div class="deals_item_price_a ml-auto">$300</div>
                    </div>
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                    <div class="deals_item_name">Beoplay H7</div>
                    <div class="deals_item_price ml-auto">$225</div>
                    </div>

                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                    <div class="deals_timer_title_container">
                    <div class="deals_timer_title">Hurry Up</div>
                    <div class="deals_timer_subtitle">Offer ends in:</div>
                    </div>
                    <div class="deals_timer_content ml-auto">
                    <div class="deals_timer_box clearfix" data-target-time="">
                    <div class="deals_timer_unit">
                    <div id="deals_timer1_hr" class="deals_timer_hr">47</div>
                    <span>hours</span>
                    </div>
                    <div class="deals_timer_unit">
                    <div id="deals_timer1_min" class="deals_timer_min">23</div>
                    <span>mins</span>
                    </div>
                    <div class="deals_timer_unit">
                    <div id="deals_timer1_sec" class="deals_timer_sec">05</div>
                    <span>secs</span>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div></div></div></div></div>
                    </div>
                </div>
                <!-- Featured -->
                <div class="featured">
                <div class="tabbed_container">
                <div class="tabs">
                <ul class="clearfix">
                <li class="active">Ofertas de la semana</li>


                </ul>
                <div class="tabs_line"><span style="left: 0px; width: 175px;"></span></div>
                </div>
                <!-- Product Panel -->
                <div class="product_panel panel active">
                <div class="featured_slider slider slick-initialized slick-slider slick-dotted"><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 612px; transform: translate3d(0px, 0px, 0px);"><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 153px;" tabindex="0" role="tabpanel" id="slick-slide00" aria-describedby="slick-slide-control00"><div><div class="featured_slider_item" style="width: 100%; display: inline-block;">
                <div class="border_active active"></div>
                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="https://preview.colorlib.com/theme/onetech/images/featured_1.png" alt="" data-pagespeed-url-hash="2018603916" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                <div class="product_content">
                <div class="product_price discount">$225<span>$300</span></div>
                <div class="product_name"><div><a href="product.html" tabindex="0">Huawei MediaPad...</a></div></div>
                <div class="product_extras">

                <button class="product_cart_button" tabindex="0">Add to Cart</button>
                </div>
                </div>
                <div class="product_fav"><i class="fa fa-heart"></i></div>

                </div>
                </div></div><div><div class="featured_slider_item" style="width: 100%; display: inline-block;">
                <div class="border_active active"></div>
                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="https://preview.colorlib.com/theme/onetech/images/featured_2.png" alt="" data-pagespeed-url-hash="2313103837" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                <div class="product_content">
                <div class="product_price">$379</div>
                <div class="product_name"><div><a href="product.html" tabindex="0">Apple iPod shuffle</a></div></div>
                <div class="product_extras">

                <button class="product_cart_button active" tabindex="0">Add to Cart</button>
                </div>
                </div>
                <div class="product_fav"><i class="fa fa-heart"></i></div>

                </div>
                </div></div></div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 153px;" tabindex="0" role="tabpanel" id="slick-slide01"><div><div class="featured_slider_item" style="width: 100%; display: inline-block;">
                <div class="border_active active"></div>
                <div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="https://preview.colorlib.com/theme/onetech/images/featured_3.png" alt="" data-pagespeed-url-hash="2607603758" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                <div class="product_content">
                <div class="product_price">$379</div>
                <div class="product_name"><div><a href="product.html" tabindex="0">Sony MDRZX310W</a></div></div>
                <div class="product_extras">

                <button class="product_cart_button" tabindex="0">Add to Cart</button>
                </div>
                </div>
                <div class="product_fav"><i class="fa fa-heart"></i></div>

                </div>
                </div></div><div><div class="featured_slider_item" style="width: 100%; display: inline-block;">
                <div class="border_active active"></div>
                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="https://preview.colorlib.com/theme/onetech/images/featured_4.png" alt="" data-pagespeed-url-hash="2902103679" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                <div class="product_content">
                <div class="product_price discount">$225<span>$300</span></div>
                <div class="product_name"><div><a href="product.html" tabindex="0">LUNA Smartphone</a></div></div>
                <div class="product_extras">

                <button class="product_cart_button" tabindex="0">Add to Cart</button>
                </div>
                </div>
                <div class="product_fav"><i class="fa fa-heart"></i></div>

                </div>
                </div></div></div><div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 153px;" tabindex="0" role="tabpanel" id="slick-slide02"><div><div class="featured_slider_item" style="width: 100%; display: inline-block;">
                <div class="border_active active"></div>
                <div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="https://preview.colorlib.com/theme/onetech/images/featured_5.png" alt="" data-pagespeed-url-hash="3196603600" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                <div class="product_content">
                <div class="product_price">$225</div>
                <div class="product_name"><div><a href="product.html" tabindex="0">Canon STM Kit...</a></div></div>
                <div class="product_extras">

                <button class="product_cart_button" tabindex="0">Add to Cart</button>
                </div>
                </div>
                <div class="product_fav"><i class="fa fa-heart"></i></div>

                </div>
                </div></div><div><div class="featured_slider_item" style="width: 100%; display: inline-block;">
                <div class="border_active active"></div>
                <div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="https://preview.colorlib.com/theme/onetech/images/featured_6.png" alt="" data-pagespeed-url-hash="3491103521" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                <div class="product_content">
                <div class="product_price">$379</div>
                <div class="product_name"><div><a href="product.html" tabindex="0">Samsung J330F...</a></div></div>
                <div class="product_extras">

                <button class="product_cart_button" tabindex="0">Add to Cart</button>
                </div>
                </div>
                <div class="product_fav"><i class="fa fa-heart"></i></div>

                </div>
                </div></div></div><div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 153px;" tabindex="0" role="tabpanel" id="slick-slide03"><div><div class="featured_slider_item" style="width: 100%; display: inline-block;">
                <div class="border_active"></div>
                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="https://preview.colorlib.com/theme/onetech/images/featured_7.png" alt="" data-pagespeed-url-hash="3785603442" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                <div class="product_content">
                <div class="product_price">$379</div>
                <div class="product_name"><div><a href="product.html" tabindex="0">Lenovo IdeaPad</a></div></div>
                <div class="product_extras">

                <button class="product_cart_button" tabindex="0">Add to Cart</button>
                </div>
                </div>
                <div class="product_fav"><i class="fa fa-heart"></i></div>

                </div>
                </div></div><div><div class="featured_slider_item" style="width: 100%; display: inline-block;">
                <div class="border_active"></div>
                <div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="https://preview.colorlib.com/theme/onetech/images/featured_8.png" alt="" data-pagespeed-url-hash="4080103363" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                <div class="product_content">
                <div class="product_price">$225</div>
                <div class="product_name"><div><a href="product.html" tabindex="0">Digitus EDNET...</a></div></div>
                <div class="product_extras">

                <button class="product_cart_button" tabindex="0">Add to Cart</button>
                </div>
                </div>
                <div class="product_fav"><i class="fa fa-heart"></i></div>

                </div>
                </div></div></div></div></div></div>
                <div class="featured_slider_dots_cover"></div>
                </div>
                <!-- Product Panel -->

                <!-- Product Panel -->

                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="c-callout" style="background-color: #000000;;">
    <div class="c-callout__wrap">
        <span class="c-callout__icon" style="background-image:url(https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/newsletter-3.png);">
        </span>
        <div class="c-callout__message">
            <p>
                <strong>¿Quieres comprar ahora?</strong>
            </p>
        </div>
        <a href="/subastaRapida" class="c-callout__btn">
                Subastas rápidas
        </a>
    </div>
</section>




<!--Footer-->

<footer id="footer">
    <div class="container">
      <h3>dRemate</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a class="btn btn-social-icon btn-twitter"><span class="fa fa-twitter"></span></a>
        <a class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
        <a class="btn btn-social-icon btn-instagram"><span class="fa fa-instagram"></span></a>
      </div>
      <div class="copyright">
        © Copyright <strong><span>dRemate</span></strong> 2020 - 3030. All Rights Reserved
      </div>
    </div>
  </footer>

<!--Footer-->
@endsection

@section('contenidoJSabajo')
<script src="https://use.fontawesome.com/c9d7a705d9.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <!-- Colocar js abajo-->
@endsection
