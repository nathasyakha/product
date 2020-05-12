<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//User
Route::get('users', 'UserController@index');
Route::get('/users/{id}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::put('/users/{id}', 'UserController@update');
Route::delete('users/{id}', 'UserController@destroy');

//Invoice
Route::get('invoices', 'InvoiceController@index');
Route::get('/invoices/{id}', 'InvoiceController@show');
Route::post('invoices', 'InvoiceController@store');
Route::put('/invoices/{id}', 'InvoiceController@update');
Route::delete('/invoices/{id}', 'InvoiceController@destroy');

//Product
Route::get('products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@show');
Route::post('products', 'ProductController@store');
Route::put('/products/{id}', 'ProductController@update');
Route::delete('products/{id}', 'ProductController@destroy');

//Item
Route::get('items', 'ItemController@index');
Route::get('/items/{id}', 'ItemController@show');
Route::post('items', 'ItemController@store');
Route::put('/items/{id}', 'ItemController@update');
Route::delete('/items/{id}', 'ItemController@destroy');
