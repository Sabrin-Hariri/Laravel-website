<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/// for profile : /
//Route::get('/profile' , ProfileController@index)->name('profile');
Route::get('/profile' , [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::put('/profile/update' , [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

//// for post : 
Route::get('/posts' , [App\Http\Controllers\PostController::class, 'index'])->name('posts');

Route::get('/posts/trashed' , [App\Http\Controllers\PostController::class, 'postTrashed'])->name('posts.trashed');
Route::get('/posts/create' , [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::put('/posts/store' , [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/posts/edit/{id}' , [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/update/{id}' , [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::get('/posts/create' , [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{slug}' , [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('/posts/destroy/{id}' , [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/hdelete/{id}' , [App\Http\Controllers\PostController::class, 'hdelete'])->name('posts.hdelete');
Route::get('/posts/restore/{id}' , [App\Http\Controllers\PostController::class, 'restore'])->name('posts.restore');



///// route for tag: 
Route::get('/tags' , [App\Http\Controllers\TagController::class, 'index'])->name('tags');
Route::get('/tag/create' , [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');
Route::put('/tag/store' , [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');
Route::get('/tag/edit/{id}' , [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
Route::put('/tag/update/{id}' , [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');
Route::get('/tag/destroy/{id}' , [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy');
