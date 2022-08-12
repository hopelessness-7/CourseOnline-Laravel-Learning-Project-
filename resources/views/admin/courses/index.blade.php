@extends('layouts.adminPanel')


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

    @role('admin')
        <table class="display" id="myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Наименование</th>
                <th>Описание</th>
                <th>Категория</th>
                <th width="280px">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ Str::limit($course->description, 100) }}</td>
                <th>{{ $course->categorie->title}}</th>
                <td>
                    <div class="dropdown text-center">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Действие
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="btn btn-info" href="{{ route('courses.show',$course->id) }}">Обзор</a>
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
            </tbody>
        </table>
    @endrole

    @role('teacher')
    <table class="display" id="myTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Категория</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($records as $record)
            @if (Auth::user()->id == $record->user_id)
                @foreach ($courses as $course)
                    @if ($course->id == $record->course_id)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ Str::limit($course->description, 100) }}</td>
                        <th>{{ $course->categorie->title}}</th>
                        <td>
                            <div class="dropdown text-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Действие
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="btn btn-info" href="{{ route('courses.show',$course->id) }}">Обзор</a>
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
                    @endif
                @endforeach
            @endif
        @endforeach
        </tbody>
    </table>
    @endrole


    {!! $courses->links() !!}
@endsection
