<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movies;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        $categories = Category::all();
        return view('pages.add-category', compact('categories'));
    }
    public function createCategory(Request $request) {
        $validated = $request->validate([
            'category' => 'required|unique:categories|max:20'
        ]);
        Category::create([
            'category' => $request->category
        ]);

        return redirect('/add-category');
    }
    public function deleteCategory(Category $category){

        $category->delete();
        return redirect('/add-category');
    }

    public function updateCategory(Category $category){
        return view('pages.update-category', compact('category'));
    }

    public function storeUpdate(Category $category, Request $request){
        $validated = $request->validate([
            'category' => 'required|unique:categories|max:20'
        ]);
        Category::where('id', $category->id)->update($request->only(['category']));
        return redirect('/add-category');
    }
}
