<?php

use App\Http\Controllers\PostController;
use App\RMVC\Route\Route;



Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.index');
Route::post('/posts/{post}', [PostController::class, 'store'])->name('posts.index');

//View::get('/posts', [PostController::class, 'index'])->name()->middleware();