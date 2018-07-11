<?php

use Illuminate\Http\Request;

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

Route::get('/', function () {
    return ['hello from api'];
});



Route::get('/catalog/{category}', 'CategoryAPIController@getCategoryProducts');
Route::get('/catalog/{category}/{product}', 'ProductAPIController@getProduct');
Route::get('/catalog', 'CategoryAPIController@getCategories');