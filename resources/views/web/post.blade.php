@extends("layouts.plantillatwo")
@section('content')
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../font/css/open-iconic-bootstrap.min.css">
    <link rel="shortcut icon" href="../images/ninosICO.ico" />
    <title>Groups</title>
</head>

<body>
    @section("jumbotron")
    <!--Menú de la página-->
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item "><a class="nav-link" href="home">Home</a></li>
                    <li class="nav-item active"><a class=" nav-link " href="#">Groups</a></li>
                    <li class="nav-item "><a class="nav-link " href="./precios.html">Read</a></li>
                    <li class="nav-item "><a class="nav-link " href="# ">Write</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @endsection

    @section("container")
    <!--Breadcrumb página Groups-->
    <nav aria-label="breadcrumb " class="rowtop">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="class">Groups</a></li>
        <li class="breadcrumb-item" aria-current="#">Algun Grupo</li>
        <li class="breadcrumb-item active" aria-current="#">{{$post->name}}</li>
        </ol>
    </nav>

    <!--Se consultan todos los posts publicados-->
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
    @endsection
    @section("footer")
    @endsection
</body>

