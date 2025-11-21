<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// HALAMAN PERTAMA = LANDING (PUBLIC)
Route::get('/', function () {
    return view('user.landing');
})->name('home');

// LOGIN & REGISTER (PUBLIC)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/landingLogin', function () {
        return view('user.landingLogin');
    })->name('user.landingLogin');
});


