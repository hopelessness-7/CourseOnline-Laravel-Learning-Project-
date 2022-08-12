@extends('layouts.userPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Профиль</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('profile.edit',$user->id) }}"> Изменить</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div>
    <p>Имя -  {{ $user->name }}</p>
    <p>Email - {{ $user->email }}</p>
</div>
@endsection
