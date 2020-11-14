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



<div class="c-hero">
    <div class="c-hero__center">
        <h1 class="c-hero__title">SUBASTAS ONLINE D'REMATE</h1>
        <h2 class="c-hero__subtitle">
            ENCUENTRA TODO TIPO DE PRODUCTOS EN NUESTRA PÁGINA
        </h2>
        <hr style="margin-top: 25px;">
        <h5><span class="uppercase">Registrate ahora y empieza</span></h5>
        <a class="red button register" href="https://www.exleasingcar.si/es/registrarse">REGISTRARSE</a> 
        
        <div class="c-hero__feats">
            <a href="#" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/feat1.png">
                    <h2>Subastas<br>
                        En vivo</h2>
                        <span>Conoce más</span>
            </a>
            <a href="#" class="c-hero__feat">
                <img src="https://auctionhouselondon.co.uk/wp-content/uploads/2015/11/results-2.png">
                    <h2>Resultados<br>
                        anteriores</h2>
                    <span>Conoce más</span>
            </a>
            <a href="#" class="c-hero__feat">
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

<!--
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root", "","db_dremate");
    if($conn->connect_error){
        die("Connection failed:". $conn->connect_error);
    }

    $sql = "SELECT id,username,password from inicio";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
        }
        echo"</table>";
    }
    else{
        echo"0 result";
    }

    $conn->close();
    ?>

</table>
-->

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
