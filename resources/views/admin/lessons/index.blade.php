@extends('layouts.adminPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Уроки</h2>
            </div>
            <div class="pull-right">
                @can('lesson-create')
                <a class="btn btn-success" href="{{ route('lessons.create') }}"> СОЗДАТЬ НОВЫЙ УРОК </a>
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
        <th>Тема курса</th>
        <th width="280px">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($lessons as $lesson)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $lesson->title }}</td>
        <td>{{ Str::limit($lesson->description, 100) }}</td>
        <th>{{ $lesson->theme_course->title}}</th>
        <td>
            <div class="dropdown text-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Действие
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="btn btn-info" href="{{ route('lessons.show',$lesson->id) }}">Обзор</a>
                    </li>
                    <li>
                        @can('lesson-edit')
                        <a class="btn btn-primary my-10" href="{{ route('lessons.edit',$lesson->id) }}">Изменить</a>
                        @endcan
                    </li>
                    <li>
                        <form action="{{ route('lessons.destroy',$lesson->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @can('lesson-delete')
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
        <th>Тема курса</th>
        <th width="280px">Действия</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            @if (Auth::user()->id == $record->user_id)
                @foreach ($them as $theme_course)
                    @if ($theme_course->course_id == $record->course_id)
                        @foreach ($lessons as $lesson)
                            @if ($theme_course->id == $lesson->theme_course_id)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $lesson->title }}</td>
                                    <td>{{ Str::limit($lesson->description, 100) }}</td>
                                    <th>{{ $lesson->theme_course->title}}</th>
                                    <td>
                                        <div class="dropdown text-center">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Действие
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="btn btn-info" href="{{ route('lessons.show',$lesson->id) }}">Обзор</a>
                                                </li>
                                                <li>
                                                    @can('lesson-edit')
                                                    <a class="btn btn-primary my-10" href="{{ route('lessons.edit',$lesson->id) }}">Изменить</a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    <form action="{{ route('lessons.destroy',$lesson->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('lesson-delete')
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
            @endif
        @endforeach
    </tbody>
</table>
@endrole
    {!! $lessons->links() !!}
@endsection
