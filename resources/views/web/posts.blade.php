@extends("layouts.plantilla")

<?php
$grp  = $_GET['grpname'];
$grpsl = $_GET['grpslug'];
$unt = $_GET['untname'];
$untsl = $_GET['untslug'];
$grpid = $_GET['grpid'];
?>
@section("head")
<title>{{$grp}} | {{$unt}}</title>
@endsection


@section("navigation")
<!--Menú de la página-->
<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item "><a class="nav-link" href="../../home">Home</a></li>
                <li class="nav-item active"><a class=" nav-link " href="../../allgroup">Groups</a></li>
                <li class="nav-item "><a class="nav-link " href="../../read">Read</a></li>
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
        <li class="breadcrumb-item"><a href="/allgroup">Groups</a></li>
        <li class="breadcrumb-item"><a href="/allunit?grpname={{$grp}}&grpslug={{$grpsl}}&grpid={{ $grpid }}">{{$grp}}</a></li>
        <li class="breadcrumb-item active" aria-current="#">{{$unt}}</li>
    </ol>
</nav>

<!--Se consultan todos los posts publicados-->
<div class="row">
    <div class="col-sm-12">
        <h1>Posts</h1>

        @foreach($posts as $post)
        <br>
        <div class="card d-flex flex-column justify-content-between ml-2 ">
            <div class="card-body">

                <h2 class="card-title">{{ $post->name }}</h2>

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
                    <a href="{{ route('post', [$post->slug,$grpid]) }}?grpname={{$grp}}&grpslug={{$grpsl}}&untname={{$unt}}&untslug={{$untsl}}&grpid={{ $grpid }}" class="pull-right">Read more</a>
                </p>

            </div>
        </div>
        @endforeach
        <br>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{ $posts->withQueryString()->render()}}
            </ul>
        </nav>

    </div>
</div>
<hr>
<!--Footer de la página-->
@endsection