<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('my-todo')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/new',[PostController::class, 'create'])->name('post.create');
    Route::post('/new',[PostController::class, 'store']);
    Route::get('show/{post}/{slug}',[PostController::class, 'show'])->name('post.show');
    Route::get('edit/{post}',[PostController::class, 'edit'])->name('post.edit');
    Route::put('edit/{post}',[PostController::class, 'update']);
});

