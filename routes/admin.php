<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

// ===========dashboard=============
Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
// ================================

// ========routes==================
Route::resources([
    'posts'=>PostController::class,
    'category'=>CategoryController::class,
]);
Route::get('/news',[NewsController::class,'index'])->name('news.index');
Route::get('/news/create',[NewsController::class,'create'])->name('news.create');
Route::post('/news/store',[NewsController::class,'store'])->name('news.store');
Route::get('/news/{post}',[NewsController::class,'show'])->name('news.show');
Route::delete('/news/destroy/{post}',[NewsController::class,'destroy'])->name('news.destroy');
Route::get('/news/{post}/edit',[NewsController::class,'edit'])->name('news.edit');
Route::put('/news/update/{post}',[NewsController::class,'update'])->name('news.update');
// ===============================