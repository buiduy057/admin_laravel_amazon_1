<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => true,
]);
Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => 'checkAdminLogin'], function() {
    Route::get('product','AdminController@product')->name('product');
    Route::get('variants/{id}','AdminController@variants')->name('variants');
    Route::get('listProduct','AdminController@listProduct')->name('listProduct');
    Route::get('editProduct/{id}','AdminController@editProduct')->name('editProduct');
    Route::get('variantsAll/{id}','AdminController@variantsAll')->name('variantsAll');
    Route::get('removeVariants/{id}','AdminController@removeVariants')->name('removeVariants');
    Route::post('product','AdminController@postProduct')->name('postProduct');
 
    Route::get('ebayHome','EbayController@home')->name('ebayHome');
    Route::get('getCategory','EbayController@getCategory')->name('getCategory');
    Route::get('policyDescription/{id}','EbayController@policyDescription')->name('policyDescription');
    Route::post('lister','EbayController@lister')->name('lister');
    Route::post('ebay','EbayController@update')->name('general');
    Route::post('general','EbayController@update')->name('general');
    Route::post('dashboard','EbayController@dashboard')->name('dashboard');
    Route::post('template','EbayController@template')->name('template');
    Route::post('createEbay','EbayController@createEbay')->name('createEbay');
    Route::post('addEbay','EbayController@addEbay')->name('addEbay');
    Route::post('editProduct/{id}','EbayController@updateEbay')->name('editProduct');
    Route::post('requestUpdateEbay/{id}','EbayController@requestUpdateEbay')->name('requestUpdateEbay');
    Route::post('removeProduct/{id}','EbayController@destroyEbay')->name('removeProduct');
    Route::post('destroyEbayRequest/{id}','EbayController@destroyEbayRequest')->name('destroyEbayRequest');

    Route::post('policy/{id}','PolicyController@policy')->name('policy');

});
