@extends('layouts.adminPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Запись пользователя на курс</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('courses.index') }}"> Назад</a>
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


    {!! Form::open(array('route' => 'store','method'=>'POST')) !!}
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Курсы:</strong>
                    <input type="hidden" name="course_id" id="CoID">
                    <select name="" id="" onchange="document.getElementById('CoID').value= this.value">
                        <option selected disabled>Выберите курс</option>
                       @foreach ($courses as $course)
                            <option value='{{ $course->id }}'>{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Пользователь:</strong>
                    <br/>
                    @foreach ($usersAll as $user)
                    <label for="">
                        {{ Form::checkbox('selectUsers[]', $user->id, false, array('class' => 'name')) }}
                        {{ $user->name }}
                    </label><br>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
        {!! Form::close() !!}
@endsection
