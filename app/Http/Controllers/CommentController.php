<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movies;

class CommentController extends Controller
{
    public function create(Movies $movie)
    {
        Comment::create([
            'body' =>request('body'),
            'movies_id'=> $movie->id,
            'user_id' =>Auth::id()
            
        ]);

        return back();
    }
}
