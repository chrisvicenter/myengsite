<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="font/css/open-iconic-bootstrap.min.css">
    <link rel="shortcut icon" href="images/ninosICO.ico" />
    <title>My EngSite</title>
</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/dist/jquery.min.js"></script>
    <script src="popper.js/dist/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <div class="jumbotron ">
        <div class="container">
            <img src="images/ninosPNG.png" class="img-fluid imgjupng float-left" alt="Responsive image">
            <img src="images/myengsite.png" class="img-fluid imgjupngti " alt="Responsive image">
        </div>
    </div>
    <!--Menú de la página-->
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container ">
            <a class="navbar-brand" href="./"><span class="oi oi-home footer-address-icon" title="iphone" aria-hidden="true"></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item "><a class=" nav-link " href="./about.html ">Challenge</a></li>
                    <li class="nav-item "><a class="nav-link " href="./precios.html">Read</a></li>
                    <li class="nav-item "><a class="nav-link " href="# ">Write</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <br>
    <div class="container">
        <!--Breadcrumb página Home-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="./index.html">Home</a></li>
            </ol>
        </nav>

        <!--Carousel de página Home-->
        <div id="carouselControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
                <li data-target="#carouselControls" data-slide-to="1"></li>
                <li data-target="#carouselControls" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item itemimg active ">
                    <img class="d-block w-100 imgcarousel" src="images/logofinalJPG.jpg" alt="Primer slide">
                </div>
                <div class="carousel-item itemimg">
                    <img class="d-block w-100 imgcarousel" src="images/imgnav.jpg" alt="Segundo slide">
                </div>
                <div class="carousel-item itemimg  ">
                    <img class="d-block w-100 imgcarousel" src="images/imglbo.jpg" alt="Tercer slide" >

                </div>
            </div>
            <!--Texto del carousel-->
            <div class="captionCrl d-none d-md-block d-flex" href="#carouselControls">
                <div class="container">
                    <h2 class="text-center titlecapt">Welcome</h2>
                    <p class="txtcapt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at risus nec neque tincidunt luctus vel finibus mi.
                        Curabitur non tempor lorem, eget maximus nulla. Mauris venenatis ante non laoreet consequat. Nunc aliquam,
                        quam finibus tristique elementum, leo mauris convallis est, ac rhoncus odio purus eget purus. Phasellus quis consequat lectus,
                        et semper magna. Nam ultricies nulla neque, vitae hendrerit sem elementum ut.
                    </p>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>


        </div>
        <!--fin del carousel-->
        <hr>
        <div class="d-flex flex-wrap ">
            <div class="row">
                <div class="col d-flex flex-column align-items-start ">
                    <img class="imgcont" src="images/imgcnto.jpg">
                    <div class="caption d-none d-md-block d-flex ">
                        <h4 class="ml-3 colorcont">Lorem ipsum</h4>
                        <p class="ml-3 colorcont">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col d-flex flex-column align-items-start ">
                    <img class="imgcont" src="images/imgoso.jpg">
                    <div class="caption d-none d-md-block d-flex ">
                        <h4 class="ml-3 colorcont">Lorem ipsum</h4>
                        <p class="ml-3 colorcont">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
            </div>
            <div class="row rowtop">
                <div class="col d-flex flex-column align-items-start ">
                    <img class="imgcont" src="images/imgcnto.jpg">
                    <div class="caption d-none d-md-block d-flex ">
                        <h4 class="ml-3 colorcont">Lorem ipsum</h4>
                        <p class="ml-3 colorcont">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col d-flex flex-column align-items-start ">
                    <img class="imgcont" src="images/imgoso.jpg">
                    <div class="caption d-none d-md-block d-flex ">
                        <h4 class="ml-3 colorcont">Lorem ipsum</h4>
                        <p class="ml-3 colorcont">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--Footer de la página-->
        <div class="foot">
            <div class="row">
                <div class="col-sm-4 d-flex flex-column align-items-start ">
                    <h3>About Web</h3>
                    <hr style="border-color:white;">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec lorem eu risus imperdiet viverra consequat id lorem.
                        Curabitur vitae nisl in augue sodales porta. Ut vel sollicitudin dolor.</p>
                </div>
                <div class="col-sm-4 d-flex flex-column align-items-start">
                    <h3>Principal Teacher</h3>
                    <hr style="border-color:white;">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec lorem eu risus imperdiet viverra consequat id lorem.
                        Curabitur vitae nisl in augue sodales porta. Ut vel sollicitudin dolor.</p>
                </div>
                <div class="col-sm-4 d-flex flex-column align-items-start">
                    <h3>Social Network</h3>
                    <hr style="border-color:white;">
                    <a href="https://www.instagram.com/ ">Instagram</a>
                    <a href="https://www.facebook.com/ ">facebook</a>
                    <a href="https://www.twitter.com/ ">Twitter</a>
                </div>
            </div>
        </div>
    </div>

    <footer>

        <div class="container">
            <div class="row">
                <div class="col d-flex flex-column align-items-start">
                    <p>Tellme a story 2020 - NanoSoft100</p>
                </div>
                <div class="col d-flex flex-column align-items-end">
                    <p>Home&nbsp; &nbsp; &nbsp;Warning Legal
                        &nbsp; &nbsp; &nbsp; Cookies
                        &nbsp; &nbsp; &nbsp;Contact</p>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>