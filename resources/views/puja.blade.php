@extends('layouts.app')


@section('cont_cabe')
    <title>Subtitulo - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
   
  
@endsection


@section('contenido')
<!--
<div id="page-context" class="simple">
    <div id="wrap">
        <div id="video-home-block" style="height:553px;">
            <div class="video-background">
            </div>
            <div id="video-home-content">
                <a class="submit fancyvideo css_1" rel="tooltip" tittle href="#">
                    <div class="video-play"></div>
                </a>
                <h1>
                    <strong>Subastas online</strong>
                    <br>
                    Variedad de productos
                </h1>
                <hr>
                <h6>
                    <span class="uppercase">REGISTRATE Y EMPIEZA</span>
                    <br>
                    Todas las funciones de subastas disponibles!
                </h6>
                <a class="red button register" href="#">REGISTRARSE GRATIS</a>
            </div>
        </div>
        <div class="home-block" id="simple-buy">
            <div class="home-block-content">
                <h3>Es fácil comprar productos en las subastas</h3>
                <table>
                    <tbody>
                        <tr class="d-done">
                                            <td colspan="4" class="simple-buy" height="118"></td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                <img src="https://www.exleasingcar.de/VER3/images/img1.png" alt="Auto from Europe">
                                </div>
                                <div>
                                    REGISTRATE
                                    <div></div>
                                </div>
                            </td>
                            <td>
                                <div>
                                <img src="data:image/png;base64,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" alt="Auto from Europe">
                                </div>
                                <div>
                                    ELIGE
                                    <div></div>
                                </div>
                            </td>
                            <td>
                                <div>
                                <img src="https://www.exleasingcar.hr/VER3/images/img3.png" alt="Auto from Europe">
                                </div>
                                <div>
                                    OFERTA
                                    <div></div>
                                </div>
                            </td>
                            <td>
                                <div>
                                <img src="https://www.exleasingcar.it/VER3/images/img4.png" alt="Auto from Europe">
                                </div>
                                <div>
                                    GANA
                                    <div></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>    
                <a href="#" class="dark button css_3">VER SUBASTAS ACTUALES</a>
            </div>
        </div>
        <div class="home-category">
            <div class="contenedor">
                <h2>Descubre nuestras categorías</h2>
                <div class="description"></div>
                <div class="categories-slider">
                    <div class="slick-slider slick-initialized" dir="ltr">
                        <button type="button" data-role="none" class="slick-arrow slick-prev slick-disabled" style="display: block;">Previous</button>
                        <div class="slick-list">
                            <div class="slick-track" style="width:2853px;opacity:1;transform:traslate3d(0px, 0px, 0px);">
                                <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width:317px;">
                                    <div>
                                        <div class="category-slide" tabindex="-1" style="width:100%; display:inline-block;">
                                            <a title="Agriculture" href="#">
                                                <img alt="Agriculture" height="280" width="400" src="https://img.twa.nl/10734138?width=400&amp;height=280&amp;watermark=none">
                                                <div class="category-name">Agriculture</div>
                                            </a>    
                                        </div>
                                    </div>
                                </div>
                                <div data-index="1" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:317px">
                                    <div>
                                        <div class="category-slide" tabindex="-1" style="width:100%;display:inline-block;">
                                            <a title="Metal Working" href="#">
                                                <img alt="Metal Working" height="280" width="400" src="https://img.twa.nl/10734139?width=400&amp;height=280&amp;watermark=none">
                                                <div class="category-name">Metal Working</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-index="2" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:317px">
                                    <div>
                                        <div class="category-slide" tabindex="-1" style="width:100%;display:inline-block;">
                                            <a title="Construction and Earth Moving" href="#">
                                                <img alt="Construction and Earth Moving" height="280" width="400" src="https://img.twa.nl/10734140?width=400&amp;height=280&amp;watermark=none">
                                                <div class="category-name">Construction and Earth Moving</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-index="3" class="slick-slide" tabindex="-1" aria-hidden="true" style="outline:none; width:317px;">
                                    <div>
                                        <div class="category-slide" tabindex="-1" style="width:100%;display:inline-block;">
                                            <a title="Food Machinery" href="#">
                                                <img alt="Food Machinery" height="280" width="400" src="https://img.twa.nl/10734145?width=400&amp;height=280&amp;watermark=none">
                                                <div class="category-name">Food Machinery</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-index="4" class="slick-slide" tabindex="-1" aria-hidden="true" style="outline:none; width:317px;">
                                    <div>
                                        <div class="category-slide" tabindex="-1" style="width:100%;display:inline-block;">
                                            <a title="Transport and Logistics" href="#">
                                                <img alt="Transport and Logistics" height="280" width="400" src="https://img.twa.nl/10734146?width=400&amp;height=280&amp;watermark=none">
                                                <div class="category-name">Transport and Logistics</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-categories">
            <div class="grid">
                <figure class="effect-zoe">
                    <img src="http://www.verypersonalconsulting.com/coaching/wp-content/uploads/2015/09/articolo2.jpg" alt="img25">
                    <figcaption>
                        <h2>
                            Title1
                            <span>Name</span>
                        </h2>
                        <p class="description">  
                            Zoe never had the patience of her sisters. She deliberately punched the bear in his face.
                        </p>
                    </figcaption> 
                </figure>
                <figure class="effect-zoe">
                    <img src="https://www.10adventures.com/wp-content/uploads/2018/12/CAN-AB-Banff-GlacierLake-Backpacking-03-Glacier-Lake.jpg" alt="img26">
                    <figcaption>
                        <h2>
                            Title2
                            <span>Name</span>
                        </h2>
                        <p class="description">  
                            Zoe never had the patience of her sisters. She deliberately punched the bear in his face.
                        </p>
                    </figcaption> 
                </figure>
            </div>
        </div>
        <div class="home-categories">
            <div class="grid">
                <figure class="effect-zoe">
                    <img src="https://m.media-amazon.com/images/I/71f367o4e0L._SS500_.jpg" alt="img27">
                    <figcaption>
                        <h2>
                            Title3
                            <span>Name</span>
                        </h2>
                        <p class="description">  
                            Zoe never had the patience of her sisters. She deliberately punched the bear in his face.
                        </p>
                    </figcaption> 
                </figure>
                <figure class="effect-zoe">
                    <img src="https://resources.tulipcremation.com/wp-content/uploads/2018/10/Vo7YbYQQ8iyOo4J9bOoj_ggb24-1352x676.jpg" alt="img28">
                    <figcaption>
                        <h2>
                            Title4
                            <span>Name</span>
                        </h2>
                        <p class="description">  
                            Zoe never had the patience of her sisters. She deliberately punched the bear in his face.
                        </p>
                    </figcaption> 
                </figure>
            </div>
        </div>
    </div>
</div>
-->


<!--
<div class="navbar navbar-inverse">
    <div class="contenedorB">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">ASDASD</a>
                </div>
                <div class="navbar-collapse collapse" id="mobile_menu">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About us<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Uno</a></li>
                                <li><a href="#">Dos</a></li>
                                <li><a href="#">Tres</a></li>
                                <li><a href="#">Cuatro</a></li>
                                <li><a href="#">Cinco</a></li>
                                <li><a href="#">Seis</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Welcome</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li>
                            <form action="" class="navbar-form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="search" name="search" id="" placeholder="Search Anything Here..." class="form-control">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-user"></span> Profile
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-log-in"></span> Login / Sign Up 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Login</a>
                                </li>
                                <li>
                                    <a href="#">Sign Up</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">D'REMATE</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CATEGORIAS
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Articulos de moda</a>
                <a class="dropdown-item" href="#">Productos tecnologicos</a>
                <a class="dropdown-item" href="#">Articulos para el hogar</a>
                <a class="dropdown-item" href="#">Deportes y ocio</a>
                <a class="dropdown-item" href="#">Antigüedades</a>
                <a class="dropdown-item" href="#">Articulos de jardineria</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Ver todas</a>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">SUBASTAS EN VIVO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">NOVEDADES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">REGISTRATE</a>
        </li>
      </ul>
      <ul>
          <li>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </li>
      </ul>
      
    </div>
  </nav>

<header class="c-top-bar">
    <!--<div class="c-top-bar__message">
        <strong>ASD</strong>
    </div>-->
    <a class="c-top-bar__logo" href="/" title="Página principal">
        <img src="https://i.pinimg.com/originals/76/29/09/76290974c6af0f8a9c77a629f11d27b5.png" alt="Logoy">
    </a>
    <ul id="menu-top-bar-navigation-1" class="c-top-bar__nav">
        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-2058">
            <a href="/" aria-current="page">Home</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1823">
            <a href="#">Categorias</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2936">
            <a href="#">Subastas en vivo</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1825">
            <a href="#">Subastas finalizadas</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1880">
            <a href="#">Novedades</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3021">
            <a href="#">Registrate</a>
        </li>
    </ul>
</header>

<div class="c-hero">
    <div class="c-hero__center">
        <h1 class="c-hero__title">SUBASTAS ONLINE D'REMATE</h1>
        <h2 class="c-hero__subtitle">
            ENCUENTRA TODO TIPO DE PRODUCTOS EN NUESTRA PÁGINA
        </h2>
        <p>
            <a href="#" class="c-hero__next">
                <span class="c-hero__next__title">a</span>
                <!-- <span class="c-hero__next__date">LIVE STREAM ONLY. REMOTE BIDDING ONLY.</span> -->
            </a>
        </p>
        <div class="c-hero__feats">
            <a href="#" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/results-2.png">
                    <h2>Resultados<br>
                        anteriores</h2>
                    <span>Conoce más</span>
            </a>
            <a href="#" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/feat1.png">
                    <h2>Productos<br>
                        Disponibles</h2>
                        <span>Conoce más</span>
            </a>
            <a href="#" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/valuation-2.png">
                    <h2>Productos por categorias</h2>
                        <span>Conoce más</span>
            </a>
            <a href="#" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/feat1.png">
                     <h2>Subastas<br>
                    En vivo</h2>
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

<!--<section class="c-posts">
    <h2 class="c-posts__title">From the blog</h2>
    <h3 class="c-posts__subtitle">Industry & Property News</h3>
    <div class="c-posts__wrap">
        <a href="#" class="c-posts__item" style="background-image: url(https://auctionhouselondon.co.uk/wp-content/uploads/2020/01/bigstock-Double-Exposure-Investment-B-306019798.jpg);">
            <div class="c-posts__item__overlay">
                 <div class="c-posts__item__content">
                    <h2 class="c-posts__item__title">Why 2020 is hailedas a good time to invest in property</h2>
                    <h3 class="c-posts__item__excerpt">
                        <p>
                            Halifax's latest house price index shows that UK house prices were 2.1% higher in November 2019 compared to a year ago.
                        </p>
                    </h3>
                </div>
            </div>
        </a>
        <a href="#" class="c-posts__item" style="background-image: url(https://auctionhouselondon.co.uk/wp-content/uploads/2020/01/bigstock-London-House-Traditional-Brick-239461486.jpg);">
            <div class="c-posts__item__overlay">
                <div class="c-posts__item__content">
                    <h2 class="c-posts__item__title">House prices rise 3.6% in UK’s regeneration zones</h2>
                    <h3 class="c-posts__item__excerpt">
                        <p>
                            Data compiled by CBRE shows that property located close to regeneration regions in the UK witnessed a price increase of an average 3.6% in 2019.
                        </p>
                    </h3>
                </div>
            </div>
        </a>
        <a href="#" class="c-posts__item" style="background-image: url(https://auctionhouselondon.co.uk/wp-content/uploads/2020/01/ahl-2.jpg);">
            <div class="c-posts__item__overlay">
                <div class="c-posts__item__content">
                    <h2 class="c-posts__item__title">Britain’s BTL market rebounds, figures show</h2>
                    <h3 class="c-posts__item__excerpt">
                        <p>
                            The buy-to-let market in Britain in 2019 has picked up and gained momentum. 
                        </p>
                    </h3>
                </div>
            </div>
        </a>
        <a href="#" class="c-posts__item" style="background-image: url(https://auctionhouselondon.co.uk/wp-content/uploads/2020/01/ahl-1.jpg);">
            <div class="c-posts__item__overlay">
                <div class="c-posts__item__content">
                    <h2 class="c-posts__item__title">Experts urging people to invest in buy to let amid booming tourist market</h2>
                    <h3 class="c-posts__item__excerpt">
                        <p>
                            Tourism is booming in Britain. According to Visit Britain’s forecast for 2019, inbound visits to the UK are up 3% to 38.9 million.
                        </p>
                    </h3>
                </div>
            </div>
        </a>
        <a href="#" class="c-posts__item" style="background-image: url(https://auctionhouselondon.co.uk/wp-content/uploads/2019/11/Why-young-professionals.jpg);">
            <div class="c-posts__item__overlay">
                <div class="c-posts__item__content">
                    <h2 class="c-posts__item__title">Why young professionals are opting to rent HMOs</h2>
                    <h3 class="c-posts__item__excerpt">
                        <p>
                            Savvy investors recognise that HMOs (Houses of Multiple Occupancy) make excellent investments, often providing higher monthly yields that standard buy-to-let properties. 
                        </p>
                    </h3>
                </div>
            </div>
        </a>
        <a href="#" class="c-posts__item" style="background-image: url(https://auctionhouselondon.co.uk/wp-content/uploads/2019/11/study-shows-rents-in-britain.jpg);">
            <div class="c-posts__item__overlay">
                <div class="c-posts__item__content">
                    <h2 class="c-posts__item__title">Study shows rents in Britain unaffected by tenant fees ban</h2>
                        <h3 class="c-posts__item__excerpt">
                            <p>
                                Despite warnings being made that rents were set to rise when the government’s ban on tenancy fees came into force, there is little evidence to show the cost of rent has increased.
                             </p>
                        </h3>
                </div>
            </div>
        </a>
    </div>
    <div class="c-posts__btns">
        <a href="#" class="c-posts__btn">
            Read More Articles
        </a>
    </div>
</section> -->


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
                    <!--asd-->
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
                    <!--asd-->
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
                   <!--asd-->
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
                    <!--asd-->
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
                    <!--asd-->
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
                    <!--asd-->
                </p>
            </figcaption> 
        </figure>
    </div>
</div>
<br>
<div class="c-posts__btns">
    <a href="/our-blog/" class="c-posts__btn">Explora más</a>
</div>
</section>

<section class="c-callout" style="background-color: #000000;;">
    <div class="c-callout__wrap">
        <span class="c-callout__icon" style="background-image:url(https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/newsletter-3.png);">
        </span>
        <div class="c-callout__message">
            <p>
                <strong>¿Quieres comprar ahora? Mira la sección de Subastas rápidas</strong>
            </p>
        </div>
        <a href="#" class="c-callout__btn">
                Subastas
        </a>
    </div>
</section>


<!--<footer class="o-footer">
    <section class="c-footer">
        <div class="o-wrapper">
            <div class="c-footer__widgets">
                <section class="c-footer__col nav_menu-2 widget_nav_menu"> 
                    <h3 class="c-footer__title">CONTENIDO</h3>
                    <div class="menu-footer-column-1-container">
                        <ul id="menu-footer-column-1" class="menu">
                            <li id="menu-item-2080" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2080"><a href="#">¿Quiénes somos?</a></li>
                            <li id="menu-item-2543" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2543"><a href="#">Politicas y privacidad</a></li>
                            <li id="menu-item-1829" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1829"><a href="#">Atención al cliente</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="c-footer__bottom"></div>
        </div>
    </section>
</footer>
-->

<footer>
<div class="container">
    <div class="row">

        <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
                <div class="widget">
                <img src="https://i.pinimg.com/originals/76/29/09/76290974c6af0f8a9c77a629f11d27b5.png" class="img-responsive center" alt="" width="200" height="75" style="height: 150px;width: 150px;">
                </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
                <div class="widget">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
                <div class="widget">
                    <h4>CONTENIDO</h4>
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#ventanaModalQuienes">¿Quiénes somos?</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#ventanaModalPolitica">Política y privacidad</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#ventanaModalAtencion">Atención al cliente</a></li>


                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
                <div class="widget">
                    <h4>CONTACTENOS</h4>
                    <ul>
                        <li>
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                            </span> 994212883
                        </li>
                        <li>
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                            </span> losveintisiete@gmail.com
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="text-left">
                        <p>&copy;Copyright - Grupo LosVeintisiete. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>

@endsection

@section('contenidoJSabajo')
<script src="https://use.fontawesome.com/c9d7a705d9.js"></script>
    <!-- Colocar js abajo-->
@endsection
