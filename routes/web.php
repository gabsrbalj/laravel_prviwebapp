<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserPostController;

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
//naslijedi ime odozgo pa ga ne moramo pisat
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');




Route::get('/admin', [AdminController::class, 'index'])->name('admin');




Route::get('/', function(){
    return view('home');
})->name('home');

