@extends('layouts.lessonsPanel')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Урок: </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('lessons.index') }}"> Назад</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Наименование:</strong>
            {{ $lesson->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Описание: </strong>
            {{ $lesson->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Задание: </strong>
            {{ $lesson->task }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Тема курса: </strong>
            {{ $lesson->theme_course->title }}
        </div>
    </div>
</div>

@endsection

