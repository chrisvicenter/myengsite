<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/plantila.css') }}">
    <link rel="stylesheet" href="{{ asset('font/css/open-iconic-bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/ninosICO.ico')}}"/>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('popper.js/dist/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!--Jumbotron-->
    <div>
        <div class="jumbotron ">
        
            <div class="container">
                <img src="{{ asset('images/ninosPNG.png')}}" class="img-fluid imgjupng float-left" alt="Responsive image">
                <img src="{{ asset('images/myengsite.png')}}" class="img-fluid imgjupngti " alt="Responsive image">
            </div>
        </div>
        <!--Fin Jumbotron-->
        @yield("jumbotron")
    </div>
    <div class="container colorcntner shadow">
        @yield("container")
        
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

    <!--Footer de la página-->

    <footer>
        @yield("footer")
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col">
                    My EnG Site 2020 - NanoSoft100
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="#" class="footer-end-link">Home </a>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="#" class="footer-end-link">Contacto</a>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>