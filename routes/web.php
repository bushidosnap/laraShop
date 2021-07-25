<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('landing-page');
// });


Auth::routes();


Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landing-page');

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.show');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/{product}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/wishList/{product}', [App\Http\Controllers\CartController::class, 'wishList'])->name('cart.wishList');
Route::delete('/wishList/{product}', [App\Http\Controllers\CartController::class, 'wishListDestroy'])->name('wishList.destroy');
Route::post('/cart/wishList/{product}', [App\Http\Controllers\CartController::class, 'switchToCart'])->name('wishList.switchToCart');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');


Route::get('/checkout/confirmation', [App\Http\Controllers\CheckoutController::class, 'confirmation'])->name('checkout.confirmation');


