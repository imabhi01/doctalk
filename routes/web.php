<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    //Product item list. 
    Route::get('/product/index', [ProductController::class, 'show'])->name('product.show')->middleware('can:isAdmin');
    
    Route::get('product/list', [ProductController::class, 'productList'])->name('product.list');

    //Add Product
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create')->middleware('can:isAdmin');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store')->middleware('can:isAdmin');
    //Read Product
    Route::get('product/{id}', [ProductController::class, 'view'])->name('product.edit')->middleware('can:isAdmin');
    //Update Product
    Route::post('product/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('can:isAdmin');
    //Delete Product 
    Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('can:isAdmin');

    Route::get('user/index', [UserController::class, 'index'])->name('user.index')->middleware('can:isAdmin');
    Route::get('user/list', [UserController::class, 'userList'])->name('user.list')->middleware('can:isAdmin');
    // show user
    Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show')->middleware('can:isAdmin');
    // delete user
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('can:isAdmin');
    
    // Orders list
    Route::get('all/orders', [OrderController::class, 'allOrders'])->name('all.orders')->middleware('can:isAdmin');
    Route::get('get-orders', [OrderController::class, 'getOrders'])->name('orders.list')->middleware('can:isAdmin');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('cd-products', [HomeController::class, 'allCd'])->name('cd');

Route::get('book-products', [HomeController::class, 'allBook'])->name('book');

// checkout page
Route::get('buy-now/{id}', [ProductController::class, 'buyNow'])->name('buynow')->middleware('auth');

// Orders list
Route::get('my/orders', [OrderController::class, 'index'])->name('orders')->middleware('auth');

Route::get('user/orders', [OrderController::class, 'getUserOrders'])->name('user.orders')->middleware('auth');

//product detail page
Route::get('product/detail/{id}', [ProductController::class, 'productDetail'])->name('product.detail');

// Stripe payment
Route::get('stripe', [StripeController::class,'stripe'])->name('stripe')->middleware('auth');

Route::post('stripe', [StripeController::class,'stripePost'])->name('stripe.post')->middleware('auth');

