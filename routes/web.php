<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;



// ================= PUBLIC =================
Route::get('/', function () {
    return view('user.landing');
})->name('home');


// ================= AUTH =================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================= ADMIN =================
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // ---------- ORDERS ----------
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders');

    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])
        ->name('admin.orders.show');

    Route::put('/admin/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.status');


    // ---------- PRODUK ----------
    Route::prefix('admin/produk')->name('dataProduk.')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('index');
        Route::get('/create', [ProdukController::class, 'create'])->name('create');
        Route::post('/store', [ProdukController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProdukController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProdukController::class, 'destroy'])->name('delete');
    });
});


// ================= USER =================
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/landingLogin', function () {
        return view('user.landingLogin');
    })->name('user.landingLogin');

    Route::get('/products', function () {
        return view('user.product');
    })->name('productUser');
  
    // ---------- CHECKOUT ----------
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('user.checkout');

Route::post('/checkout/process', [CheckoutController::class, 'process'])
    ->name('user.checkout.process');

    Route::get('/checkout/sukses', [CheckoutController::class, 'success'])
    ->name('user.checkout.success');


     Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('user.checkout');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('user.checkout.store');

    Route::get('/checkout/sukses', [CheckoutController::class, 'success'])
        ->name('user.checkout.success');

});


// ================= CUSTOMER CRUD =================
Route::get('/data-customer', [CustomerController::class, 'index'])->name('dataCustomer');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('createCustomer');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('storeCustomer');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('editCustomer');
Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('updateCustomer');
Route::delete('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('deleteCustomer');

    Route::get('/customer/create', [CustomerController::class, 'create'])->name('createCustomer');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('storeCustomer');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('editCustomer');
    Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('updateCustomer');
    Route::delete('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('deleteCustomer');

    Route::prefix('admin/produk')->name('dataProduk.')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/create', [ProdukController::class, 'create'])->name('create');
    Route::post('/store', [ProdukController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ProdukController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ProdukController::class, 'destroy'])->name('delete');


});

