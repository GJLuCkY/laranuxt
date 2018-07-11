<?php


// Authentication Routes...
Route::get('login', '\Backpack\Base\app\Http\Controllers\Auth\LoginController@showLoginForm')->name('backpack.auth.login');
Route::post('login', '\Backpack\Base\app\Http\Controllers\Auth\LoginController@login');
Route::get('logout', '\Backpack\Base\app\Http\Controllers\Auth\LoginController@logout')->name('backpack.auth.logout');
Route::post('logout', '\Backpack\Base\app\Http\Controllers\Auth\LoginController@logout');

// Registration Routes...
Route::get('register', '\Backpack\Base\app\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('backpack.auth.register');
Route::post('register', '\Backpack\Base\app\Http\Controllers\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', '\Backpack\Base\app\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('backpack.auth.password.reset');
Route::post('password/reset', '\Backpack\Base\app\Http\Controllers\Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', '\Backpack\Base\app\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
Route::post('password/email', '\Backpack\Base\app\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email');

Route::get('dashboard', '\Backpack\Base\app\Http\Controllers\AdminController@dashboard');
Route::get('/', '\Backpack\Base\app\Http\Controllers\AdminController@redirect');

Route::group(['prefix' => config('backpack.base.route_prefix'), 'middleware' => ['admin']], function()
{
CRUD::resource('product', 'ProductCrudController');
CRUD::resource('category', 'CategoryCrudController');

});