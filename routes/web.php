<?php

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
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
    Route::get('/register/', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register/', 'Auth\RegisterController@register');


    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('/users')->group(function () {
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/create', 'UserController@store')->name('users.store');
        Route::get('/{id}/delete', 'UserController@destroy')->name('users.destroy');
        Route::get('/{id}/update', 'UserController@update')->name('users.update');
        Route::post('/{id}/update', 'UserController@edit')->name('users.edit');
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/create', 'CategoryController@create')->name('categories.create');
        Route::post('/create', 'CategoryController@store')->name('categories.store');
        Route::get('/', 'CategoryController@index')->name('categories.index');
    });
});
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

