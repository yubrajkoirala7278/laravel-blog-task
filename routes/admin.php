<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
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
// ===============================