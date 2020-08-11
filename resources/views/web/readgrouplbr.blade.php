@extends("layouts.plantilla")
@section('head')
<link rel="stylesheet" href="{{ asset('css/read_and_write.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<title>Read</title>
@endsection

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

@section('content')
<!--Breadcrumb página Groups-->
<nav aria-label="breadcrumb " class="rowtop">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/read">Read</a></li>

        <li class="breadcrumb-item">{{$groupname->name}}</li>



    </ol>
</nav>

<br>

<!--search-->
<nav class="navbar-light float-right">
    <form class="form-inline">

        <div class="form-group">
            <select name="tipo" class="form-control mr-2" id="exampleFormControlSelect1">
              <option>Title </option>
              <option>Autor</option>
            </select>
          </div>

        <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Search"
            aria-label="Search">

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
<!--agregar-->
<a href="{{url('/write/create')}}" class="btn btn-primary pull-right" role="button">Add new book!</a>

    <button type="button" class="btn btn-primary ml-2" data-toggle="collapse" data-target="#demo">Filter by Group</button>
    <div id="demo" class="collapse mt-5">
        <div class="d-flex flex-wrap justify-content-center">

            @foreach($groups as $group)
            <div class="card text-center mb-2 mr-2 cursorcolor" style="width: 10rem;">
                <div class="card-body">
                    <h3 class="card-title">{{ $group->name }} </h3>
                    <a  href="{{ route('readgrouplbr', [$group->slug, $group->id]) }}" class="btn btn-outline-primary">Look!</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>


<!--cards-->
<div class="card-deck mt-5">
    @foreach($groupslibros as $thumbnail)
        <div class="card">
            <div class="tmncont">
                <img src="{{$thumbnail->lbr_imagen}}" class="imgtmn rounded">

            </div>
            <div class="card-body">
                <h5 class="card-title">{{$thumbnail->lbr_titulo}}</h5>
                <h6 class="card-title">Autor: {{$thumbnail->aut_nombre}}</h6>
            </div>
            <div class="card-footer">
                <a href="{{ route('read.show', $thumbnail->lbr_slug) }}" class="btn btn-primary">Read!</a><br>
                <i class="oi oi-thumb-up reactionlbr text-primary mt-2">{{$thumbnail->lbr_like}}</i>
            </div>
        </div>
    @endforeach
</div>
<br>
{{$groupslibros->withQueryString()}}



@endsection

