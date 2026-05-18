<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;

Route::get('/',IndexController::class);
Route::get('/about', AboutController::class);
Route::get('/contact', ContactController::class);

Route::get('/job', [JobController::class, 'index']);

Route::resource('blog',PostController::class);
Route::resource('comment',CommentController::class);
Route::resource('tag',TagController::class);

// Route::get('tags',[TagController::class,'index']);
// Route::get('tags/create',[TagController::class,'create']);
// Route::get('tags/test-many',[TagController::class,'testManyToMany']);