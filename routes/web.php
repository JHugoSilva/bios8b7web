<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::prefix('/admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'loginAction'])->name('login-action');
    Route::get('/register', [AdminController::class, 'register'])->name('register');
    Route::post('/register', [AdminController::class, 'registerAction'])->name('register-action');
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::get('/', [AdminController::class, 'index']);
});
Route::get('/{slug}', [PageController::class, 'index']);
