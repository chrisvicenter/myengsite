@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create unit
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'units.store']) !!}
                        
                        @include('admin.units.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>