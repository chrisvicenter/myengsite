@extends("layouts.plantilla")
@section('content')
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/read_and_write.css') }}">
    <title>Write</title>
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
                    <li class="nav-item"><a class=" nav-link " href="/allgroup">Groups</a></li>
                    <li class="nav-item "><a class="nav-link " href="/read">Read</a></li>
                    <li class="nav-item active"><a class="nav-link " href="# ">Write</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @endsection

    @section("container")
        <!--Breadcrumb página Groups-->
        <nav aria-label="breadcrumb " class="rowtop">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/home">Home</a>/ Write</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-read">

                    <div class="panel-body">

                        {!! Form::open(['route'=> 'write.store', 'method'=> 'POST',
                        'files'=> 'true']) !!}


                        <div class="form-group">
                            {!! form::label('id_C', 'Elige tu Curso: ')!!}
                            {!! form:: select('id_C', $cursos, ['class'=> 'form-control'])!!}

                        </div>

                        <div class="form-group">
                            {!! form::label('id_A', 'Escribe tu nombre: ')!!}
                            {!! form:: text('id_A', null, ['class'=> 'form-control'])!!}

                        </div>


                        <div class="form-group form-float">
                            {!! form::label('lbr_titulo', 'Titulo')!!}
                            {!! form:: text('name', null, ['class'=> 'form-control'])!!}

                        </div>

                        <div class="form-group form-float">
                            {!! form::label('lbr_body', 'Escribe tu cuento')!!}
                            {!! form:: textarea('body', null, ['class'=> 'form-control'])!!}

                        </div>

                        <div class="form-group">
                            {!! form::label('lbr_imagen', 'Selecciona una Imagen: ')!!}
                            {!! form:: file('lbr_imagen', null, ['class'=> 'form-control'])!!}

                        </div>

                        <button type="submit" class="btn btn-success">
                           Publicar mi cuento!
                        </button>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>


        <hr>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.config.height = 400;
            CKEDITOR.config.width = 'auto';
            CKEDITOR.replace('body');
        </script>

        <!--Footer de la página-->
    @endsection
    @section("footer")
    @endsection

</body>
