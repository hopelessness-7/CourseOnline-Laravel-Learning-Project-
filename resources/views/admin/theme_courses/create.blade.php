@extends('layouts.adminPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создание новой темы курса</h2>
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


    <form action="{{ route('theme_courses.store') }}" method="POST">
        @csrf

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Наименование:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Описание:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Задание:</strong>
                    <textarea class="form-control" style="height:150px" name="task" placeholder="Task"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Курсы:</strong>
                    <input type="hidden" name="course_id" id="CouId">
                    <select name="" id="" onchange="document.getElementById('CouId').value= this.value">
                        <option selected disabled>Выберите Курс</option>
                       @foreach ($courses as $course)
                            <option value='{{ $course->id }}'>{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </form>
@endsection
