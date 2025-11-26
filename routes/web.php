<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('user.landing');
})->name('home');



/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (auth + role:admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

    // admin.dashboard
    Route::get('/admin.dashboard', [dashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |----------------------------------------------------------------------
    | ADMIN - ORDERS
    |----------------------------------------------------------------------
    */
    Route::prefix('admin')->group(function () {
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
        Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
        Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');
    });


    /*
    |----------------------------------------------------------------------
    | ADMIN - PRODUK CRUD
    |----------------------------------------------------------------------
    */
    Route::prefix('admin/produk')->name('dataProduk.')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('index');
        Route::get('/create', [ProdukController::class, 'create'])->name('create');
        Route::post('/store', [ProdukController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProdukController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProdukController::class, 'destroy'])->name('delete');
    });


    /*
    |----------------------------------------------------------------------
    | ADMIN - CUSTOMER CRUD
    |----------------------------------------------------------------------
    */
    Route::prefix('admin/customers')->name('dataCustomer.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CustomerController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('delete');
    });


    /*
    |----------------------------------------------------------------------
    | ADMIN - BLOG CRUD
    |----------------------------------------------------------------------
    */
    Route::prefix('admin/blog')->name('admin.blog.')->group(function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('index');
        Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
        Route::post('/store', [AdminBlogController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminBlogController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminBlogController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminBlogController::class, 'destroy'])->name('delete');
    });

});



/*
|--------------------------------------------------------------------------
| USER ROUTES (auth + role:user)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->group(function () {

    // Landing setelah login
    Route::get('/landingLogin', function () {
        return view('user.landingLogin');
    })->name('user.landingLogin');

    // Pages user
    Route::get('/products', fn() => view('user.product'))->name('productUser');
    Route::get('/contact', fn() => view('user.contact'))->name('contactUser');

    // Contact form
    Route::post('/contact/send', [CustomerController::class, 'sendContact'])->name('contact.send');

    // Blog user
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');

    /*
    |----------------------------------------------------------------------
    | USER - CHECKOUT
    |----------------------------------------------------------------------
    */
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('user.checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('user.checkout.process');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('user.checkout.store');
    Route::get('/checkout/sukses', [CheckoutController::class, 'success'])->name('user.checkout.success');
});
