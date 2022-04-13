@extends('layouts.userPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Категории</h2>
            </div>
            <div class="pull-right">
                @can('course-create')
                {{-- <a class="btn btn-success" href="{{ route('categories.create') }}"> Записаться </a> --}}
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    {{-- <div class="accordion" id="accordionExample">
        @foreach($them as $th)
        @if($th->course_id == $website->id)
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ $th->title }}
                    </button>
                </h2>
                @foreach($les as $ls)
                @if($ls->theme_course_id == $th->id)
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>{{ $ls->title }}</strong> {{ $ls->description }}
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        @endif
        @endforeach
    </div> --}}

@endsection
