@extends('main')
@section('content')
    <div class="container">
    <h2>Update Category</h2>
    @include('_partials/errors')

    <form action="/updateCategory/{{$category->id}}" method="post">
        @csrf
        <div class="form-group" style="width: 20em;">
            <input type="text" class="form-control" name="category" value="{{$category->category}}">
        </div>
        <button type="submit" class="btn btn-primary" >Save</button>
    </form>
    </div>
@endsection