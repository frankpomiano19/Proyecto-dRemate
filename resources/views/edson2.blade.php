{{-- Estuve avanzando el código aparte, falta unirlo al blade que corresponde, ya más tarde lo hago--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto X</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto:300&display=swap");
@import url("https://fonts.googleapis.com/css?family=Lato");

/* Swiper */

.swiper-container {
    width: 100%;
    height: 300px;
    margin-left: auto;
    margin-right: auto;
}

.swiper-slide {
    background-size: cover;
    background-position: center;
}

.gallery-top {
    height: 80%;
    width: 100%;
}

.gallery-thumbs {
    height: 20%;
    box-sizing: border-box;
    padding: 10px 0;
}

.gallery-thumbs .swiper-slide {
    height: 100%;
    opacity: 0.4;
}

.gallery-thumbs .swiper-slide-thumb-active {
    opacity: 1;
}

#interes {
    overflow: hidden;
}


/* Boton subasta */

#boton-subasta {
    width: 180px;
    height: 50px;
    border-radius: 4px;
    border: solid rgb(102, 0, 0) 1px;
    background: #5c1813;
    cursor: pointer;
    transition: all 0.3s;
    margin-left: auto;
    margin-right: auto;
    width: 150px;
    height: 50px;
    text-align: center;
    color: white;
}

#boton-subasta span {
    color: white;
    font-family: "Roboto", sans-serif;
}

#boton-subasta:hover {
    background: #440709;
}


/* Tabs */

.tabs {
    width: 100%;
    float: none;
    list-style: none;
    position: relative;
    margin: 20px 0 0 10px;
    text-align: left;
}

.tabs li {
    float: left;
    display: block;
}

.tabs input[type=radio] {
    position: absolute;
    top: 0;
    left: -9999px;
}

.tabs label {
    width: 120px;
    display: block;
    padding: 14px 21px;
    border-radius: 2px 2px 0 0;
    font-size: 14px;
    font-weight: normal;
    text-transform: uppercase;
    background: #ffc2ba;
    cursor: pointer;
    position: relative;
    top: 4px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.tabs label:hover {
    background: #9c1200;
}

.tabs .tab-content {
    z-index: 2;
    display: none;
    overflow: hidden;
    width: 100%;
    font-size: 15px;
    line-height: 25px;
    padding: 25px;
    position: absolute;
    top: 53px;
    left: 0;
    background: #ffffff;
    min-height: 400px;
}

.tabs [id^=tab]:checked+label {
    top: 0;
    padding-top: 17px;
    background: #5c1813;
    color: #fff;
}

.tabs [id^=tab]:checked~[id^=tab-content] {
    display: block;
}


/* Comentarios */

a {
    color: #03658c;
    text-decoration: none;
}

ul {
    list-style-type: none;
}


/* Lista de Comentarios*/

.comments-container {
    margin: 30px auto 15px;
    width: 100%;
}

.comments-container h1 {
    font-size: 36px;
    color: #283035;
    font-weight: 400;
}

.comments-list {
    margin-top: 30px;
    position: relative;
}


/* Lineas / Detalles*/

.comments-list:before {
    content: '';
    width: 2px;
    height: 100%;
    background: #c7cacb;
    position: absolute;
    left: 32px;
    top: 0;
}

.comments-list:after {
    content: '';
    position: absolute;
    background: #c7cacb;
    bottom: 0;
    left: 27px;
    width: 7px;
    height: 7px;
    border: 3px solid #dee1e3;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.reply-list:before,
.reply-list:after {
    display: none;
}

.reply-list li:before {
    content: '';
    width: 60px;
    height: 2px;
    background: #c7cacb;
    position: absolute;
    top: 25px;
    left: -55px;
}

.comments-list li {
    margin-bottom: 15px;
    display: block;
    position: relative;
}

.comments-list li:after {
    content: '';
    display: block;
    clear: both;
    height: 0;
    width: 0;
}

.reply-list {
    padding-left: 88px;
    clear: both;
    margin-top: 15px;
}


/* Avatar */

.comments-list .comment-avatar {
    width: 65px;
    height: 65px;
    position: relative;
    z-index: 99;
    float: left;
    border: 3px solid #FFF;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.comments-list .comment-avatar img {
    width: 100%;
    height: 100%;
}

.reply-list .comment-avatar {
    width: 50px;
    height: 50px;
}

.comment-main-level:after {
    content: '';
    width: 0;
    height: 0;
    display: block;
    clear: both;
}


/*Caja del Comentario*/

.comments-list .comment-box {
    width: 100%;
    float: right;
    position: relative;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
}

.comments-list .comment-box:before,
.comments-list .comment-box:after {
    content: '';
    height: 0;
    width: 0;
    position: absolute;
    display: block;
    border-width: 10px 12px 10px 0;
    border-style: solid;
    border-color: transparent #FCFCFC;
    top: 8px;
    left: -11px;
}

.comments-list .comment-box:before {
    border-width: 11px 13px 11px 0;
    border-color: transparent rgba(0, 0, 0, 0.05);
    left: -12px;
}

.reply-list .comment-box {
    width: 100%;
}

.comment-box .comment-head {
    background: #FCFCFC;
    padding: 10px 12px;
    border-bottom: 1px solid #E5E5E5;
    overflow: hidden;
    -webkit-border-radius: 4px 4px 0 0;
    -moz-border-radius: 4px 4px 0 0;
    border-radius: 4px 4px 0 0;
}

.comment-box .comment-head i {
    float: right;
    margin-left: 14px;
    position: relative;
    top: 2px;
    color: #A6A6A6;
    cursor: pointer;
    -webkit-transition: color 0.3s ease;
    -o-transition: color 0.3s ease;
    transition: color 0.3s ease;
}

.comment-box .comment-head i:hover {
    color: #03658c;
}

.comment-box .comment-name {
    color: #283035;
    font-size: 14px;
    font-weight: 700;
    float: left;
    margin-right: 10px;
}

.comment-box .comment-name a {
    color: #283035;
}

.comment-box .comment-head span {
    float: left;
    color: #999;
    font-size: 13px;
    position: relative;
    top: 1px;
}

.comment-box .comment-content {
    background: #FFF;
    padding: 12px;
    font-size: 15px;
    color: #595959;
    -webkit-border-radius: 0 0 4px 4px;
    -moz-border-radius: 0 0 4px 4px;
    border-radius: 0 0 4px 4px;
}

.comment-box .comment-name.by-author,
.comment-box .comment-name.by-author a {
    color: #03658c;
}

.comment-box .comment-name.by-author:after {
    content: 'autor';
    background: #03658c;
    color: #FFF;
    font-size: 12px;
    padding: 3px 5px;
    font-weight: 700;
    margin-left: 10px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}


/* Contenedor fluid-fix */

.wrapright {
    float: left;
    width: 100%;
}

.right {
    margin-left: 80px;
}

.left {
    float: left;
    width: 80px;
    margin-left: -100%;
}


/* Monedas */

.coin {
    width: 50px;
    height: 50px;
    border: 30px
}

.coin:hover {
    top: -10px;
    border-radius: 50%;
    transform: translate(0, -8px);
    transition: all .3s ease-in-out;
    box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.8);
    cursor: pointer;
}

.cont-coin {
    width: 30%;
    height: 80px;
}


/* Otras cosas */

.separador {
    margin: 8px 10px 40px;
    height: 2px;
    background: #440709;
}

.panel {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 15px;
    height: 100%;
    -webkit-box-shadow: 5px 5px 9px 0px rgba(45, 49, 56, 0.5);
    -moz-box-shadow: 5px 5px 9px 0px rgba(45, 49, 56, 0.5);
    box-shadow: 5px 5px 9px 0px rgba(45, 49, 56, 0.5);
    border-bottom: 50px;
}

.row {
    margin-bottom: 30px;
}

.flex {
    display: flex;
    justify-content: center;
    align-items: center;
}

#vendedor {
    text-align: right;
    color: #348aa7;
    font-weight: 700;
}

.acuerdo {
    border: black 2px solid;
    min-height: 60px;
    max-width: 280px;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin-bottom: 20px;
    padding: 10px;
    font-style: italic;
    margin-left: auto;
    margin-right: auto;
}

#nuevo-acuerdo {
    border: black 2px dotted;
    font-size: larger;
    font-style: normal;
    background-color: #dbdbdb;
}

#nuevo-acuerdo:hover {
    cursor: pointer;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance: textfield;
}

.contenedor-mensaje {
    border: solid 1px black;
    height: 50px;
    border-radius: 8px;
    -webkit-box-shadow: 0px 5px 2px 2px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 5px 2px 2px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 5px 2px 2px rgba(0, 0, 0, 0.75);
    width: 90%;
    margin: 0 10px;
}

.hide {
    display: none;
}

.enviar-mensaje {
    float: right;
    top: 9px;
    right: 10px;
    color: #fff;
    border: none;
    background: #81221b;
    font-size: 14px;
    text-transform: uppercase;
    line-height: 1;
    padding: 6px 10px;
    border-radius: 10px;
    outline: none;
    transition: #123456 .2s ease;
    padding: -8px;
}

.enviar-mensaje:hover {
    background: #5c1813;
}

.form__field {
    font-family: inherit;
    width: 100%;
    border: 0;
    border-bottom: 2px solid #500000;
    outline: 0;
    font-size: 1rem;
    color: rgb(0, 0, 0);
    padding: 0 10px;
    background: transparent;
    transition: 0.2s;
}

#show-responder {
    cursor: pointer;
}

#show-responder:hover {
    text-decoration: underline;
}

.img-ajustada {
    max-width: 100%;
    max-height: 100%;
}

.panel-sup {
    margin-bottom: 20px;
}

.acuerdo body {
    font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
    background: #eeeded;
}

.card-text {
    height: 70px;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}


/* Responsive */

@media only screen and (max-width: 576px) {}
    </style>


</head>

<body>
    <!-- Cabecera -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>



    <!-- Contenido -->
    <div class="container-lg" style="margin-top: 20px;">
        <div class="row">
            <div class="panel-sup col-lg-8 col-md-7 col-12">
                <div id="panel-1" class="panel">
                    <div style="width: 80%; float: left;">
                        <h6>Categorías > <a href="#"> Tecnología</a></h6>
                        <h3>Nombre del producto :p</h3>
                    </div>
                    <div id="iconos" style="float: right; bottom: auto;">
                        <i class="fa fa-share"></i> <i class="fas fa-heart"></i>♥
                    </div>
                    <!-- Swiper -->
                    <div style="height: 500px; width: 100%; background-color: black; clear: both;">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide flex"><img src="ima1.jpg" alt="" class="img-ajustada"></div>
                                <div class="swiper-slide flex"><img src="ima2.jpg" alt="" class="img-ajustada"></div>
                                <div class="swiper-slide flex"><img src="ima3.jpg" alt="" class="img-ajustada"></div>
                                <div class="swiper-slide flex"><img src="ima4.jpg" alt="" class="img-ajustada"></div>
                            </div>
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" style="background-image:url(ima1.jpg)"></div>
                                <div class="swiper-slide" style="background-image:url(ima2.jpg)"></div>
                                <div class="swiper-slide" style="background-image:url(ima3.jpg)"></div>
                                <div class="swiper-slide" style="background-image:url(ima4.jpg)"></div>
                            </div>
                        </div>
                    </div>
                    <div id="vendedor">
                        Ofrecido por <span><a href="#">Rodritimus</a></span>
                    </div>
                </div>
            </div>

            <div class="panel-sup col-lg-4 col-md-5 col-12" id="info-prod" style="padding-top: 0px;">
                <div id="panel-2" class="panel" style="padding: 40px;">
                    <div>
                        <h6>Oferta más alta</h6>
                        <h1 class="text-center">S/<span>500</span></h1>
                        <h6 class="text-right"><small>Ver historial de pujas</small></h6>
                    </div>
                    <div class="separador"></div>
                    <div>
                        <h6>Tiempo restante</h6>
                        <h1 class="text-center"><span>00:00:00:00</span></h1>
                        <h6 class="text-right"><small>La subasta finaliza el 00/00/00</small></h6>
                    </div>
                    <div class="separador"></div>
                    <div>
                        <h6>Realizar una oferta</h6>
                        <div class="flex cont-coin" style="width: 100%;">
                            <div class="flex cont-coin">
                                <img class="coin" id="coin-5" src="coin1.png" alt="coin-5">
                            </div>
                            <div class="flex cont-coin">
                                <img class="coin" id="coin-20" src="coin2.png" alt="coin-20">
                            </div>
                            <div class="flex cont-coin">
                                <img class="coin" id="coin-100" src="coin3.png" alt="coin-100">
                            </div>
                        </div>
                        <form action="">
                            <div class="flex">
                                <span style="font-size: 1.8rem;">S/</span><input type="number" min="501" class="message-input" style="width: 100%; font-size: 1.8rem; " placeholder="">
                            </div>
                            <small>Min. oferta: S/501</small><br>
                            <div class="flex">

                                <button id="boton-subasta">Ofertar</button>
                            </div>
                        </form>
                    </div>
                    <div class="separador"></div>
                </div>
            </div>

            <div class="panel-sup col-md-8 col-sm-12">
                <div id="panel-3" class="panel" style="min-height: 500px;">
                    <ul class="tabs" role="tablist">
                        <li>
                            <input type="radio" name="tabs" id="tab1" checked />
                            <label for="tab1" role="tab" aria-selected="true" aria-controls="panel1" tabindex="0">Descripción</label>
                            <div id="tab-content1" class="tab-content" role="tabpanel" aria-labelledby="description" aria-hidden="false">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                    laborum."
                                </p>
                            </div>
                        </li>

                        <li>
                            <input type="radio" name="tabs" id="tab2" />
                            <label for="tab2" role="tab" aria-selected="false" aria-controls="panel2" tabindex="0">Opiniones</label>
                            <div id="tab-content2" class="tab-content" role="tabpanel" aria-labelledby="comentarios" aria-hidden="true">
                                <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
                                    enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                    consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                    nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla?</p>
                            </div>
                        </li>

                        <li>
                            <input type="radio" name="tabs" id="tab3" />
                            <label for="tab3" role="tab" aria-selected="false" aria-controls="panel3" tabindex="0">Garantía</label>
                            <div id="tab-content3" class="tab-content" role="tabpanel" aria-labelledby="specification" aria-hidden="false">
                                <p>"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                        </li>
                        <div style="clear: both;"></div>
                    </ul>


                    <br>
                </div>
            </div>
            <div class="panel-sup col-md-4 col-sm-12">
                <div id="panel-4" class="panel">
                    <h2>Ubicación</h2>
                    <div></div>
                </div>
            </div>
            <div class="panel-sup col-md-8 col-sm-12" style="min-height: 600px">
                <div id="panel-5" class="panel">
                    <!-- Contenedor Principal -->
                    <div class="comments-container">
                        <h1>Negociación de acuerdos</h1>

                        <ul id="comments-list" class="comments-list">
                            <li>
                                <div class="comment-main-level">
                                    <div class="wrapright">
                                        <div class="right">
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name by-author"><a href="#">Jose Manuel, desarrollador Backend del proyecto "DRemate"</a></h6>
                                                    <span>hace 20 minutos</span>
                                                    <i class="fa fa-reply"></i>
                                                    <i class="fa fa-heart"></i>
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                </div>
                                                <small id="show-responder">Responder</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="left">
                                        <!-- Avatar -->
                                        <div class="comment-avatar" style="float: ;"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>

                                    </div>
                                </div>
                                <!-- Respuestas de los comentarios -->
                                <ul class="comments-list reply-list">
                                    <li>
                                        <div class="wrapright">
                                            <div class="right">
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name"><a href="#">Lorena Rojero</a></h6>
                                                        <span>hace 10 minutos</span>
                                                        <i class="fa fa-reply"></i>
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="comment-content">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="left">
                                            <!-- Avatar -->
                                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="wrapright">
                                            <div class="right">
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name by-author"><a href="#">Agustin Ortiz</a></h6>
                                                        <span>hace 10 minutos</span>
                                                        <i class="fa fa-reply"></i>
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="comment-content">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                    </div>
                                                </div>
                                                <br>
                                                <div>
                                                    <div id="rpta-nivel-2" style="clear: right; border: none;" class="hide">
                                                        <form action="">
                                                            <div style="float:left; width:100%; height: 38px;">
                                                                <div class="flex" style="margin-right: 90px;height: 38px; padding: 0 10px;">
                                                                    <input type="text" class="message-input form__field" style="width: 100%; " placeholder="Escribe un mensaje...">
                                                                </div>
                                                            </div>
                                                            <div class="flex" style="float: right; width: 80px; margin-left: -80px; height: 38px;">
                                                                <button class="enviar-mensaje">Enviar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="left">
                                            <!-- Avatar -->
                                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <div class="comment-main-level">
                                    <div class="wrapright">
                                        <div class="right">
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a href="#">Lorena Rojero</a></h6>
                                                    <span>hace 10 minutos</span>
                                                    <i class="fa fa-reply"></i>
                                                    <i class="fa fa-heart"></i>
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                </div>
                                                <small id="show-responder">Responder</small>
                                                <div>
                                                    <div id="rpta-nivel-2" style="clear: right; border: none;" class="hide">
                                                        <form action="">
                                                            <div style="float:left; width:100%; height: 38px;">
                                                                <div class="flex" style="margin-right: 90px;height: 38px; padding: 0 10px;">
                                                                    <input type="text" class="message-input form__field" style="width: 100%; " placeholder="Escribe un mensaje...">
                                                                </div>
                                                            </div>
                                                            <div class="flex" style="float: right; width: 80px; margin-left: -80px; height: 38px;">
                                                                <button class="enviar-mensaje">Enviar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="left">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div style="width: 100%;" class="flex">
                            <div class="contenedor-mensaje">
                                <form action="">
                                    <div style="float:left; width:100%; height: 48px;">
                                        <div class="flex" style="margin-right: 90px;height: 48px; padding: 0 10px;">
                                            <input type="text" class="message-input form__field" style="width: 100%; " placeholder="Hacer una pregunta...">
                                        </div>
                                    </div>
                                    <div class="flex" style="float: right; width: 80px; margin-left: -80px; height: 48px;">
                                        <button class="enviar-mensaje">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-sup col-md-4 col-sm-12">
                <div id="panel-6" class="panel">
                    <h2>Acuerdos Fijados</h2><br><br><br>
                    <div class="acuerdo flex" id="nuevo-acuerdo">
                        <span id="texto-nuevo-acuerdo">Agregar un acuerdo</span>
                        <form action=" " style="display: none;" id="inputAcuerdo">
                            <input type="text ">
                            <button type="submit ">Agregar</button>
                        </form>
                    </div>

                    <div class="acuerdo flex">
                        &quotdsd&quot
                    </div>
                    <div class="acuerdo flex">
                        &quotAasdasd&quot
                    </div>
                    <div class="acuerdo flex">
                        &quotAasdasd&quot
                    </div>
                </div>
            </div>
            <div class="panel-sup col-12 ">
                <div id="panel-7 " class="panel " style="width: 100%; padding: 0 30px; overflow: hidden; ">
                    <h2>Ofertas destacadas</h2>
                    <div class="row">
                        <div style="padding: 10px;">
                            <div class="card" style="width: 14rem; margin: 10px;">
                                <a href="#"><img class="card-img-top" src="coin02.png" alt="coin02.png"></a>

                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">Productooand</h5>
                                    </a>
                                    <p class="card-text">Breve descripcion asda asd asd ads ads a da sd asd asd hno oihj oiho ho ihoi hoi hoihjo ijo ijo i</p>
                                    <small>Lima, Perú</small>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 10px;">
                            <div class="card" style="width: 14rem; margin: 10px;">
                                <a href="#"><img class="card-img-top" src="coin02.png" alt="coin02.png"></a>

                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">Productooand</h5>
                                    </a>
                                    <p class="card-text">Breve descripcion asda asd asd ads ads a da sd asd asd hno oihj oiho ho ihoi hoi hoihjo ijo ijo i</p>
                                    <small>Lima, Perú</small>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 10px;">
                            <div class="card" style="width: 14rem; margin: 10px;">
                                <a href="#"><img class="card-img-top" src="coin02.png" alt="coin02.png"></a>

                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">Productooand</h5>
                                    </a>
                                    <p class="card-text">Breve descripcion asda asd asd ads ads a da sd asd asd hno oihj oiho ho ihoi hoi hoihjo ijo ijo i</p>
                                    <small>Lima, Perú</small>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 10px;">
                            <div class="card" style="width: 14rem; margin: 10px;">
                                <a href="#"><img class="card-img-top" src="coin02.png" alt="coin02.png"></a>

                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">Productooand</h5>
                                    </a>
                                    <p class="card-text">Breve descripcion asda asd asd ads ads a da sd asd asd hno oihj oiho ho ihoi hoi hoihjo ijo ijo i</p>
                                    <small>Lima, Perú</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 
                    <div class="row ">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 400px; padding: 10px; background-color: blue; border: blueviolet solid 2px; ">
                            <div class="carta">
                                <div class="cont-cart-img ">
                                    <img class="img-ajustada " src="coin02.png" alt="coin02.png">
                                </div>

                            </div>
                            <div>
                                Título y otras cosas
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 180px; background-color: blue; border: blueviolet solid 2px; ">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="coin02.png" alt="coin02.png">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 180px; background-color: blue; border: blueviolet solid 2px; ">nlnln</div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 180px; background-color: blue; border: blueviolet solid 2px; ">nlnln</div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " style="height: 180px; background-color: blue; border: blueviolet solid 2px; ">nlnln</div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="coin02.png" alt="coin02.png">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="coin02.png" alt="coin02.png">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="coin02.png" alt="coin02.png">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="coin02.png" alt="coin02.png">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>

        </div>
        <br><br><br><br>

    </div>

    <!-- JavaScript -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>
    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    loop: true,
    loopedSlides: 5, //looped slides should be the same
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs,
    },
});

$(document).on('dragstart', 'img', function(evt) {
    evt.preventDefault();
});
$(document).ready(function() {
    $("#nuevo-acuerdo").click(function() {
        $('#texto-nuevo-acuerdo').hide(1);
        $('#inputAcuerdo').show(1);

    });
    $("#show-responder").click(function() {
        $("#rpta-nivel-2").toggleClass("hide");

    });

});
    </script>
</body>

</html>