<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/api', function () {
    to_route('/admin/login');
});

// Admin panel
Route::get('/admin/login', function () {
    return view('adminlogin');
})->name('admin.loginpage');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin',)->middleware(['auth:admin'])->name('admin');

require __DIR__ . '/auth.php';
require __DIR__ . '/api.php';
