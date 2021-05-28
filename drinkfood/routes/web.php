<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
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
Route::group(['middleware' => 'language'], function()
{
    Route::get('/language/{lang}', [HomeController::class, 'language'])->name('language');
    
    /* Route home page */
    Route::resource('/', 'App\Http\Controllers\Public\HomeController');
    /* Route product page */
    Route::resource('product', 'App\Http\Controllers\Public\ProductController')->only(['index', 'show']);
    /* Route regist, sign in, sign out page */
    Route::resource('regist', 'App\Http\Controllers\Public\UserController');
});