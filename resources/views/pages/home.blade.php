<?php
use App\Models\Movies;
    ?>
@extends('main')
@section('content')
<div class="container-fluid">
        <form style="display: flex; flex-direction: row; gap: 15px;">
        <div style="display: flex; flex-direction: column;" class="form-select-lg">
            <select class="form-select" name="movieName" style="width: 20em; height: 3em;">

                <option value="" selected disabled>--Choose Movie--</option>
                @foreach ($filterNames as $name)
                    <option value="{{$name}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Filter</button>
        </div>
        </form>
    <h1 class="mt-4">Movies</h1>

    <table class="table table-bordered table-responsive">
        <tr>
            <th>Name</th>
            <th>IMDB</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
            @foreach($filtered as $movie)
                <tr>
                    <th style="text-transform: capitalize">{{$movie->name}}</th>
                    <th>{{$movie->imdb}}</th>
                    <th>{{$movie->category->category ?? 'undefined'}}</th>        
                    <th>
                        <ul>
                            <li><a href="/delete/movie/{{$movie->id}}">Delete</a></li>
                            <li><a href="/update/movie/{{$movie->id}}">Update</a></li>
                            <li><a href="/movie/{{$movie->id}}">More</a></li>
                        </ul>
                    </th>
                </tr>
            @endforeach
    </table>
    {{$filtered->links()}}
</div>
@endsection