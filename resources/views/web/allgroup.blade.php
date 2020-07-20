@extends("layouts.plantilla")
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/allgroup.css') }}">
    <link rel="shortcut icon" href="images/ninosICO.ico" />
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
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Groups</li>
        </ol>
    </nav>

    <!--Se consultan todos los posts publicados-->
    <div class="d-flex flex-wrap justify-content-center">

        @foreach($allgroup as $group)
        <div class="card text-center mb-2 mr-2 cursorcolor" style="width: 10rem;">
            <div class="card-body">
                <h3 class="card-title">{{ $group->name }} </h3>
                <a href="/allunit?grpname={{ $group->name }}&grpslug={{ $group->slug }}" class="btn btn-outline-primary">access</a>
                <!--<a href="{{route('group',$group->slug)}}?grpname={{ $group->name }}&grpslug={{ $group->slug }}" class="btn btn-outline-primary">access</a>-->
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

</html>