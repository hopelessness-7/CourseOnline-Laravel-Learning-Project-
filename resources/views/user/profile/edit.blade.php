@extends('layouts.userPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Профиль</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<form action="{{ route('profile.update',$user->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Имя:</strong>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ваш пароль:</strong>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Новый пароль:</strong>
                <input type="password" name="new_password" class="form-control" placeholder="New password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Повторите новый пароль:</strong>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </div>
</form>
@endsection
