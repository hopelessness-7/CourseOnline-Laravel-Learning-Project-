@extends('layouts.adminPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Темы курсов</h2>
            </div>
            <div class="pull-right">
                @can('theme_course-create')
                <a class="btn btn-success" href="{{ route('theme_courses.create') }}"> СОЗДАТЬ НОВУЮ ТЕМУ КУРСА </a>
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
            <th>Задание</th>
            <th>Курс</th>
            <th width="280px">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($theme_courses as $theme_course)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $theme_course->title }}</td>
            <td>{{ Str::limit($theme_course->description, 100) }}</td>
            <td>{{ Str::limit($theme_course->description, 100) }}</td>
            <th>{{ $theme_course->course->title}}</th>
            <td>
                <div class="dropdown text-center">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Действие
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="btn btn-info" href="{{ route('theme_courses.show',$theme_course->id) }}">Обзор</a>
                        </li>
                        <li>
                            @can('theme_course-edit')
                            <a class="btn btn-primary my-10" href="{{ route('theme_courses.edit',$theme_course->id) }}">Изменить</a>
                            @endcan
                        </li>
                        <li>
                            <form action="{{ route('theme_courses.destroy',$theme_course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @can('theme_course-delete')
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
            <th>Задание</th>
            <th>Курс</th>
            <th width="280px">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($records as $record)
            @if (Auth::user()->id == $record->user_id)
                @foreach ($theme_courses as $theme_course)
                    @if ($theme_course->course_id == $record->course_id)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $theme_course->title }}</td>
                            <td>{{ Str::limit($theme_course->description, 100) }}</td>
                            <td>{{ Str::limit($theme_course->task, 100) }}</td>
                            <th>{{ $theme_course->course->title}}</th>
                            <td>
                                <div class="dropdown text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Действие
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="btn btn-info" href="{{ route('theme_courses.show',$theme_course->id) }}">Обзор</a>
                                        </li>
                                        <li>
                                            @can('theme_course-edit')
                                            <a class="btn btn-primary my-10" href="{{ route('theme_courses.edit',$theme_course->id) }}">Изменить</a>
                                            @endcan
                                        </li>
                                        <li>
                                            <form action="{{ route('theme_courses.destroy',$theme_course->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @can('theme_course-delete')
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
    {!! $theme_courses->links() !!}
@endsection
