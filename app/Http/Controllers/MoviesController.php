<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class MoviesController extends Controller
{
    public function index(Request $request){
        $filterNames = Movies::pluck('name')->toArray();
        $filterName = $request->input('movieName');
        if($filterName!=""){
            $movies = Movies::where(function ($query) use ($filterName){
                $query->where('name', 'like', '%'.$filterName.'%');
            })->simplePaginate(4);
            $movies->appends(['movieName' =>$filterName]);
        }

        else{
            $movies = Movies::simplePaginate(4);
        }
        return view('pages.home', compact('filterNames'))->with('filtered',$movies);
    }

    public function addMovie(){
        $categories = Category::all();
        return view('pages.add-movie', compact('categories'));
    }

    public function storeMovie(Request $request){
        /*$validated = $request->validate([
            'company'=> 'required|unique:companies|max:255',
            'code'=> 'required',
            'vat'=> 'required',
            'address'=> 'required',
            'director'=> 'required',
            'companyCategory'=> 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif'

        ]);*/
        if(request()->hasFile('pictures')) {
            $path = $request->file('pictures')->store('public/images');
            $fileName = str_replace('public/', '', $path);
        }
        Movies::create([
            'name' =>request('name'),
            'description' =>request('description'),
            'imdb' =>request('imdb'),
            'pictures' =>$fileName,
            'category_id' =>request('category'),
            'user_id'=>Auth::id(),
        ]);
        return redirect('/');
    }

    public function deleteMovie(Movies $movie){

        $movie->delete();
        return redirect('/');
    }

    public function updateMovie(Movies $movie){
        $categories = Category::all();
        return view('pages.update-movie', compact('movie','categories'));
    }

    public function storeUpdate(Movies $movie, Request $request){
        if($movie->pictures){
            File::delete(storage_path('app/public/'.$movie->pictures));
        }
        if(request()->hasFile('pictures')){
            $path = $request->file('pictures')->store('public/images');
            $fileName = str_replace('public/','',$path);
            Movies::where('id',$movie->id)->update(['pictures'=>$fileName]);
        }
        Movies::where('id', $movie->id)->update($request->only(['name', 'description', 'imdb', 'category_id']));
        return redirect('/');
    }
    
    public function showMovie(Movies $movie){
        return view('pages.show-movie', compact('movie'));
    }
}
