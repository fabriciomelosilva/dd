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

    //editar Edição
    Route::get("/editar_edicao/{edicao} ", "EdicaoController@editEdicaoGet")->name('editarEdicaoGet');
    Route::post("/editar_edicao/{id}", "EdicaoController@update")->name('editarEdicaoPost');

    //alterar status de Edição
    Route::post("/alterar_edicao_status/{id}","EdicaoController@alterarStatus")->name('alterarEdicaoStatusPost');

    //criar Classificado
    Route::get("/classificado","ClassificadoController@cadastroClassificadoGet")->name('classificadoGet');
    Route::post("/classificado","ClassificadoController@store")->name('classificadoPost');
    
    //Lista de Classificado
    Route::get("/lista_classificado","ClassificadoController@listClassificado")->name('lista_classificado');

    //editar Classificado
    Route::get("/editar_classificado/{classificado} ", "ClassificadoController@editClassificadoGet")->name('editarClassificadoGet');
    Route::post("/editar_classificado/{id}", "ClassificadoController@update")->name('editarClassificadoPost');

    //alterar status de Classificado
    Route::post("/alterar_classificado_status/{id}","ClassificadoController@alterarStatus")->name('alterarClassificadoStatusPost');

    //acessar pdfs no store. Utilizada no preview do admin
    Route::post("/visualizar","FileController@toView")->name('visualizar');
    Route::get("/uploads/app/{tipo}/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploads');
    Route::get("/uploadsThumb/app/{tipo}/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsThumb');

    //cadastar usuários
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

});


//Área do Assinante
Route::group(['middleware' => ['auth', 'role:assinante']], function() {

  Route::get('/assinante', 'AssinanteController@index')->name('assinante');
  Route::post("/edicaoAssinante","FileController@listFrontAssinante")->name('edicaoAssinante');
  Route::get("/uploadsAssinante/app/{tipo}/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsAssinante');
  Route::get("/uploadsThumbAssinante/app/{tipo}/{ano}/{mes}/{dia}/{arquivo}/","FileController@show")->name('uploadsThumbAssinante');
  Route::get('/getMonths', 'AssinanteController@getMonthsByYear')->name('getMonthsByYear');
  
  Route::get('/buscaEdicao', 'AssinanteController@getPublicationsFilter')->name('buscaEdicao');

});