@extends('default.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{ route('create') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input type="text" name="title" class="form-control" placeholder="Заголовок" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Описание</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="5" required>

                        </textarea>
                    </div>
                    <input type="hidden" name="author_name" value="{{ Auth::user()->name }}">
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>

            </div>
        </div>
    </div>
@endsection