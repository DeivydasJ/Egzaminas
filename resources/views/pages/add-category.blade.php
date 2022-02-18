@extends('main')
@section('content')
    <div class="container">
    <h2>Add new Category</h2>
    @include('_partials/errors')

    <form action="/create" method="post">
        @csrf
        <div class="form-group" style="width: 20em;">
            <input type="text" class="form-control" name="category" >
        </div>
        <button type="submit" class="btn btn-primary" >Save</button>
    </form>
    </div>
    <div class="container mt-5">
            <h3>All Categories</h3>
            <div style="display: flex; flex-direction: row; gap: 10px;">
            @foreach ($categories as $category)
            <div class="card mr-2" style="width: 10rem;">
            <div class="card-body">
                <h5 class="card-title">{{$category->category}}</h5>
                <a href="/delete/category/{{$category->id}}">Delete</a>
                <a href="/update/category/{{$category->id}}">Update</a>
            </div>
            </div>
                
            @endforeach
            </div>
    </div>
@endsection