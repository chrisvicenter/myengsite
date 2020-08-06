<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Generación de Links-->
    <meta property="og:title" content="My EnG Site" />
    <meta property="og:type" content="articles">
    <meta property="og:url" content="http://www.myengsite.com">
    <meta property="og:image" content="https://res.cloudinary.com/hoefoxwrd/image/upload/v1596731969/logofinalPNG_jnbmuv.png">
    <meta property="og:description" content="DESCRIPTION">
    <meta property="og:site_name" content="My EnG Site">


    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/plantila.css') }}">
    <link rel="stylesheet" href="{{ asset('font/css/open-iconic-bootstrap.min.css') }}">

    <!-- Fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">

    <!-- Icono -->
    <link rel="shortcut icon" href="{{ asset('images/ninosICO.ico')}}">

    @yield('head')
</head>

<body>
    <!--Jumbotron-->
    <div>
        <div class="jumbotron ">
            <div class="container">
                <img src="{{ asset('images/ninosPNG.png')}}" class="img-fluid imgjupng float-left" alt="Responsive image">
                <img src="{{ asset('images/myengsite.png')}}" class="img-fluid imgjupngti " alt="Responsive image">
            </div>
        </div>
    </div>
    <!--Fin Jumbotron-->

    @yield("navigation")

    <div class="container colorcntner shadow">

        @yield('content')

        <!--Primer Footer-->
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
        <!--Fin Primer footer-->
    </div>

    <!--Footer de la página-->
    <footer>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col">
                    My EnG Site 2020 - NanoSoft100
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="#" class="footer-end-link">Home </a>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="#" class="footer-end-link">Contacto</a>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="/loginteacher" class="footer-end-link">Login</a>
                </div>
            </div>
        </div>
    </footer>
    <!--Fin Footer de lapágina-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('popper.js/dist/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!--Fin jQuerys-->
</body>

</html>
