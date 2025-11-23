<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
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


Route::get('/data-customer', [CustomerController::class, 'index'])->name('dataCustomer');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('createCustomer');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('storeCustomer');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('editCustomer');
    Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('updateCustomer');
    Route::delete('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('deleteCustomer');


