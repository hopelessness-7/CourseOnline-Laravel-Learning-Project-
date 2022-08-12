@extends('layouts.userPanel')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Курс</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/user/dashboardUser"> Назад</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Наименование:</strong>
            {{ $course->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Описание:</strong>
            {{ $course->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Категория:</strong>
            {{ $course->categorie->title }}
        </div>
    </div>
</div>

<a href="{{ route('record', $course->id) }}" class="btn btn-success my-10">Записаться</a>


<div class="accordion accordion-flush" id="accordionFlushExample">

@foreach($course->theme_courses as $theme_course)
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-heading{{ $theme_course->id }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $theme_course->id }}">
                {{ $theme_course->title }}
            </button>
        </h2>
        <div id="flush-collapse{{ $theme_course->id }}" class="accordion-collapse collapse" aria-labelledby="{{ $theme_course->title }}" data-bs-parent="#accordionFlushExample">
            @foreach($theme_course->lessons as $lesson)
                <div class="accordion-body">
                    <strong>{{ $lesson->title }}</strong>
                    {{ $lesson->description }}
                </div>
            @endforeach
        </div>
    </div>
@endforeach
</div>

@endsection
