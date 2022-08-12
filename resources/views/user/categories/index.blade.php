@extends('layouts.userPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Курсы в выбранной категории</h2>
            </div>

        </div>
    </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

<div class="d-flex justify-content-evenly">
    @foreach($website as $web)
        @if($categorie->id == $web->categorie_id)
            <div class="content">
                <a class="block block-link-shadow block-rounded
                ribbon ribbon-bookmark ribbon-left ribbon-success text-center"
                href="/user/course/preview/{{ $web->id }}">
                <div class="block-content block-content-full">
                    <div class="item item-circle bg-pulse text-pulse-lighter mx-auto my-20">
                    <i class="fa fa-html5"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <div class="font-size-sm text-muted">10 lessons &bull; 5 hours</div>
                </div>
                <div class="block-content block-content-full">
                    <div class="font-w600">{{ $web->title }}</div>
                </div>
                </a>
            </div>
        @endif
    @endforeach
</div>
@endsection
