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

Route::get('/', function () {
    return view('home');
});

Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->middleware('guest')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->middleware('guest')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::resource('/products', 'AdminProductController');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'UsersController@profile');
Route::post('/profile', 'UsersController@update_avatar');
Route::get('/categories', 'CategoriesController@categories');
Route::get('/checkout', 'CheckoutController@checkout');
Route::get('/product', 'ProductController@product');
Route::get('/cart', 'CartController@cart');

Route::resource('products', 'AdminProductController');
Auth::routes(['verify' => true]);