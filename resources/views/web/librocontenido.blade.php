@extends("layouts.plantilla")
@section('content')
<!--Breadcrumb página Groups-->
<nav aria-label="breadcrumb " class="rowtop">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/home">Home</a><a href="/read">/ Read</a></li>
    </ol>
</nav>
<br>
<div class="container">
    <a href="{{url('write/create')}}" class="btn btn-primary pull-right" role="button">Hagamos un nuevo Libro!</a>
</div>
<br>
<br>

<div  class="container-librocontenido h-100">

        <div class=" col-md-11">
            @foreach ($contenido as $thumbnail)
                <div class="tittlelbro">
                    <h3>{{$thumbnail->lbr_titulo}}</h3>
                </div>

                <div class="tittlelbro">
                    <h5>Autor: {{$autnom}}</h5>
                </div>
                <div class="imagae-thum">
                    <div class="row likes">
                        <div class="col  ">
                            {!! Form::open(['route'=> ['like', $thumbnail->id, $thumbnail->lbr_like],
                            'method' => 'get'])!!}
                            <button name="like" class="oi oi-thumb-up reactionlbr btn btn-outline-primary">
                                {{$thumbnail->lbr_like}}

                            </button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col like-content" >

                            {!! Form::open(['route'=> ['smile', $thumbnail->id, $thumbnail->lbr_smile],
                            'method' => 'patch'])!!}
                            <button name="smile" class="oi oi-heart reactionlbr btn btn-outline-danger">
                                {{$thumbnail->lbr_smile}}
                            </button>
                            {!! Form::close() !!}

                        </div>
                        <div class="col like-content">

                            {!! Form::open(['route'=> ['sorpess', $thumbnail->id, $thumbnail->lbr_sorpess],
                            'method' => 'put'])!!}
                            <button name="sorpess" class="oi oi-star reactionlbr btn btn-outline-warning ">
                                {{$thumbnail->lbr_sorpess}}
                            </button>
                            {!! Form::close() !!}


                        </div>
                    </div>
                        <img class="imagelibro shadow" src="{{$thumbnail->lbr_imagen}}">
                    </div>
                @endforeach

    </div>

</div>

<div class="container">
    <div class="content-lbr">
        {!!$bodylbr!!}
    </div>
</div>
@endsection


