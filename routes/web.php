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

Route::get('/', 'ProductController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('administrasi', 'UserController@index');

	Route::get('category/getEditFormOnly', 'CategoryController@editForm')->name('category.getEditFormOnly');
	Route::get('user/getEditFormOnly', 'UserController@editForm')->name('user.getEditFormOnly');
	Route::get('accept/{id}', 'TransactionController@accept');
	Route::get('reject/{id}', 'TransactionController@reject');

	Route::resource('transaction', 'TransactionController');
	Route::resource('product', 'ProductController');
	
	Route::resource('category', 'CategoryController');
	Route::resource('brand', 'BrandController');
	Route::get('checkout', 'TransactionController@checkOut')->name('checkOut');
	Route::get('submit_checkout', 'TransactionController@submitCheckOut')->name('submitCheckout');
	Route::get('bandingkan', 'ProductController@bandingkan');
	Route::get('history', 'TransactionController@index');
	Route::get('suspendUser/{id}', 'UserController@suspendUser');
	Route::get('unban/{id}', 'UserController@unban');
});

Route::group(['middleware' => 'admin'], function () {
	Route::resource('user', 'UserController');
	Route::get('admin/product', 'ProductController@index');
	Route::get('admin/brand', 'BrandController@index');
	Route::get('admin/category', 'CategoryController@index');
	Route::get('admin/history', 'TransactionController@index');
		
	
	Route::post('product/deleteData', 'ProductController@deleteData')->name('product.deleteData');
	Route::post('product/saveDataField', 'ProductController@saveDataField')->name('product.saveDataField');
	Route::post('brand/deleteData', 'BrandController@deleteData')->name('brand.deleteData');
	Route::post('brand/saveDataField', 'BrandController@saveDataField')->name('brand.saveDataField');
	Route::post('category/deleteData', 'CategoryController@deleteData')->name('category.deleteData');
	Route::post('category/saveDataField', 'CategoryController@saveDataField')->name('category.saveDataField');
});

Route::get('add-to-cart/{id}', 'ProductController@addToCart');
Route::get('removeFromCart/{id}', 'ProductController@removeFromCart');
Route::get('cart', 'ProductController@cart');
Route::post('product/showDataAjax', 'ProductController@showAjax')->name('product.showAjax');
Route::get('add-to-bandingkan/{id}', 'ProductController@addToBandingkan');
Route::get('filter/{id}/{search}', 'ProductController@filter');
Route::get('search/{id}/{category}', 'ProductController@search');