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

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

//User
Route::middleware('auth:api')->group(function () {
    //user
    Route::get('logout', 'UserController@logout');
    Route::get('user', 'UserController@index');
    Route::get('user/{id}', 'UserController@show');
    Route::put('user/{id}', 'UserController@update');
    Route::delete('user/{id}', 'UserController@destroy');

    //invoice
    Route::get('invoice', 'InvoiceController@index');
    Route::get('invoice/{id}', 'InvoiceController@show');
    Route::post('invoice', 'InvoiceController@store');
    Route::put('invoice/{id}', 'InvoiceController@update');
    Route::delete('invoice/{id}', 'InvoiceController@destroy');

    //product
    Route::get('product', 'ProductController@index');
    Route::get('product/{id}', 'ProductController@show');
    Route::post('product', 'ProductController@store');
    Route::put('product/{id}', 'ProductController@update');
    Route::delete('product/{id}', 'ProductController@destroy');

    //item
    Route::get('item', 'ItemController@index');
    Route::get('item/{id}', 'ItemController@show');
    Route::post('item', 'ItemController@store');
    Route::put('item/{id}', 'ItemController@update');
    Route::delete('item/{id}', 'ItemController@destroy');
});
