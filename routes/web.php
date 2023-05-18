<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/users/login/store',[LoginController::class,'store'])->name("login");

// Nhóm lại các route, kiểm tra đã đăng nhập hay chưa?
Route::middleware(['auth'])->group(function(){
    Route::get('/admin/main',[MainController::class,'index']);
    Route::get('/admin',[MainController::class,'index'])->name("admin");
});