@extends('layouts.adminPanel')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Выполненные задания</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


<table class="display" id="myTable" style="width:100%">
    <thead>
        <tr>
            <th>Пользователь</th>
            <th>Урок</th>
            <th>Статус</th>
            <th>Ответы</th>
            <th>Опции</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($records as $record)
        @if (Auth::user()->id == $record->user_id)
            @foreach ($them as $theme_course)
                @if ($theme_course->course_id == $record->course_id)
                    @foreach ($les as $lesson)
                        @if ($theme_course->id == $lesson->theme_course_id)
                            @foreach($zapis as $zap)
                                @if($zap->lesson_id == $lesson->id)
                                        @if($zap->status != 0)
                                            <tr>
                                                @foreach($usered as $us)
                                                    @if($us->id == $zap->user_id)
                                                        <td>{{ $us->name }}</td>
                                                    @endif
                                                @endforeach
                                                @foreach($les as $lei)
                                                    @if($lei->id == $zap->lesson_id)
                                                        <td>{{ $lei->title }}</td>
                                                    @endif
                                                @endforeach
                                                <td>
                                                    @if ($zap->status == 1)
                                                        Не проверено
                                                    @elseif ($zap->status == 2)
                                                        Неудовлетворительно
                                                    @elseif ($zap->status == 3)
                                                        Удовлетворительно
                                                    @elseif ($zap->status == 4)
                                                        Хорошо
                                                    @elseif ($zap->status == 5)
                                                        Отлично
                                                    @elseif ($zap->status == 6)
                                                        Пересдача
                                                    @endif
                                                </td>
                                                <td>{{ $zap->reply }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('checks.edit',$zap->id) }}">Проверить</a>
                                                </td>
                                            </tr>
                                        @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
    @endforeach
</tbody>
</table>
@endsection

