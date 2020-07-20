@extends("layouts.plantilla")
@section('content')
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/read_and_write.css') }}">
    <title>Read</title>
</head>

<body>
    @section("jumbotron")
    <!--Menú de la página-->
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item "><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item"><a class=" nav-link " href="/groups">Groups</a></li>
                    <li class="nav-item active"><a class="nav-link " href="#">Read</a></li>
                    <li class="nav-item "><a class="nav-link " href="/write/create ">Write</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @endsection

    @section("container")

                    <!--Breadcrumb página Groups-->
                    <nav aria-label="breadcrumb " class="rowtop">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="/home">Home</a><a href="/read">/ Read</a></li>
                        </ol>
                    </nav>
                    <br>
                    <!--search-->
                    <nav class="navbar-light float-right">
                        <form class="form-inline">
                        <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por título" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    </nav>

            <a href="{{url('/write/create')}}" class="btn btn-primary pull-right" role="button">Agregar</a>
            <br>
            <br>


        <div class="d-flex flex-wrap flex-row">
            @foreach($libros as $thumbnail)
                <div class="card-contenido flex-column justify-content-between ml-2 color shadow" style="width: 18rem;">
                    <img class="card-img-top" src="/images/libros/{{$thumbnail->lbr_imagen}}">
                    <div class="card-body">
                    <h5 class="card-title">{{$thumbnail->lbr_titulo}}</h5>
                    <a href="{{ route('read.show', $thumbnail->lbr_slug) }}" class="btn btn-primary">A leerlo!</a>
                    </div>
                </div>
            @endforeach

    </div>

<br>
{{$libros}}


        <!--Footer de la página-->
    @endsection
    @section("footer")
    @endsection
</body>
