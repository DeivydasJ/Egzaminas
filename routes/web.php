<?php
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\CommentController;

Route::get('/', [MoviesController::class, 'index']);
Route::get('/add-movie', [MoviesController::class, 'addMovie']);
Route::post('/store', [MoviesController::class,'storeMovie']);

Route::get('/add-category', [CategoryController::class, 'addCategory']);
Route::post('/create', [CategoryController::class, 'createCategory']);

Route::get('/delete/movie/{movie}', [MoviesController::class, 'deleteMovie']);
Route::get('/update/movie/{movie}', [MoviesController::class, 'updateMovie']);
Route::post('/update/{movie}', [MoviesController::class, 'storeUpdate']);

Route::get('/delete/category/{category}', [CategoryController::class, 'deleteCategory']);
Route::get('/update/category/{category}', [CategoryController::class, 'updateCategory']);
Route::post('/updateCategory/{category}', [CategoryController::class, 'storeUpdate']);


Auth::routes();

Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/movie/{movie}', [MoviesController::class, 'showMovie']);

Route::post('/movie/{movie}/comment', [CommentController::class,'create']);