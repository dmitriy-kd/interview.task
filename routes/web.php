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

Route::get('/', 'MainController@products')->name('products');
Route::get('/checkout/{product}', 'MainController@checkout')->name('checkout');
Route::post('/checkout/payment', 'MainController@payment')->name('payment');
Route::post('/order', 'MainController@order')->name('order');
