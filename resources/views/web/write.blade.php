@extends("layouts.plantilla")

@section('head')
<link rel="stylesheet" href="{{ asset('css/read_and_write.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<title>Read</title>
@endsection
<?php
if (isset($_GET['grpid'])) {
    $grpid = $_GET['grpid'];
    $grp = $_GET['grpname'];
}
?>

@section("navigation")
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
                <li class="nav-item"><a class="nav-link " href="/read">Read</a></li>
                <li class="nav-item active"><a class="nav-link " href="# ">Write</a></li>
            </ul>
        </div>
    </div>
</nav>
@endsection
@section('content')
<!--Breadcrumb página Groups-->
<nav aria-label="breadcrumb " class="rowtop">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/write/create">Write</a></li>

    </ol>
</nav>
<div class="cont-back-img">
    <br>
    <div class="container">
        <div class="row d-flex flex-column  align-items-center">
            <div class=" col-md-10 col-md-offset-1 ">


                <div class="panel-body">
                    @if(count($errors))
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {!! Form::open(['route'=> 'write.store', 'method'=> 'POST',
                    'files'=> 'true']) !!}


                    <div class="form-group">
                        @if(isset($_GET['grpid']))
                        {{ Form::label('id_G', 'Group ') }}
                        <ion-icon name="people" class="mg-btn-oi" style="color: #4bc4d1;"></ion-icon>&nbsp;:
                        <div class="form-control">{{$grp}}</div>
                        {{ Form::hidden('group_id', $grpid) }}
                        @else
                        {{ Form::label('id_G', 'Select your group ') }}
                        <ion-icon name="people" class="mg-btn-oi" style="color: #4bc4d1;"></ion-icon>&nbsp;:
                        {{ Form::select('group_id', $groups, null, ['class' => 'form-control']) }}
                        @endif
                    </div>
                    @if($idpost!=null)
                    {{ Form::label('id_P', 'Post ') }}
                    <ion-icon name="library" class="mg-btn-oi" style="color: #4bc4d1;"></ion-icon>&nbsp;:
                    <div class="form-control">{{$namepost}}</div>
                    {{ Form::hidden('id_P', $idpost) }}
                    @endif

                    <div class="form-group">
                        {!! form::label('id_A', 'Your name ')!!}
                        <span class="oi oi-pencil color-oi"></span>&nbsp;:
                        {!! form:: text('student', null, ['class'=> 'form-control'])!!}

                    </div>


                    <div class="form-group form-float">
                        {!! form::label('lbr_titulo', 'Title')!!}
                        <span class="oi oi-pencil color-oi"></span>&nbsp;:
                        {!! form:: text('title', null, ['class'=> 'form-control'])!!}

                    </div>

                    <div class="form-group form-float">
                        {!! form::label('lbr_youtube', 'Youtube url ')!!}
                        <ion-icon name="logo-youtube" class="mg-btn-oi" style="color: red; "></ion-icon>&nbsp;:
                        {!! form:: text('lbr_youtube', null, ['class'=> 'form-control'])!!}

                    </div>
                    <div class="form-group">
                        {{ Form::label('youtubebody', 'Video Description') }}
                        <span class="oi oi-pencil color-oi"></span>&nbsp;:
                        {{ Form::textarea('youtubebody', null, ['class' => 'form-control', 'rows' => '2']) }}
                    </div>

                    <div class="form-group form-float">
                        {!! form::label('lbr_soundcloud', 'Sound Cloud url ')!!}
                        <ion-icon name="logo-soundcloud" class="mg-btn-oi" style="background-color: #ff5500; color: white;"></ion-icon>&nbsp;:
                        {!! form:: text('lbr_soundcloud', null, ['class'=> 'form-control'])!!}

                    </div>
                    <div class="form-group form-float">
                        {!! form::label('lbr_genially', 'Genially url ')!!}
                        <ion-icon name="create-outline" class="mg-btn-oi color-oi"></ion-icon>&nbsp;:
                        {!! form:: text('lbr_genially', null, ['class'=> 'form-control'])!!}

                    </div>
                    <div class=" form-group">
                        {!! form::label('lbr_imagen', 'Choose an image ')!!}
                        <ion-icon name="image" class="mg-btn-oi color-oi"></ion-icon>&nbsp;:
                        {!! form:: file('lbr_imagen', null, ['class'=> 'form-control'])!!}

                    </div>  

                    <div class="form-group form-float">
                        {!! form::label('lbr_body', 'Write your story ')!!}
                        <ion-icon name="book-outline" class="mg-btn-oi"></ion-icon>&nbsp;<span class="oi oi-pencil color-oi"></span>&nbsp;:
                        {!! form:: textarea('body', null, ['class'=> 'form-control'])!!}

                    </div>



                    <button type="submit" class="btn btn-success">
                        Publish my story!
                    </button>

                    {!! Form::close() !!}

                </div>
            </div>


        </div>
        <br>
        <script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
        <script>
            CKEDITOR.config.height = 400;
            CKEDITOR.config.width = 'auto';
            CKEDITOR.replace('body');
        </script>
    </div>

</div>
<hr>


@endsection