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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get("edicao","EdicaoController@cadastroEdicaoGet")->name('edicaoGet');
    Route::post("edicao","EdicaoController@cadastroEdicaoPost")->name('edicaoPost');

});


Route::get("uploads/{filename}","FileController@show")->middleware('auth');