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
    
    /* Begin: Route phần public */
    Route::get('/', [HomeController::class, 'home'])->name('public_home');
    Route::get('/product', [HomeController::class, 'product'])->name('public_product');
    /* End: Route phần public */

});