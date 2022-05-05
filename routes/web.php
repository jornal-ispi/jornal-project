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
Route::get('/portefolio', "HomeController@portefolio");
Route::group(['prefix' => "user"], function () {
    Route::get('/login', "UserController@login")->name('login')->middleware('guest');
    Route::post('/logar', "UserController@logar");
    Route::get('/logout', "UserController@logout")->name('logout');
    Route::get('/perfil', "UserController@perfil");
});


Route::group(['prefix' => "usuario", 'middleware' => "auth.admin"], function () {
    Route::get('/list', "UserController@index");
    Route::get('/create', "UserController@create");
    Route::post('/store', "UserController@store");
    Route::get('/edit/{id}', "UserController@edit");
    Route::put('/update/{id}', "UserController@update");
});

Route::group(['prefix' => "noticia", 'middleware' => "auth"], function () {
    Route::get('/list', "NoticiaController@index")->middleware('auth.adm.escr.edi');
    Route::get('/create', "NoticiaController@create")->middleware('auth.adm.escr.edi');
    Route::post('/store', "NoticiaController@store")->middleware('auth.adm.escr.edi');
    Route::get('/edit/{id}', "NoticiaController@edit")->middleware('auth.adm.escr.edi');
    Route::put('/update/{id}', "NoticiaController@update")->middleware('auth.adm.escr.edi');
    Route::get('/single/{id}', "HomeController@single");
    Route::get('/destroy/{id}', "NoticiaController@destroy")->middleware('auth.adm.escr.edi');
    Route::get('/divulgar/{id}', "NoticiaController@divulgar")->middleware('auth.adm.escr.edi');
    Route::get('/habilitar/{id}', "NoticiaController@habilitar")->middleware('auth.adm.escr.edi');
    Route::get('/ocultar/{id}', "NoticiaController@ocultar")->middleware('auth.adm.escr.edi');
});

Route::group(['prefix' => "chat"], function () {
    Route::get('/list', "ChatController@index");
    Route::get('/create', "ChatController@create");
    Route::post('/store', "ChatController@store");
    Route::get('/show/{id}', "ChatController@show");
});

Route::group(['prefix' => "subscritores", 'middleware' => "auth.admin"], function () {
    Route::get('/list', "SubscritorController@index");
    Route::post('/subscribe', "SubscritorController@subscribe");
    Route::get('/create', "SubscritorController@create");
    Route::post('/store', "SubscritorController@store");
});