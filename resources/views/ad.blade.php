@extends('default.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Обявления № {{ $ad->id }}</div>
                    <div class="panel-body">
                        <h3>{{ $ad->title }}</h3>
                        <p>{{$ad->description}}</p>
                        <small>{{$ad->author_name}}</small>
                        <small style="float: right;">{{$ad->created_at}}</small>
                    </div>
                    @if (Auth::check() && Auth::user()->name == $ad->author_name)
                        <div class="panel-body">
                            <a style="float: right" href="/delete/{{ $ad->id }}" class="btn btn-danger">Delete</a>
                            <a href="/edit/{{ $ad->id }}" class="btn btn-warning">Edit</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection