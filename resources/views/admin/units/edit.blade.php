@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit unit
                </div>

                <div class="panel-body">
                    {!! Form::model($unit, ['route' => ['units.update', $unit->id],
                        'method'=>'PUT']) !!}
                        
                        @include('admin.units.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection