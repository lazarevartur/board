@extends('default.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Обявления № {{ $advert->id }}</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>{{ $advert->title }}</h3>
                        <p>{{$advert->description}}</p>
                        <small>{{$advert->author_name}}</small>
                        <small style="float: right;">{{$advert->created_at}}</small>
                    </div>
                    @if (Auth::check() && Auth::user()->name == $advert->author_name)
                        <div class="panel-body">
                            <form method="POST" action="/delete/{{ $advert->id }}">
                                {{ csrf_field() }}
                                <button style="float: right" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="/edit/{{ $advert->id }}" class="btn btn-warning">Edit</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection