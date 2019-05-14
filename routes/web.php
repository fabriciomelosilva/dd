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
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

//Rotas login assinante
Route::get('/loginAssinante', 'AuthAssinantes\LoginAssinanteController@showLoginForm')->name('loginAssinante');
Route::post('/loginAssinante', 'AuthAssinantes\LoginAssinanteController@login')->name('loginAssinante');
Route::get('/logoutAssinante', 'AuthAssinantes\LoginAssinanteController@logout');

//Acesso Negado
Route::get('/acessonegado', 'UserController@getPermissao');


Route::group(['middleware' => ['auth', 'role:admin']], function() {

    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/home', 'HomeController@index')->name('home');

    //criar Edição
    Route::get("/edicao","EdicaoController@cadastroEdicaoGet")->name('edicaoGet');
    Route::post("/edicao","EdicaoController@store")->name('edicaoPost');
    
    //Lista de Edições
    Route::get("/lista_edicao","EdicaoController@listEdicao")->name('lista_edicao');

    //acessar pdfs no store. Utilizada no preview do admin
    Route::post("/visualizar","EdicaoController@toView")->name('visualizar');
    Route::get("/uploads/app/edicao/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploads');
    Route::get("/uploadsThumb/app/edicao/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsThumb');

    //editar Edição
    Route::get("/editar/{edicao} ", "EdicaoController@editEdicaoGet")->name('editarEdicaoGet');
    Route::post("/editar/{id}", "EdicaoController@update")->name('editarEdicaoPost');

    //alterar status
    Route::post("/alterarstatus/{id}","EdicaoController@alterarStatus")->name('alterarStatusPost');

    //cadastar usuários
    Route::post('/register', 'Auth\RegisterController@register');

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    // Password Reset Routes...
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

});


//Área do Assinante
Route::group(['middleware' => ['auth', 'role:assinante']], function() {

  Route::get('/assinante', 'AssinanteController@index')->name('assinante');
  Route::post("/edicaoAssinante","EdicaoController@listFrontAssinante")->name('edicaoAssinante');
  Route::get("/uploadsAssinante/app/edicao/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsAssinante');
  Route::get("/uploadsThumbAssinante/app/edicao/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsThumbAssinante');
  Route::get('/getMonths', 'AssinanteController@getMonthsByYear')->name('getMonthsByYear');
  
  Route::get('/buscaEdicao', 'AssinanteController@getPublicationsFilter')->name('buscaEdicao');

});