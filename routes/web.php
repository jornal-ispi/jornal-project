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

Route::get('/', "HomeController@index")->name('home')->middleware('auth');

Route::group(['prefix' => "user"], function () {
    Route::get('/login', "UserController@login")->name('login')->middleware('guest');
    Route::post('/logar', "UserController@logar");
    Route::get('/logout', "UserController@logout")->name('logout');
});
