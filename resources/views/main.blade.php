@extends('default.app')

@section('content')

    <div class="container">
        <div class="row">

            @guest

                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @endguest

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Обявления</div>
                    <div class="panel-body">
                    @if(isset($ads))
                        @foreach ($ads as $ad)
                            <h3><a href="/{{$ad->id}}">{{ $ad->title }}</a></h3>
                            <p>{{$ad->description}}</p>
                            <small>{{$ad->author_name}}</small>
                            <small style="float: right; ">{{$ad->created_at}}</small>
                            @if (Auth::check() && Auth::user()->name == $ad->author_name)
                                <br>
                                <a href="/edit/{{ $ad->id }}" class="btn btn-warning">Edit</a>  <a style="float: right" href="/delete/{{ $ad->id }}" class="btn btn-danger">Delete</a>
                            @endif
                            <hr>
                        @endforeach
                        <div class="container">
                            <div class="row">
                                <div class="col-md-offset-4">
                                    <nav aria-label="Page navigation example cc">
                                        <ul class="pagination">
                                            {{ $ads->links() }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection