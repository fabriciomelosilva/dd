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

//Auth::routes();


// Authentication Routes...

//Rotas login admin
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

//Rotas login assinante
Route::get('loginAssinante', 'AuthAssinantes\LoginAssinanteController@showLoginForm')->name('loginAssinante');
Route::post('loginAssinante', 'AuthAssinantes\LoginAssinanteController@login')->name('loginAssinante');
Route::get('/logoutAssinante', 'AuthAssinantes\LoginAssinanteController@logout');

//Acesso Negado
Route::get('/acessonegado', 'UserController@getPermissao');


Route::group(['middleware' => ['auth', 'role:admin']], function() {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get("edicao","EdicaoController@cadastroEdicaoGet")->name('edicaoGet');
    Route::post("edicao","EdicaoController@store")->name('edicaoPost');
    Route::get("lista_edicao","EdicaoController@listEdicao")->name('lista_edicao');

    //acessar pdfs no store. Utilizada no preview do admin
    Route::post("front","EdicaoController@listFront")->name('front');
    Route::get("uploads/app/edicao/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploads');
    Route::get("uploadsThumb/app/edicao/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsThumb');

    //editar
    Route::post("editar/{id}","EdicaoController@update")->name('editarEdicaoPost');
    Route::get("editar/{edicao} ","EdicaoController@editEdicaoGet")->name('editarEdicaoGet');

    //alterar status
    Route::post("alterarstatus/{id}","EdicaoController@alterarStatus")->name('alterarStatusPost');

    //cadastar usuários
    Route::post('register', 'Auth\RegisterController@register');

    Route::get('register', [
      'as' => 'register',
      'uses' => 'Auth\RegisterController@showRegistrationForm'
    ]);

    // Password Reset Routes...
    Route::post('password/email', [
      'as' => 'password.email',
      'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
    ]);
    Route::get('password/reset', [
      'as' => 'password.request',
      'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
    ]);
    Route::post('password/reset', [
      'as' => '',
      'uses' => 'Auth\ResetPasswordController@reset'
    ]);
    Route::get('password/reset/{token}', [
      'as' => 'password.reset',
      'uses' => 'Auth\ResetPasswordController@showResetForm'
    ]);

});


//Área do Assinante
Route::group(['middleware' => ['auth', 'role:assinante']], function() {

  Route::get('/assinante', 'AssinanteController@index')->name('assinante');
  Route::post("edicaoAssinante","EdicaoController@listFrontAssinante")->name('edicaoAssinante');
  Route::get("uploadsAssinante/app/edicao/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsAssinante');
  Route::get("uploadsThumbAssinante/app/edicao/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsThumbAssinante');
  Route::get('/getMonths', 'AssinanteController@getMonthsByYear')->name('getMonthsByYear');
  
  Route::get('/buscaEdicao', 'AssinanteController@getPublicationsFilter')->name('buscaEdicao');

});