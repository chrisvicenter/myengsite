@extends("layouts.plantilla")
@section('content')
<html>

<head>
    <title>Groups</title>
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
                    <li class="nav-item "><a class="nav-link" href="../home">Home</a></li>
                    <li class="nav-item active"><a class=" nav-link " href="../allgroup">Groups</a></li>
                    <li class="nav-item "><a class="nav-link " href="./precios.html">Read</a></li>
                    <li class="nav-item "><a class="nav-link " href="# ">Write</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @endsection
    <?php
    $grp  = $_GET['grpname'];
    $grpsl = $_GET['grpslug'];
    ?>
    @section("container")
    <!--Breadcrumb página Groups-->
    <nav aria-label="breadcrumb " class="rowtop">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/allgroup">Groups</a></li>
            <li class="breadcrumb-item" aria-current="#"><a href="{{route('group',$grpsl)}}?grpname={{$grp}}&grpslug={{ $grpsl}}">
                    <?php
                    echo $grp;
                    ?>
                </a></li>
            <li class="breadcrumb-item active" aria-current="#">{{$post->name}}</li>
        </ol>
    </nav>

    <!--Se consultan todos los posts publicados-->
    <div class="row">
        <div class="col-sm-12">
            <h1>{{$post->name}}</h1>

            <div class="card d-flex flex-column justify-content-between ml-2 ">

                <div class="card-body">



                    @if($post->file)
                    <img src="{{ $post->file }}" class="card-img-top">
                    @endif

                    <p class="card-text">
                        {{ $post->excerpt }}
                    </p>
                    <hr>

                    {!! $post->body !!}




                </div>
            </div>
        </div>
    </div>
    <hr>
    <!--Footer de la página-->
    @endsection
    @section("footer")
    @endsection
</body>