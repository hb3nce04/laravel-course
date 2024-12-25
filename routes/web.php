<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::post('/auth', [AuthController::class, 'local'])->name('auth.local');
    Route::get('/auth/google', [AuthController::class, 'google'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'googleCallback']);
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
    Route::post('/car/like/{id}', [CarController::class, 'like'])->name('car.like');
    Route::resource('car', CarController::class)->except(['show']);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/car/search', [CarController::class, 'search'])->name('car.search');
Route::resource('car', CarController::class)->only(['show']);
