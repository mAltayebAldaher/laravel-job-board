<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;

// ## Public Routes
Route::get('/',IndexController::class);
//Route::get('/about', AboutController::class);
Route::get('/contact', ContactController::class);

Route::get('/job', [JobController::class, 'index']);

Route::resource('tag',TagController::class);

Route::get('/signup',[Authcontroller::class,'showSignupForm'])->name('signup');
Route::get('/login',[Authcontroller::class,'showLoginForm'])->name('login');

Route::post('/signup',[Authcontroller::class,'signup']);
Route::post('/login',[Authcontroller::class,'login']);
Route::post('/logout',[Authcontroller::class,'logout'])->name('logout');

// ## Protected Routes
Route::middleware('auth')->group(function(){
    Route::resource('blog',PostController::class);
    Route::resource('comment',CommentController::class);
});

Route::middleware('onlyMe')->group(function(){
    Route::get('/about',AboutController::class);
});