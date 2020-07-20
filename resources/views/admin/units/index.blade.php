@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Units
                    <a href="{{ route('units.create') }}" class="pull-right btn btn-sm btn-primary">
                        New Unit
                    </a>
                </div>

                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Name</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($units as $unit)
                            <tr>
                                <td>{{ $unit->id }}</td>
                                <td>{{ $unit->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('units.show', $unit->id) }}" class="btn btn-sm btn-default">
                                        Show
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-sm btn-default">
                                        Edit
                                    </a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['units.destroy', $unit->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>     	

                    {{ $units->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection