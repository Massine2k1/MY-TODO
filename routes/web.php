<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/login',[AuthController::class, 'doLogin']);
Route::delete('/logout',[AuthController::class,'logout'])->name('auth.logout');
Route::get('/profile',[ProfileController::class, 'profile'])->name('auth.profile')->middleware('auth');

Route::prefix('my-todo')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/new',[PostController::class, 'create'])->name('post.create')->middleware('auth');
    Route::post('/new',[PostController::class, 'store']);
    Route::get('show/{post}/{slug}',[PostController::class, 'show'])->name('post.show');
    Route::get('edit/{post}',[PostController::class, 'edit'])->name('post.edit')->middleware('auth');
    Route::put('edit/{post}',[PostController::class, 'update']);
});

