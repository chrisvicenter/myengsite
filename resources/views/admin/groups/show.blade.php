@extends('layouts.apptwo')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View group
                </div>

                <div class="panel-body">
                    <p><strong>Nombre</strong> {{ $group->name }}</p>
                    <p><strong>Slug</strong> {{ $group->slug }}</p>
                </div>
            </div>
        </div>
    </div>
</div>