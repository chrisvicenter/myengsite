<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('font/css/open-iconic-bootstrap.min.css')}}">
    <title>Guia hoteles</title>
</head>

<body>
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Hoteles</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="./index.html">Home</a></li>
                <li class="nav-item "><a class=" nav-link " href="./about.html ">Nosotros</a></li>
                <li class="nav-item "><a class="nav-link " href="./precios.html">Precios</a></li>
                <li class="nav-item "><a class="nav-link " href="# ">Términos y condiciones</a></li>
                <li class="nav-item "><a class="nav-link " href="./contacto.html ">Contacto</a></li>
            </ul>
        </div>
    </nav>
    

    <div class="jumbotron">
        <h1>Hoteles</h1>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item-active">
                    Home
                </li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="d-flex">
            <div class="col-sm-4">
                <p>
                <h3>Tit 1</h3>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="col-sm-4">
                <p>
                <h3>Tit 2</h3>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="col-sm-4">
                <p>
                <h3>Tit 3</h3>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-wrap flex-row-reversed">
            <div class="card-hotel d-flex flex-column justify-content-between">
                <h4>Hotel Barcelona</h4>
                <p>
                    Hote Ubicado en cierta dirección
                </p>
                <button class="btn btn-reserva">
                    <span class="oi oi-plus footer-addres-icon"></span>Reservar</button>
            </div>
            <div class="card-hotel d-flex flex-column justify-content-between">
                <h4>Hotel Buenos Aires</h4>
                <p>
                    Hote Ubicado en cierta dirección
                </p>
                <button class="btn btn-reserva">Reservar</button>
            </div>
            <div class="card-hotel d-flex flex-column justify-content-between">
                <h4>Hotel Lima</h4>
                <p>
                    Hote Ubicado en cierta dirección
                </p>
                <button class="btn btn-reserva">Reservar</button>
            </div>
            <div class="card-hotel d-flex flex-column justify-content-between">
                <h4>Hotel Rio de Janeiro</h4>
                <p>
                    Hote Ubicado en cierta dirección
                </p>
                <button class="btn btn-reserva">Reservar</button>
            </div>
            <div class="card-hotel d-flex flex-column justify-content-between">
                <h4>Hotel La paz</h4>
                <p>
                    Hote Ubicado en cierta dirección
                </p>
                <button class="btn btn-reserva">Reservar</button>
            </div>
            <div class="card-hotel d-flex flex-column justify-content-between">
                <h4>Hotel No se</h4>
                <p>
                    Hote Ubicado en cierta dirección
                </p>
                <button class="btn btn-reserva">Reservar</button>
            </div>
        </div>
    </div>

    <footer>
        <div class="row">
            <div class="col-sm-4 d-flex flex-column">
                <a href="http://www.facebook.com">Facebook</a>
                <a href="http://www.instagram.com">Instagram</a>
                <a href="http://www.google.com">Google+</a>
            </div>
            <div class="col-sm-4">
                <address>
                    <h3>Oficina central</h3>
                    <p><span class="oi oi-home footer-addres-icon"></span>Quito, Ecuador</p>
                    <p><span class="oi oi-phone footer-addres-icon"></span>+59399123123</p>
                    <p><span class="oi oi-inbox footer-addres-icon"></span>contact@guiahoteles.com</p>
                </address>
            </div>
            <div class="col-sm-4 d-flex flex-column align-items-end">
                <a href="http://www.facebook.com">Nosotros</a>
                <a href="http://www.instagram.com">Precios</a>
                <a href="http://www.google.com">Terminos</a>
            </div>
        </div>
    </footer>
</body>

</html>