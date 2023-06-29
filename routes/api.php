<?php

use App\RMVC\Route\Route;



Route::get('/api/posts', [\App\Http\Controllers\ApiPostController::class, 'index']);
Route::get('/api/posts/{post}', [\App\Http\Controllers\ApiPostController::class, 'show']);
Route::post('/api/posts', [\App\Http\Controllers\ApiPostController::class, 'store']);
Route::post('/api/posts/{post}', [\App\Http\Controllers\ApiPostController::class, 'update']);
Route::post('/api/posts/{post}/delete', [\App\Http\Controllers\ApiPostController::class, 'delete']);

//View::get('/posts', [PostController::class, 'index'])->name()->middleware();