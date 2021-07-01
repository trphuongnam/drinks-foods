<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Public\SearchController;

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
    
    Route::get('/search', [SearchController::class, 'search'])->name('search.handling');

    /* Begin: Route public */
    /* Route home page */
    Route::resource('/', 'App\Http\Controllers\Public\HomeController');
    
    /* Route product page */
    Route::get('product/{cat_key?}', 'App\Http\Controllers\Public\ProductController@show')->name('show.product_list');
    Route::get('product/{cat_key}/{product_key?}', 'App\Http\Controllers\Public\ProductController@showDetailProduct')->name('product.detail');

    /* Route regist*/
    Route::resource('regist', 'App\Http\Controllers\Public\RegistController')->only('index', 'store')->middleware('checkUserLogin');

    /* Route sign in & log out*/
    Route::resource('sign_in', 'App\Http\Controllers\Public\LoginController')->only('index', 'store')->middleware('checkUserLogin');
    Route::get('log_out', 'App\Http\Controllers\Public\LoginController@sign_out')->middleware('checkLoginPublic');
    
    /* Route login facebook */
    Route::get('login_facebook', 'App\Http\Controllers\Public\LoginController@redirectToFacebook')->name('login.facebook')->middleware('checkUserLogin');
    Route::get('facebook/callback', 'App\Http\Controllers\Public\LoginController@facebookCallback')->middleware('checkUserLogin');

    /* Route login google */
    Route::get('login_google', 'App\Http\Controllers\Public\LoginController@redirectToGoogle')->name('login.google')->middleware('checkUserLogin');
    Route::get('google/callback', 'App\Http\Controllers\Public\LoginController@googleCallback')->middleware('checkUserLogin');

    /* Route forgot password */
    Route::resource('forgot_password', 'App\Http\Controllers\Public\ForgotPasswordController');
    
    /* Route profile user */
    Route::resource('user', 'App\Http\Controllers\Public\UserController')->only(['index', 'edit', 'update'])->middleware('checkLoginPublic');
    Route::post('profile/edit_pass', 'App\Http\Controllers\Public\UserController@editPassword')->name('cart.editPassword');

    /* Route cart */
    Route::resource('cart', 'App\Http\Controllers\Public\CartController')->only(['index', 'store', 'destroy']);
    Route::post('cart/{uidProduct}', 'App\Http\Controllers\Public\CartController@removeProduct')->name('cart.removeProduct');
    Route::post('cart/order/set_session', 'App\Http\Controllers\Public\CartController@setSession')->name('cart.setSession');

    /* Route order */
    Route::resource('order', 'App\Http\Controllers\Public\OrderController')->only('store', 'show','destroy');

    /* Route ratings product */
    Route::post('ratings', 'App\Http\Controllers\Public\RatingController@storeRatings');

    /* Route export invoice pdf */
    Route::get('/export/invoice/{uidOrder}', 'App\Http\Controllers\PDFExportController@exportInvoice')->middleware('checkLoginPublic');
    /* End: Route Public */
});

/* Route admin */
Route::resource('login', 'App\Http\Controllers\Admin\LoginController');
Route::get('logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('admin.logout');
Route::prefix('/admin')->group(function () {
    Route::middleware(['CheckLoginAdmin', 'language'])->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.dashboard');

        /* Route manager product */
        Route::resource('/product', 'App\Http\Controllers\Admin\ProductController');
        Route::get('/product/change_cat/{id_product}', 'App\Http\Controllers\Admin\ProductController@getCategoryWithType')->name('product.change_cat');

        /* Route manage category */
        Route::resource('/category', 'App\Http\Controllers\Admin\CategoryController');
        
        /* Route manage user */
        Route::resource('/user', 'App\Http\Controllers\Admin\UserController')->only('index', 'create', 'store','show');
        Route::get('/user/block/{uidUser}', 'App\Http\Controllers\Admin\UserController@blockUser');
        Route::get('/user/unblock/{uidUser}', 'App\Http\Controllers\Admin\UserController@unBlockUser');

        /* Route manager order */
        Route::resource('/order', 'App\Http\Controllers\Admin\OrderController')->only('index', 'show', 'update');

    });
});