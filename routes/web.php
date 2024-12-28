<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\OAuth\GoogleController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/signup', [RegistrationController::class, 'index'])->name('signup');
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::get('/reset-password', [PasswordController::class, 'index'])->name('reset-password');

    Route::post('/auth', [AuthenticationController::class, 'store'])->name('auth.local');
    Route::get('/auth/google', [GoogleController::class, 'index'])->name('auth.google');
    Route::get('/auth/google/callback', [GoogleController::class, 'store']);

    Route::post('/users', [RegistrationController::class, 'store'])->name('user.store');
    Route::post('/reset-password', [PasswordController::class, 'store'])->name('user.reset-password');
    Route::post('/users/password', [PasswordController::class, 'update'])->name('user.change-password');
    Route::get('/reset-password/{token}', [PasswordController::class, 'edit'])->name('password.reset');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'destroy'])->name('auth.logout');
    Route::middleware('verified')->group(function () {
        Route::get('/car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
        Route::post('/car/like/{id}', [CarController::class, 'like'])->name('car.like');
        Route::resource('car', CarController::class)->except(['show']);
    });

    Route::get('/email/verify', [EmailVerificationController::class, 'index'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'update'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/car/search', [CarController::class, 'search'])->name('car.search');
Route::resource('car', CarController::class)->only(['show']);
