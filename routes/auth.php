<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPassWordController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Auth\Events\PasswordReset;



Route::prefix('/')->middleware('guest')->group(function () {

    Route::get('login', [AuthController::class, 'showLoginForm']);
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout-page', [AuthController::class, 'logoutPage'])->name('logoutPage');
    Route::get('register', [AuthController::class, 'showRegisterForm']);
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::view('forgot-password', 'auth.forgot-password')->name('showForm');
    Route::post('forgot-password', [ResetPasswordController::class, 'passwordEmail'])->name('password.request');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});

Route::get('/email/verify/{id}', [AuthController::class, 'verify'])->name('verification.verify');
