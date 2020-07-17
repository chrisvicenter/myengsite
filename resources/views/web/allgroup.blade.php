@extends("layouts.plantilla")
@section('content')
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/allgroup.css') }}">
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
            <li class="breadcrumb-item active"><a href="class">Groups</a></li>
        </ol>
    </nav>

    <!--Se consultan todos los posts publicados-->
    <div class="row">

        @foreach($allgroup as $group)
        <div class="col-sm cursorcolor">
            <div class="card">
                <div class="card-body d-flex justify-content-center text-center">
                    <h3 class="card-title"><a href="{{route('group',$group->slug)}}?grpname={{ $group->name }}">{{ $group->name }}</a></h3>
                </div>
            </div>
        </div>
        @endforeach
        {{ $allgroup->render() }}

    </div>
    <hr>

    <!--Footer de la página-->
    @endsection
    @section("footer")
    @endsection
</body>