@extends("layouts.plantilla")
@section('content')
<link rel="stylesheet" href="{{ asset('css/read_and_write.css') }}">
<link rel="stylesheet" href="css/home.css">
    @section("navigation")
    <!--Menú de la página-->
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item "><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item"><a class=" nav-link " href="/allgroup">Groups</a></li>
                    <li class="nav-item active"><a class="nav-link " href="/read">Read</a></li>
                    <li class="nav-item "><a class="nav-link " href="/write/create ">Write</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @endsection
    <!--Breadcrumb página Read-->
    <nav aria-label="breadcrumb " class="rowtop">
        <ol class="breadcrumb">
            @foreach ($contenido as $content)
            <li class="breadcrumb-item"> <a href="/read">Read</a></li>
            <li class="breadcrumb-item active"> {{$content->lbr_titulo}}</li>
            @endforeach
        </ol>
    </nav>
    <br>
    <div class="container">
        <a href="{{url('write/create')}}" class="btn btn-primary pull-right" role="button">Let's make a new book!</a>
    </div>
    <br>
    <br>

    <div  class="container">

            <div class=" col-md-11">
                @foreach ($contenido as $thumbnail)
                    <div class="tittlelbro">
                        <h3>{{$thumbnail->lbr_titulo}}</h3>
                    </div>

                    <div class="tittlelbro">
                        <h5>Autor: {{$autnom}}</h5>
                    </div>
                    <div class="container">
                        <div class="row mb-2">
                            <div class="mr-3">
                                {!! Form::open(['route'=> ['like', $thumbnail->id, $thumbnail->lbr_like],
                                'method' => 'get'])!!}
                                <button name="like" class="oi oi-thumb-up reactionlbr btn btn-outline-primary">
                                    {{$thumbnail->lbr_like}}

                                </button>
                                {!! Form::close() !!}
                            </div>
                            <div class="mr-3" >

                                {!! Form::open(['route'=> ['smile', $thumbnail->id, $thumbnail->lbr_smile],
                                'method' => 'patch'])!!}
                                <button name="smile" class="oi oi-heart reactionlbr btn btn-outline-danger">
                                    {{$thumbnail->lbr_smile}}
                                </button>
                                {!! Form::close() !!}

                            </div>
                            <div class="">

                                {!! Form::open(['route'=> ['sorpess', $thumbnail->id, $thumbnail->lbr_sorpess],
                                'method' => 'put'])!!}
                                <button name="sorpess" class="oi oi-star reactionlbr btn btn-outline-warning ">
                                    {{$thumbnail->lbr_sorpess}}
                                </button>
                                {!! Form::close() !!}


                            </div>
                        </div>
                    </div>
                        <div class="card mb-3">
                            <div class="img-librcont">
                                <img src="{{$thumbnail->lbr_imagen}}" class="card-img-top shadow img-libro">
                            </div>
                            <div class="card-body content-lbr">
                              <p class="card-text"> {!!$bodylbr!!}</p>
                            </div>
                            <div class="card-body content-lbr">
                                <p class="card-text"> {!!$youtube!!}</p>
                            </div>
                            <div class="card-body content-lbr">
                                <p class="card-text"> {!!$thumbnail->lbr_soundcloud!!}</p>
                            </div>
                            <div class="card-body content-lbr">
                                <p class="card-text"> {!!$thumbnail->lbr_genially!!}</p>
                            </div>
                        </div>
                    @endforeach

            </div>

    </div>


@endsection

