@extends('layouts.userPanel')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Категории</h2>
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
        </tr>
        @foreach ($website_name as $key)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $key->title }}</td>
        </tr>
        @endforeach
    </table>

@endsection