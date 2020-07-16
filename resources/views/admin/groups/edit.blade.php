@extends('layouts.apptwo')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit group
                </div>

                <div class="panel-body">
                    {!! Form::model($group, ['route' => ['groups.update', $group->id],
                        'method'=>'PUT']) !!}
                        
                        @include('admin.groups.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>