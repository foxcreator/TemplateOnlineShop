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



Route::get('/','App\Http\Controllers\MainController@index')->name('index');
Route::get('/contacts','App\Http\Controllers\MainController@contacts')->name('contacts');
Route::get('/aboutus','App\Http\Controllers\MainController@aboutus')->name('aboutus');

Route::get('/catalog','App\Http\Controllers\MainController@show')->name('show');
Route::get('/catalog/{code}','App\Http\Controllers\MainController@shop')->name('shop');

Route::get('/basket','App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('/basket/place','App\Http\Controllers\BasketController@basketPlace')->name('basket-place');
Route::post('/basket/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');

Route::post('/basket/place','App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');

Route::get('/{category}/{id}','App\Http\Controllers\MainController@product')->name('product');
//Route::get('/basket', [\App\Http\Controllers\BasketController::class, 'basket']);
//Route::get('/basket/add/{id}', [\App\Http\Controllers\BasketController::class, 'basketAdd']);


//Notification::route('telegram', '375733401')
//    ->notify(new TelegramNotificationsChannelForAdmin);


Auth::routes();

Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
Route::post('/store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
