@extends('layouts.adminPanel')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Управление ролями</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Создать новую роль</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="display" id="example">
    <thead>
        <tr>
            <th>No</th>
            <th>Наименование</th>
            <th width="280px">Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Обзор</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Изменить</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
