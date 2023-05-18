<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('view-product');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('payment', [CartController::class, 'payment'])->name('payment');

    Route::get('orders', [OrderController::class, 'index'])->name('user-orders');
    Route::post('order', [OrderController::class, 'store'])->name('order');

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('admin/view-products', [AdminController::class, 'viewProducts'])->name('admin-view-products');
    Route::get('admin/create-product', [AdminController::class, 'createProduct'])->name('admin-create-product');
    Route::post('admin/product', [AdminController::class, 'storeProduct'])->name('admin-store-product');
    Route::get('admin/edit-product/{id}', [AdminController::class, 'editProduct'])->name('admin-edit-product');
    Route::put('admin/product/{id}', [AdminController::class, 'updateProduct'])->name('admin-update-product');
    Route::delete('admin/product/{id}', [AdminController::class, 'deleteProduct'])->name('admin-delete-product');
    Route::put('admin/hide-product/{id}', [AdminController::class, 'hideProduct'])->name('admin-hide-product');
    Route::put('admin/display-product/{id}', [AdminController::class, 'displayProduct'])->name('admin-display-product');

    Route::get('admin/view-users', [AdminController::class, 'viewUsers'])->name('admin-view-users');
    Route::get('admin/create-user', [AdminController::class, 'createUser'])->name('admin-create-user');
    Route::post('admin/user', [AdminController::class, 'storeUser'])->name('admin-store-user');
    Route::get('admin/edit-user/{user}', [AdminController::class, 'editUser'])->name('admin-edit-user');
    Route::put('admin/user/{user}', [AdminController::class, 'updateUser'])->name('admin-update-user');
    Route::delete('admin/user/{user}', [AdminController::class, 'deleteUser'])->name('admin-delete-user');

    Route::get('admin/view-orders', [AdminController::class, 'viewOrders'])->name('admin-view-orders');
});

require __DIR__.'/auth.php';
