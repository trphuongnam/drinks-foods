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
    Route::get('product/{cat_key?}', 'App\Http\Controllers\Public\ProductController@show')->name('show.product_list');
    Route::get('product/{cat_key}/{product_key?}', 'App\Http\Controllers\Public\ProductController@showDetailProduct');

    /* Route regist*/
    Route::resource('regist', 'App\Http\Controllers\Public\RegistController');

    /* Route sign in & log out*/
    Route::resource('sign_in', 'App\Http\Controllers\Public\LoginController')->only('index', 'store')->middleware('checkUserLogin');
    Route::get('log_out', 'App\Http\Controllers\Public\LoginController@sign_out');
    
    /* Route login facebook */
    Route::get('login_facebook', 'App\Http\Controllers\Public\LoginController@redirectToFacebook')->name('login.facebook')->middleware('checkUserLogin');
    Route::get('facebook/callback', 'App\Http\Controllers\Public\LoginController@facebookCallback')->middleware('checkUserLogin');

    /* Route login google */
    Route::get('login_google', 'App\Http\Controllers\Public\LoginController@redirectToGoogle')->name('login.google')->middleware('checkUserLogin');
    Route::get('google/callback', 'App\Http\Controllers\Public\LoginController@googleCallback')->middleware('checkUserLogin');

    /* Route forgot password */
    Route::resource('forgot_password', 'App\Http\Controllers\Public\ForgotPasswordController')->middleware('checkUserLogin');
    
    /* Route profile user */
    Route::resource('user', 'App\Http\Controllers\Public\ProfileUserController')->only(['index', 'edit', 'update']);

    /* Route cart */
    Route::resource('cart', 'App\Http\Controllers\Public\CartController');

    /* Route ratings product */
    Route::post('ratings', 'App\Http\Controllers\Public\RatingController@storeRatings');
});