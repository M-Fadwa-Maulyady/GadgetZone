<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BlogController;
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

    Route::get('/dashboard', fn() => view('admin.dashboard'))
        ->name('admin.dashboard');

    // ORDERS
    Route::prefix('admin')->group(function () {
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
        Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
        Route::put('/orders/{id}/update-status', [AdminOrderController::class, 'updateStatus'])
            ->name('admin.orders.updateStatus');
    });

    // PRODUK CRUD
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

    // BLOG ADMIN
    Route::prefix('admin/blog')->name('admin.blog.')->group(function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('index');
        Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
        Route::post('/store', [AdminBlogController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminBlogController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminBlogController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminBlogController::class, 'destroy'])->name('delete');
    });

});



// ================= USER =================
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/landingLogin', fn() => view('user.landingLogin'))
        ->name('user.landingLogin');

    // PRODUK USER
    Route::get('/products', [ProdukController::class, 'listUser'])->name('productUser');
    Route::get('/produk/{id}', [ProdukController::class, 'detail'])->name('user.produk_detail');

    // CONTACT
    Route::get('/contact', fn() => view('user.contact'))->name('contactUser');

    Route::post('/contact/send', [CustomerController::class, 'sendContact'])
        ->name('contact.send');

    // BLOG USER
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');

    // CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('user.checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])
        ->name('user.checkout.process');
    Route::get('/checkout/sukses', [CheckoutController::class, 'success'])
        ->name('user.checkout.success');

    // CART
    Route::post('/cart/add/{id}', [CheckoutController::class, 'addToCart'])->name('cart.add');
});

// *END*
