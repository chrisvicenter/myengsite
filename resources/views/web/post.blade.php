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
            <a class="navbar-brand" href="./"><span class="oi oi-home footer-address-icon" title="iphone"
                    aria-hidden="true"></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
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
                <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                <li class="breadcrumb-item" aria-current="#">Algun Grupo</li>
                <li class="breadcrumb-item active" aria-current="#">{{$post->name}}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-sm-12">
                <h1>{{$post->name}}</h1>

                <div class="card d-flex flex-column justify-content-between ml-2 ">

                    <div class="card-body">

                        <div class="card-title">
                            Units
                            <a href="{{route('unit',$post->unit->slug)}}">{{$post->unit->name}}</a>
                        </div>

                        @if($post->file)
                        <img src="{{ $post->file }}" class="card-img-top">
                        @endif

                        <p class="card-text">
                            {{ $post->excerpt }}
                        </p>
                        <hr>

                        {!! $post->body !!}
                        <hr>

                        Groups

                        @foreach ($post->groups as $group)
                        <a href="{{route('group',$group->slug)}}">
                            {{$group->name}}
                        </a>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>

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