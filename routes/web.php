<?php

use App\Notifications\TelegramNotificationsChannelForAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Notification;

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

Route::get('/dashboard', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('register.login');
});



Route::get('/',[App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/contacts',[App\Http\Controllers\MainController::class, 'contacts'])->name('contacts');
Route::get('/aboutus',[App\Http\Controllers\MainController::class, 'aboutus'])->name('aboutus');

Route::get('/catalog',[App\Http\Controllers\MainController::class, 'show'])->name('show');
Route::get('/catalog/{code}',[App\Http\Controllers\MainController::class, 'shop'])->name('shop');

Route::get('/check', [\App\Http\Controllers\CartController::class, 'check'])->name('check');
//Маршруты корзины: Все товары в корзине, добавление, удаление одного, сохранение в БД, очистка корзины.
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/clear-cart', [\App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

Route::get('/{category}/{id}',[App\Http\Controllers\MainController::class, 'product'])->name('product');


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
Route::post('/store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');

