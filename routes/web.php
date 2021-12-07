<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ShopController@index')->name('index');

Route::get('/mycart', 'ShopController@myCart')->name('cart')->middleware('auth');

Route::post('/', 'ShopController@search')->name('search');

Route::post('/mycart', 'ShopController@addMycart')->middleware('auth');

Route::post('/checkout', 'ShopController@checkout')->middleware('auth');

Route::get('/history', 'ShopController@myHistoryDate')->middleware('auth');

Route::post('/history', 'ShopController@dateHistory')->name('dateHistory')->middleware('auth');

Route::post('/cartdelete', 'ShopController@deleteCart')->middleware('auth');

Route::post('/cartalldelete', 'ShopController@deleteAllCart')->middleware('auth');

Route::get('/shopdetail/{stock}', 'ShopController@shopDetail')->name('shopDetail');

Route::post('/shopdetail/{stock}', 'ShopController@addMycart')->middleware('auth');
