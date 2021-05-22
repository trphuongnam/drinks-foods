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
    return view('public/pages/home');
});

Route::get('/product', function () {
    return view('public/pages/product');
});

Route::get('/product/{type_name}/{url_key}', function () {
    return view('public/pages/product_detail');
});
