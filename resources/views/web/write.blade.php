@extends("layouts.plantilla")
@section('content')
<!--Breadcrumb página Groups-->
<nav aria-label="breadcrumb " class="rowtop">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/home">Home</a><a href="/read">/ Read</a></li>
    </ol>
</nav>
<br>
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



<br>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.height = 400;
    CKEDITOR.config.width = 'auto';
    CKEDITOR.replace('body');
</script>

@endsection

