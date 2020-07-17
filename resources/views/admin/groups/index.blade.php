@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Groups
                    <a href="{{ route('groups.create') }}" class="pull-right btn btn-sm btn-primary">
                        New Group
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
                            @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('groups.show', $group->id) }}" class="btn btn-sm btn-default">
                                        Show
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-default">
                                        Edit
                                    </a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['groups.destroy', $group->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>     	

                    {{ $groups->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection