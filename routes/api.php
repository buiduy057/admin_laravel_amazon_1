<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Product;
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
Route::get('/listProduct','ApiController@list');
Route::put('/updateVariantProduct/{id}','ApiController@updateVariant');
Route::put('/product/{id}','ApiController@update')->name('updateProduct');
