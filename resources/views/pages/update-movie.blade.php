@extends('main')
@section('content')
    <div class="container">
    <h2>Update Movie</h2>
    @include('_partials/errors')
    <form action="/update/{{$movie->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$movie->name}}">
        </div>
        <div class="form-group">
            <textarea name="description" id="" cols="30" row="10" class="form-control">{{$movie->description}}</textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="imdb" placeholder="IMDB rating" value="{{$movie->imdb}}">
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="pictures" class="form-control" >
        </div>
        <div class="form-group">
        <select name="category_id" class="form-select">
            <option value="{{$movie->category->id}}" selected disabled>{{$movie->category->category}}</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary" >Update</button>
    </form>
    </div>
@endsection