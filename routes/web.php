<?php

use App\Http\Controllers\PostController;
use App\RMVC\Route\Route;

//Получение всех постов
Route::get('/posts', [PostController::class, 'index']);
//Показать конкретный пост
Route::get('/posts/{post}', [PostController::class, 'show']);
//Создание поста
Route::get('/create', [PostController::class, 'create']);
//Сохранение поста
Route::post('/store', [PostController::class, 'store'])->name('posts.store');
//Обновление поста
Route::post('/update', [PostController::class, 'update'])->name('posts.update');
//Удаление поста
Route::post('/delete', [PostController::class, 'delete'])->name('posts.delete');
//
//Route::post('/posts/{post}', [PostController::class, 'store'])->name('posts.store');

//View::get('/posts', [PostController::class, 'index'])->name()->middleware();