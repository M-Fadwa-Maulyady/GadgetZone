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

    // ORDERS
    // ORDERS
Route::prefix('admin')->group(function () {

    Route::get('/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders');

    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])
        ->name('admin.orders.show');

    Route::put('/orders/{id}/update-status', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.updateStatus');
});


    // PRODUK CRUD (Admin)
    Route::prefix('admin/produk')->name('dataProduk.')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('index');
        Route::get('/create', [ProdukController::class, 'create'])->name('create');
        Route::post('/store', [ProdukController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProdukController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProdukController::class, 'destroy'])->name('delete');
    });

    // CUSTOMER CRUD
    Route::prefix('admin/customers')->name('dataCustomer.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CustomerController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('delete');
    });

});



// ================= USER =================
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/landingLogin', function () {
        return view('user.landingLogin');
    })->name('user.landingLogin');

    // PRODUK UNTUK USER
    Route::get('/products', [ProdukController::class, 'listUser'])->name('productUser');
    Route::get('/produk/{id}', [ProdukController::class, 'detail'])->name('user.produk_detail');


    // CONTACT
    Route::get('/contact', function () {
        return view('user.contact');
    })->name('contactUser');

    Route::post('/contact/send', [CustomerController::class, 'sendContact'])
        ->name('contact.send');

    // CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('user.checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('user.checkout.process');
    Route::get('/checkout/sukses', [CheckoutController::class, 'success'])->name('user.checkout.success');
    Route::post('/cart/add/{id}', [CheckoutController::class, 'addToCart'])->name('cart.add');

});
