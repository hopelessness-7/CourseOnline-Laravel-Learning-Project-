@extends('layouts.adminPanel')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Управление пользователями</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Создать нового пользователя</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="display" id="myTable">
    <thead>
    <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Email</th>
        <th>Роли</th>
        <th width="280px">Действия</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Подробнее</a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Изменить</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
