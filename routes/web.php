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
    return view('welcome');
});

Auth::routes();

Route::post('registers', 'UserController@register');
Route::post('logins', 'UserController@login');
Route::post('logouts', 'UserController@login');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('invoice', 'InvoiceController@index');
Route::post('invoice', 'InvoiceController@store');
Route::get('invoice/{id}', 'InvoiceController@update');
Route::delete('invoice/{id}', 'InvoiceController@destroy');


Route::get('product', 'ProductController@index');
Route::post('product', 'ProductController@store');
Route::get('product/{id}', 'ProductController@update');
Route::delete('product/{id}', 'ProductController@destroy');

Route::get('item', 'ItemController@index');
Route::post('item', 'ItemController@store');
Route::get('item/{id}', 'ItemController@update');
Route::delete('item/{id}', 'ItemController@destroy');
