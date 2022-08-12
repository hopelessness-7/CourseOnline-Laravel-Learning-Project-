@extends('layouts.adminPanel')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Проверка задания</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('checks.index') }}"> Назад</a>
        </div>
    </div>
</div>


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('checks.update',$record->id) }}" method="POST">
    @csrf
    @method('PUT')

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Имя выполнителя:</strong>
            <p>
                @foreach ($usered as $us)
                    @if($us->id == $record->user_id)
                        {{ $us->name }}
                    @endif
                @endforeach
            </p>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Название урока:</strong>
            <p>
                @foreach ($les as $leso)
                    @if($leso->id == $record->lesson_id)
                        {{ $leso->title }}
                    @endif
                @endforeach
            </p>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Ответ выполнителя:</strong>
            <p>
                {{ $record->reply }}
            </p>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Текущий статус:</strong>
            @if ($record->status == 1)
                <p> Не проверено</p>
            @elseif ($record->status == 2)
                <p> Неудовлетворительно</p>
            @elseif ($record->status == 3)
                <p> Удовлетворительно</p>
            @elseif ($record->status == 4)
                <p> Хорошо</p>
            @elseif ($record->status == 5)
                <p> Отлично</p>
            @elseif ($record->status == 6)
                <p> Пересдача</p>
            @endif
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <strong>Новый статус:</strong>
    <input type="hidden" name="status" id="CheId" value="{{ $record->status }}">
    <select name="" id="" onchange="document.getElementById('CheId').value= this.value">
        <option value="1">Не проверено</option>
        <option value="2">Неудовлетворительно</option>
        <option value="3">Удовлетворительно</option>
        <option value="4">Хорошо</option>
        <option value="5">Отлично</option>
        <option value="6">Пересдача</option>
    </select>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Изменить</button>
</div>
</div>

</form>
@endsection
