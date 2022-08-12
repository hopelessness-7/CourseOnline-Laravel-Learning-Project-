@extends('layouts.adminPanel')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Тема курса: </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('theme_courses.index') }}"> Назад</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Наименование:</strong>
            {{ $theme_course->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Описание: </strong>
            {{ $theme_course->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Курс: </strong>
            {{ $theme_course->course->title }}
        </div>
    </div>
</div>

@endsection
