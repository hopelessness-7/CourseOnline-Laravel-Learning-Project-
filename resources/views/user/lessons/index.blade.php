@extends('layouts.lessonsPanel')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Урок: </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/user/dashboardUser"> Назад</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Наименование:</strong>
            {{ $lesson->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Тема курса: </strong>
            {{ $lesson->theme_course->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Описание: </strong>
            {!! $lesson->description !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Задание: </strong>
            {!! $lesson->task !!}
        </div>
    </div>


    @foreach($lesson->records as $zap)
        @if (Auth::user()->id == $zap->user_id && $lesson->id == $zap->lesson_id && $zap->status == 0)
            <form action="{{ route('lesson_record', $zap->id) }}" method="POST">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ответ на задание:</strong>
                        <textarea class="form-control" style="height:150px" name="reply" id="summernote" placeholder="Ответ"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input  name="user_id" value="{{ Auth::user()->id }}" type="hidden">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input  name="lesson_id" value="{{request()->route('id') }}" type="hidden">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input  name="status" type="hidden">
                    </div>
                </div>
                <button class="btn btn-success">Отправить ответ на задание</button>
            </form>
        @elseif (Auth::user()->id == $zap->user_id && $lesson->id == $zap->lesson_id && $zap->status == 1)
            <p>Оценка - На проверке </p>
        @elseif (Auth::user()->id == $zap->user_id && $lesson->id == $zap->lesson_id && $zap->status == 2)
            <p>Оценка - Неудовлетворительно (2)</p>
        @elseif (Auth::user()->id == $zap->user_id && $lesson->id == $zap->lesson_id && $zap->status == 3)
            <p>Оценка - Удовлетворительно (3)</p>
        @elseif (Auth::user()->id == $zap->user_id && $lesson->id == $zap->lesson_id && $zap->status == 4)
            <p>Оценка - Хорошо (4)</p>
        @elseif (Auth::user()->id == $zap->user_id && $lesson->id == $zap->lesson_id && $zap->status == 5)
            <p>Оценка - Отлично (5)</p>
        @elseif (Auth::user()->id == $zap->user_id && $lesson->id == $zap->lesson_id && $zap->status == 6)
            <p>Пересдача</p>
            <form action="{{ route('lesson_record', $zap->id) }}" method="POST">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ответ на задание:</strong>
                        <textarea class="form-control" style="height:150px" name="reply" id="summernote" placeholder="Ответ"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input  name="user_id" value="{{ Auth::user()->id }}" type="hidden">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input  name="lesson_id" value="{{request()->route('id') }}" type="hidden">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input  name="status" type="hidden">
                    </div>
                </div>
                <button class="btn btn-success">Отправить ответ на задание</button>
            </form>
        @endif
    @endforeach
</div>

@endsection

