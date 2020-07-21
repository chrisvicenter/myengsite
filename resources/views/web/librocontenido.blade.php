@extends("layouts.plantilla")
@section('content')
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/read_and_write.css') }}">
    <title>Libro-contenido</title>
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
                    <li class="nav-item "><a class=" nav-link " href="/allgroup">Groups</a></li>
                    <li class="nav-item active"><a class="nav-link " href="read">Read</a></li>
                    <li class="nav-item "><a class="nav-link " href="write">Write</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @endsection

    @section("container")
        <!--Breadcrumb página Groups-->
        <nav aria-label="breadcrumb" class="rowtop">
            <ol class="breadcrumb">
                <li class="breadcrumb-item-active">
                    @foreach ($contenido as $content)
                    <a href="/home">Home</a> <a href="/read"> / Read</a> / {{$content->lbr_titulo}}
                    @endforeach

                </li>
            </ol>
        </nav>
        <hr>
        <div class="container">
            <a href="{{url('write/create')}}" class="btn btn-primary pull-right" role="button">Hagamos un nuevo Libro!</a>
        </div>
        <br>
        <br>

        <div  class="container-librocontenido h-100">

                <div class=" col-md-11">
                    @foreach ($contenido as $thumbnail)
                        <div class="tittlelbro">
                            <h3>{{$thumbnail->lbr_titulo}}</h3>
                        </div>

                        <div class="tittlelbro">
                            <h5>Autor: {{$autnom}}</h5>
                        </div>
                        <div class="imagae-thum">
                            <div class="row likes">
                                <div class="col  ">
                                    {!! Form::open(['route'=> ['like', $thumbnail->id, $thumbnail->lbr_like],
                                    'method' => 'get'])!!}
                                    <button name="like" class="oi oi-thumb-up reactionlbr btn btn-outline-primary">
                                        {{$thumbnail->lbr_like}}

                                    </button>
                                    {!! Form::close() !!}
                                </div>
                                <div class="col like-content" >

                                    {!! Form::open(['route'=> ['smile', $thumbnail->id, $thumbnail->lbr_smile],
                                    'method' => 'patch'])!!}
                                    <button name="smile" class="oi oi-heart reactionlbr btn btn-outline-danger">
                                        {{$thumbnail->lbr_smile}}
                                    </button>
                                    {!! Form::close() !!}

                                </div>
                                <div class="col like-content">

                                    {!! Form::open(['route'=> ['sorpess', $thumbnail->id, $thumbnail->lbr_sorpess],
                                    'method' => 'put'])!!}
                                    <button name="sorpess" class="oi oi-star reactionlbr btn btn-outline-warning ">
                                        {{$thumbnail->lbr_sorpess}}
                                    </button>
                                    {!! Form::close() !!}


                                </div>
                            </div>
                                <img class="imagelibro shadow" src="{{$thumbnail->lbr_imagen}}">
                            </div>
                        @endforeach

            </div>

        </div>


        <div class="container">
            <div class="content-lbr">
                {!!$bodylbr!!}
            </div>
        </div>

    @endsection
    <!--Footer de la página-->
    @section("footer")
    @endsection
</body>
