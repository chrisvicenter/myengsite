@extends("layouts.plantilla")
<?php
$grp  = $_GET['grpname'];
$grpsl = $_GET['grpslug'];
$unt = $_GET['untname'];
$untsl = $_GET['untslug'];
$grpid = $_GET['grpid'];
?>

@section("head")
<title>{{$post->name}}</title>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
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
                <li class="nav-item "><a class="nav-link" href="../../home">Home</a></li>
                <li class="nav-item active"><a class=" nav-link " href="../allgroup">Groups</a></li>
                <li class="nav-item "><a class="nav-link " href="/read">Read</a></li>
                <li class="nav-item "><a class="nav-link " href="../../write/create">Write</a></li>
            </ul>
        </div>
    </div>
</nav>
@endsection

@section("content")
<!--Breadcrumb página Groups-->
<nav aria-label="breadcrumb " class="rowtop">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../allgroup">Groups</a></li>
        <li class="breadcrumb-item"><a
                href="/allunit?grpname={{$grp}}&grpslug={{$grpsl}}&grpid={{ $grpid }}">{{$grp}}</a></li>
        <li class="breadcrumb-item active" aria-current="#">
            <a
                href="{{route('filtro',[$grpsl, $unit=$untsl ])}}?grpname={{$grp}}&grpslug={{$grpsl}}&untname={{$unt}}&untslug={{$untsl}}&grpid={{ $grpid }}">
                {{$unt}}
            </a></li>
        <li class="breadcrumb-item active" aria-current="#">{{$post->name}}</li>
    </ol>
</nav>

<!--Se consultan todos los posts publicados-->
<div class="card">
    <div class="card-body">
        <h1 class="card-title">{{$post->name}}</h1>
        @if($post->file)
        <div class="text-center bg_image">
            <img src="{{ $post->file }}" class="img-fluid">
        </div>
        <br>
        @endif

        <p class="card-text">
            {{ $post->excerpt }}

            <hr>

            {!! $post->body !!}
        </p>

        @if($post->fileall)
        <a href="{{ $post->fileall }}" class="btn btn-info" target="_blank">
            Download
        </a>
        @endif
    </div>
</div>

<br>

<div class="card ">
    <div class="titlemost text-center">
        <h1>Homeworks</h1>

        <a href="{{ route('createlibropost', [$post->id, $post->name]) }}?grpname={{$grp}}&grpid={{ $grpid }}"
            class="btn btn-primary col-sm-4" role="button">Add New Book</a>
    </div>

    <div class="container d-flex flex-wrap">
        @foreach($libros as $thumbnail)
        <div class="card col-sm-4">

            <div class="mt-3 text-center bg_image">
                <img src="{{$thumbnail->lbr_imagen}}" class="img-fluid" style="height: 30vh; width: auto">
            </div>

            <div class="card-body">
                <h5 class="card-title">{{$thumbnail->lbr_titulo}}</h5>
                <h6 class="card-title">Autor: {{$thumbnail->aut_nombre}}</h6>
            </div>

            <div class="card-footer">
                <a href="{{ route('read.show', $thumbnail->lbr_slug) }}" class="btn btn-primary">Read!</a><br>
                <i class="oi oi-thumb-up reactionlbr mt-2">{{$thumbnail->lbr_like}}</i>
            </div>

        </div>
        @endforeach
    </div>

    <br>
    <br>

{{$libros->withQueryString()}}

</div>
<br>
@endsection