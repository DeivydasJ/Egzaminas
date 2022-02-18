@extends('main')
@section('content')
    <div class="container">
    <h2>Add Movie</h2>
    @include('_partials/errors')

    <form action="/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" >
        </div>
        <div class="form-group">
            <textarea name="description" id="" cols="30" row="10" class="form-control" placeholder=""></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="imdb" placeholder="IMDB rating">
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="pictures" class="form-control" >
        </div>
        <div class="form-group">
        <select name="category" class="form-select">
            <option value="" selected>--Select category--</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary" >Save</button>
    </form>
    </div>
@endsection