@extends('layouts.adminPanel')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Изменение темы курса</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('theme_courses.index') }}"> Назад</a>
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


<form action="{{ route('theme_courses.update',$theme_course->id) }}" method="POST">
    @csrf
    @method('PUT')


     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Наименование:</strong>
                <input type="text" name="title" value="{{ $theme_course->title }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Описание:</strong>
                <textarea class="form-control" style="height:150px" name="description" id="summernote"  placeholder="Description">{{ $theme_course->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Курс:</strong>
                <input type="hidden" name="course_id" id="CatId" value="{{ $theme_course->course->id }}">
                <select name="" id="" onchange="document.getElementById('CouId').value= this.value">
                    <option value='{{ $theme_course->course->id }}' disabled>{{ $theme_course->course->title }}</option>
                   @foreach ($courses as $course)
                        <option value='{{ $course->id }}'>{{ $course->title }}</option>
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
