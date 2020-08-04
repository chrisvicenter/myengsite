@extends("layouts.plantilla")

@section('head')
<link rel="stylesheet" href="{{ asset('css/read_and_write.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<title>Read</title>
@endsection
<?php
if(isset($_GET['grpid'])){
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
<br>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel-read">

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
                    {{ Form::label('id_G', 'groups: ') }}
                    <div class="form-control">{{$grp}}</div>
                    {{ Form::hidden('group_id', $grpid) }}
                    @else
                    {{ Form::label('id_G', 'groups: ') }}
                    {{ Form::select('group_id', $groups, null, ['class' => 'form-control']) }}
                    @endif
                </div>
                @if($idpost!=null)
                {{ Form::label('id_P', 'Post: ') }}
                <div class="form-control">{{$namepost}}</div>
                {{ Form::hidden('id_P', $idpost) }}
                @endif

                <div class="form-group">
                    {!! form::label('id_A', 'Your name: ')!!}
                    {!! form:: text('student', null, ['class'=> 'form-control'])!!}

                </div>


                <div class="form-group form-float">
                    {!! form::label('lbr_titulo', 'Title')!!}
                    {!! form:: text('title', null, ['class'=> 'form-control'])!!}

                </div>

                <div class="form-group form-float">
                    {!! form::label('lbr_youtube', 'Youtube url: ')!!}
                    {!! form:: text('lbr_youtube', null, ['class'=> 'form-control'])!!}

                </div>
                <div class="form-group">
                    {{ Form::label('youtubebody', 'Video Description') }}
                    {{ Form::textarea('youtubebody', null, ['class' => 'form-control', 'rows' => '2']) }}
                </div>

                <div class="form-group form-float">
                    {!! form::label('lbr_soundcloud', 'Sound Cloud url: ')!!}
                    {!! form:: text('lbr_soundcloud', null, ['class'=> 'form-control'])!!}

                </div>
                <div class="form-group form-float">
                    {!! form::label('lbr_genially', 'Geanilly url: ')!!}
                    {!! form:: text('lbr_genially', null, ['class'=> 'form-control'])!!}

                </div>

                <div class="form-group form-float">
                    {!! form::label('lbr_body', 'Write your story: ')!!}
                    {!! form:: textarea('body', null, ['class'=> 'form-control'])!!}

                </div>

                <div class="form-group">
                    {!! form::label('lbr_imagen', 'Choose a image: ')!!}
                    {!! form:: file('lbr_imagen', null, ['class'=> 'form-control'])!!}

                </div>

                <button type="submit" class="btn btn-success">
                    Publish my story!
                </button>

                {!! Form::close() !!}

            </div>
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

@endsection
