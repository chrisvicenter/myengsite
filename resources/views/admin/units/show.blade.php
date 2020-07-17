@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View unit
                </div>

                <div class="panel-body">
                    <p><strong>Name:</strong> {{ $unit->name }}</p>
                    <p><strong>Slug:</strong> {{ $unit->slug }}</p>
                </div>
            </div>
        </div>
    </div>
</div>