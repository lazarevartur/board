@extends('default.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{ route('edit', $ad->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input type="text" name="title" class="form-control" placeholder="Заголовок" required value="{{$ad->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Описание</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="10" required>
                        {{$ad->description}}
                        </textarea>
                    </div>
                    <input type="hidden" name="author_name" value="{{ Auth::user()->name }}">
                    <button type="submit" class="btn btn-warning">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection