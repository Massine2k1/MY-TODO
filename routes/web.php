<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('my-todo')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/new',[PostController::class, 'create'])->name('post.create');
});

