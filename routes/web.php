<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// ============frontend================
// home-page
Route::get('/',[HomeController::class,'index'])->name('frontend.index');
Route::get('/news',[HomeController::class,'news'])->name('frontend.news');
Route::get('/read-more/{post}',[HomeController::class,'show'])->name('frontend.read-more');

// ============admin dashboard============
Route::group(['middleware'=>['web','checkAdmin']],function(){
    Route::prefix('admin')->group(function(){
        require __DIR__.'/admin.php';
    });
});

// ============Auth==========================
// login admin
Route::get('/login',[AuthController::class,'loadLogin']);
Route::post('/login',[AuthController::class,'adminLogin'])->name('admin.login');

// logout admin
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

// forget password
Route::get('/forget-password',[AuthController::class,'forgetPasswordLoad']);
Route::post('/forget-password',[AuthController::class,'forgetPassword'])->name('forgetPassword');

// reset password
Route::get('/reset-password',[AuthController::class,'resetPasswordLoad']);
Route::post('/reset-password',[AuthController::class,'resetPassword'])->name('resetPassword');

// ==========================================