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
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

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
                    <p class="sizecont">
                        Web interactiva para la socialización y creación de microcuentos de estudiantes que deseen
                        hechar a volar su imaginación.
                    </p>
                </div>
                <div class="col-sm-4 d-flex flex-column align-items-start">
                    <h5>Principal Teacher</h5>
                    <p class="sizecont">
                        Viviana Chicaiza <br>
                        Bachelor in Education <br>
                        English Teacher as second language Academia Aeronáutica Mayor Pedro Travesari<br>
                        English Teacher initial and primary section
                    </p>
                </div>
                <div class="col-sm-4 d-flex flex-column align-items-start">
                    <h5>Social Network</h5>
                    <a href="mailto:myengsite@gmail.com " class="sizecont">myengsite@gmail.com</a>
                    <a href="http://www.myengsite.com/" class="sizecont">@myengsite</a>
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
                    <a href="/home" class="footer-end-link">Home </a>
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
