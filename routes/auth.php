<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// User auth
Route::post('/api/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/api/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/api/auth/reset-password',)->name('reset-password');
Route::get('/api/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
