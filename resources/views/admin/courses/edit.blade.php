@extends('layouts.adminPanel')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Изменение курса</h2>
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


<form action="{{ route('courses.update',$course->id) }}" method="POST">
    @csrf
    @method('PUT')


     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Наименование:</strong>
                <input type="text" name="title" value="{{ $course->title }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Описание:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $course->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Категории:</strong>
                <input type="hidden" name="categorie_id" id="CatId" value="{{ $course->categorie->id }}">
                <select name="" id="" onchange="document.getElementById('CatId').value= this.value">
                    <option value='{{ $course->categorie->id }}' disabled>{{ $course->categorie->title }}</option>
                   @foreach ($categories as $categorie)
                        <option value='{{ $categorie->id }}'>{{ $categorie->title }}</option>
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
