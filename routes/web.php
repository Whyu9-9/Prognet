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

//User Route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UsersController@profile');
Route::post('/profile', 'UsersController@update_avatar');
Route::get('/categories', 'CategoriesController@categories');
Route::get('/checkout', 'CheckoutController@checkout');
Route::get('/product', 'ProductController@product');
Route::get('/cart', 'CartController@cart');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//Admin Route
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->middleware('guest')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->middleware('guest')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::resource('/products', 'AdminProductController');
    Route::resource('/categories', 'AdminCategoryController');
    Route::resource('/couriers', 'AdminCourierController');
});

//Admin Product
Route::resource('products', 'AdminProductController');
Route::get('/addImage/{id}', 'AdminProductController@upload');
Route::post('/addImage/{id}', 'AdminProductController@upload_image');
Route::get('/addDiscount/{id}', 'AdminProductController@discount');
Route::post('/addDiscount/{id}', 'AdminProductController@add_discount');
Route::get('/products/delete/{id}', 'AdminProductController@soft_delete');
Route::get('/products-trash', 'AdminProductController@trash');
Route::get('/products/restore/{id}', 'AdminProductController@restore');
Route::get('/products-restore-all', 'AdminProductController@restore_all');
Route::get('/products/destroy/{id}', 'AdminProductController@delete');
Route::get('/products-delete-all', 'AdminProductController@delete_all');
Route::resource('product_images','AdminProductImageController');
Route::resource('discounts','AdminDiscountController');

//Admin Product_Categories
Route::resource('categories', 'AdminCategoryController');
Route::get('/categories/delete/{id}', 'AdminCategoryController@soft_delete');
Route::get('/categories-trash', 'AdminCategoryController@trash');
Route::get('/categories/restore/{id}', 'AdminCategoryController@restore');
Route::get('/categories-restore-all', 'AdminCategoryController@restore_all');
Route::get('/categories/destroy/{id}', 'AdminCategoryController@delete');
Route::get('/categories-delete-all', 'AdminCategoryController@delete_all');

// Admin Product_Category_Detail
Route::resource('product_category_details', 'AdminProductCategoryDetailController');

//Admin Courier
Route::resource('couriers', 'AdminCourierController');
Route::get('/couriers/delete/{id}', 'AdminCourierController@soft_delete');
Route::get('/couriers-trash', 'AdminCourierController@trash');
Route::get('/couriers/restore/{id}', 'AdminCourierController@restore');
Route::get('/couriers-restore-all', 'AdminCourierController@restore_all');
Route::get('/couriers/destroy/{id}', 'AdminCourierController@delete');
Route::get('/couriers-delete-all', 'AdminCourierController@delete_all');

Auth::routes(['verify' => true]);