@extends('layouts.adminPanel')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Изменение урока</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('lessons.index') }}"> Назад</a>
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


<form action="{{ route('lessons.update',$lesson->id) }}" method="POST">
    @csrf
    @method('PUT')


     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Наименование: </strong>
                <input type="text" name="title" value="{{ $lesson->title }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Описание: </strong>
                <textarea class="form-control" style="height:150px" name="description" id="summernote" placeholder="Description">{{ $lesson->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Задание: </strong>
                <textarea class="form-control" style="height:150px" name="task" id="summernote1" placeholder="Task">{{ $lesson->task }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Тема курса: </strong>
                <input type="hidden" name="course_id" id="ThemId" value="{{ $lesson->theme_course->id }}">
                <select name="" id="" onchange="document.getElementById('ThemId').value= this.value">
                    <option value='{{ $lesson->theme_course->id }}' disabled>{{ $lesson->theme_course->title }}</option>
                   @foreach ($theme_courses as $theme_course)
                        <option value='{{ $theme_course->id }}'>{{ $theme_course->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </div>


</form>

@endsection
