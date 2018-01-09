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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/reservation', 'ReservationController@create')->name('reservation')->middleware('auth');
Route::post('/reservation/store', 'ReservationController@store')->name('reservation.store')->middleware('auth');
Route::post('/cart/add', 'CartController@ajaxAdd')->name('cart.add');
Route::get('/cart/{id}', 'CartController@deleteByOne')->name('deleteByOne');
Route::get('/cart/delete/{id}', 'CartController@deleteCart')->name('deleteCart');
Route::get('/cart/all/{id}', 'CartController@deleteAll')->name('cart.deleteAll');
Route::group(['middleware'=>['auth', 'admin'], 'prefix'=>'admin'], function() {
  Route::get('/', 'AdminController@index')->name('admin');
  Route::resource('/menu', 'MenuController');
  Route::resource('/dish', 'DishController');

});
