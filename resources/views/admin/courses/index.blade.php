@extends('layouts.userPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Курсы</h2>
            </div>
            <div class="pull-right">
                @can('course-create')
                <a class="btn btn-success" href="{{ route('courses.create') }}"> СОЗДАТЬ НОВЫЙ КУРС </a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered" id="dataTable1">
        <tr>
            <th>Id</th>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Категория</th>
            <th width="280px">Действия</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->description }}</td>
            <th>{{ $course->categorie->title}}</th>
            <td>
                <div class="dropdown text-center">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Действие
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="btn btn-info" href="/course/{{$course->id}}">Обзор</a>
                        </li>
                        <li>
                            @can('course-edit')
                            <a class="btn btn-primary my-10" href="{{ route('courses.edit',$course->id) }}">Изменить</a>
                            @endcan
                        </li>
                        <li>
                            <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @can('course-delete')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                                @endcan
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $courses->links() !!}
@endsection