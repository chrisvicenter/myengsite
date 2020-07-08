<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="font/css/open-iconic-bootstrap.min.css">
    <link rel="shortcut icon" href="images/ninosICO.ico" />
    <title>My EnG Site</title>
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item "><a class=" nav-link " href="./about.html ">Groups</a></li>
                    <li class="nav-item "><a class="nav-link " href="./precios.html">Read</a></li>
                    <li class="nav-item "><a class="nav-link " href="# ">Write</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container colorcntner shadow">
        <!--Breadcrumb página Home-->
        <nav aria-label="breadcrumb " class="rowtop">
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
            <div class="carousel-inner carouseltmn">
                <div class="carousel-item text-center active ">
                    <img src="images/book-1822474_1920.jpg" alt="Primer slide" class="imgtmncrsl ">
                </div>
                <div class="carousel-item text-center ">
                    <img src="images/winter-1964361_1920.jpg" alt="Segundo slide" class="imgtmncrsl  ">
                </div>
                <div class="carousel-item text-center">
                    <img src="images/fantasy-2945514_1920.jpg" alt="Tercer slide" class="imgtmncrsl">
                </div>
            </div>
            <!--Texto del carousel-->
            <div class="captionCrl d-none d-md-block d-flex" href="#carouselControls">
                <div class="container">
                    <h2 class="text-center titlecapt">Welcome</h2>
                    <p class="txtcapt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at risus nec neque tincidunt luctus vel finibus mi.
                        Curabitur non tempor lorem, eget maximus nulla. Mauris venenatis ante non laoreet consequat.
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
        <h3 class="titlemost"><em>Most Outstanding</em></h3>
        <div class="d-flex flex-wrap ">
            <div class="carousel-inner">
                <div class="row">
                    <div class="col-sm-6  d-flex flex-column tmncont ">
                        <div class="text-center">
                            <img src="images/imgdrg.jpg" class="imgtmn">
                        </div>
                        <div class="caption d-none d-md-block d-flex ">
                            <h5 class="ml-2 colorcont sizetlt">Lorem ipsum</h5>
                            <p class="ml-2 colorcont sizecont">Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                    </div>
                    <div class="col-sm-6  d-flex flex-column tmncont ">
                        <div class="text-center">
                            <img src="images/book-4133883_1280.jpg" class="imgtmn">
                        </div>
                        <div class="caption d-none d-md-block d-flex ">
                            <h5 class="ml-2 colorcont sizetlt">Lorem ipsum</h5>
                            <p class="ml-2 colorcont sizecont">Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-inner rowtop">
                <div class="row">
                    <div class="col-sm-6  d-flex flex-column tmncont">
                        <div class="text-center">
                            <img src="images/imgvndo.jpg" class="imgtmn">
                        </div>
                        <div class="caption d-none d-md-block d-flex ">
                            <h5 class="ml-2 colorcont sizetlt">Lorem ipsum</h5>
                            <p class="ml-2 colorcont sizecont">Lorem ipsum dolor sit amet, consectetur</p>
                        </div>

                    </div>
                    <div class="col-sm-6  d-flex flex-column tmncont ">
                        <div class="text-center">
                            <img src="images/imgastrn.jpg" class="imgtmn">
                        </div>
                        <div class="caption d-none d-md-block d-flex ">
                            <h5 class="ml-2 colorcont sizetlt">Lorem ipsum</h5>
                            <p class="ml-2 colorcont sizecont">Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--Footer de la página-->
        <div class="foot">
            <div class="row">
                <div class="col-sm-4 d-flex flex-column align-items-start ">
                    <h5>About Web</h5>
                    <p class="sizecont">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec lorem eu risus imperdiet viverra consequat id lorem.
                        Curabitur vitae nisl in augue sodales porta. Ut vel sollicitudin dolor.</p>
                </div>
                <div class="col-sm-4 d-flex flex-column align-items-start">
                    <h5>Principal Teacher</h5>
                    <p class="sizecont">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec lorem eu risus imperdiet viverra consequat id lorem.
                        Curabitur vitae nisl in augue sodales porta. Ut vel sollicitudin dolor.</p>
                </div>
                <div class="col-sm-4 d-flex flex-column align-items-start">
                    <h5>Social Network</h5>
                    <a href="https://www.instagram.com/ " class="sizecont">Instagram</a>
                    <a href="https://www.facebook.com/ " class="sizecont">facebook</a>
                    <a href="https://www.twitter.com/ " class="sizecont">Twitter</a>
                </div>
            </div>
        </div>
    </div>

    <footer>

        <div class="container">
            <div class="row">
                <div class="col d-flex flex-column align-items-start">
                    <p>My EnG Site 2020 - NanoSoft100</p>
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