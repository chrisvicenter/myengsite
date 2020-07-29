@extends("layouts.plantilla")
<?php
$grp  = $_GET['grpname'];
$grpsl = $_GET['grpslug'];
$unt = $_GET['untname'];
$untsl = $_GET['untslug']
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
                <li class="nav-item "><a class="nav-link" href="../home">Home</a></li>
                <li class="nav-item active"><a class=" nav-link " href="../allgroup">Groups</a></li>
                <li class="nav-item "><a class="nav-link " href="../read">Read</a></li>
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
        <li class="breadcrumb-item"><a href="../allgroup">Groups</a></li>
        <li class="breadcrumb-item"><a href="/allunit?grpname={{$grp}}&grpslug={{$grpsl}}">{{$grp}}</a></li>
        <li class="breadcrumb-item active" aria-current="#">
            <a
                href="{{route('filtro',[$grpsl, $unit=$untsl ])}}?grpname={{$grp}}&grpslug={{$grpsl}}&untname={{$unt}}&untslug={{$untsl}}">
                {{$unt}}
            </a></li>
        <li class="breadcrumb-item active" aria-current="#">{{$post->name}}</li>
    </ol>
</nav>

<!--Se consultan todos los posts publicados-->
<div class="col-sm-12 ">
    <div class="card d-flex flex-column justify-content-between ml-2">
        <div class="card-body">
            <h1 class="card-title">{{$post->name}}</h1>
            @if($post->file)
            <div class="carousel-inner">
                <div style="height: 425px; ">
                    <div>
                        <img src="{{ $post->file }}" class="card-img-top" style="width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
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
</div>
<hr>
<div class="titlemost text-center">
    <h1>Books</h1>
</div>
<div class="card-deck mt-5">
    @foreach($libros as $thumbnail)
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
                <i class="oi oi-thumb-up reactionlbr mt-2">{{$thumbnail->lbr_like}}</i>
            </div>
        </div>
    @endforeach
</div>
<br>
<a href="{{ route('createlibropost', [$post->id, $post->name]) }}" class="btn btn-primary pull-right" role="button">Add</a>
<br>
<br>
{{$libros->withQueryString()}}
<!--Footer de la página-->
@endsection
