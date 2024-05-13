<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Middleware\BlogManagerMiddleware;
use App\Http\Middleware\HasAdminAccessMiddleware;
use App\Http\Middleware\NewsManagerMiddleware;
use Illuminate\Support\Facades\Route;

// ===========dashboard=============
Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
// ================================

// ========routes==================
Route::middleware([HasAdminAccessMiddleware::class])->group(function () {
    Route::resources([
        'category' => CategoryController::class,
    ]);
    Route::get('/users', [AuthController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AuthController::class, 'create'])->name('users.create');
    Route::post('/users/store', [AuthController::class, 'store'])->name('users.store');
    Route::delete('/users/destroy/{user}', [AuthController::class, 'destroy'])->name('users.destroy');
});
Route::middleware([BlogManagerMiddleware::class])->group(function () {
    Route::resources([
        'posts' => PostController::class,
    ]);
});
Route::middleware([NewsManagerMiddleware::class])->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{post}', [NewsController::class, 'show'])->name('news.show');
    Route::delete('/news/destroy/{post}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::get('/news/{post}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/update/{post}', [NewsController::class, 'update'])->name('news.update');
});

// ===============================