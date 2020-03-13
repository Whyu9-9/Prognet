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

Route::get('/admin', function(){
    return view('#');
})->middleware('auth:admins');

Route::get('/user', function(){
    return view('views.home');
})->middleware('auth:users');


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/authlogin', 'UsersController@login');
Route::get('/authlogout', 'UsersController@logout');
Route::get('/categories', 'CategoriesController@categories');
Route::get('/checkout', 'CheckoutController@checkout');
Route::get('/product', 'ProductController@product');
Route::get('/cart', 'CartController@cart');

Auth::routes(['verify' => true]);