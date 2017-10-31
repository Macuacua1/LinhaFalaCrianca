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

//Route::get('/', function () {
//    return view('wizard');
//});
//Route::get('/home', function () {
//    return view('layouts/master');
//});
Auth::routes();
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('/home','HomeController@provfunct');
Route::get('/','HomeController@provfunct');
Route::get('/chart','HomeController@index');
Route::get('/reg', function () {
    return view('contacto/reg_contacto');
});
Route::get('/perfil', function () {
    return view('user/profile');
});
//Route::post('/criar-conta','UserController@criarConta');
//Route::get('perfil','UserController@getPerfil');
Route::resource('contacto','ContactoController');
Route::resource('caso','CasoController');
Route::resource('user','UserController');
Route::post('/registarcontacto','ContactoController@addcontacto');
Route::get('/criarcaso/{id}','CasoController@criarcaso');
Route::get('/criarcaso','CasoController@create');
Route::post('/addcaso','ChartCasoController@addcaso');
Route::get('/chartteste','ChartCasoController@chart');
Route::post('/editcaso','CasoController@editcaso');
Route::post('/registarcontacto','ContactoController@addcontacto');
Route::post('/addUtente','ContactoController@addUtente');
Route::post('/pesquisarcaso','CasoController@pesquisarcaso');
Route::post('/pesquisacaso','ChartCasoController@pesquisacaso');
Route::post('/pesquisacontacto','ChartContactoController@pesquisacontacto');

Route::get('/findDistrito','EnderecoController@findDistrito');
Route::get('/findLocalidade','EnderecoController@findLocalidade');
Route::get('/findmotivo','EnderecoController@findmotivo');
Route::post('/block_user','UserController@block_user');



//Graficos
Route::get('/report_contacto','ChartContactoController@report_contacto');
Route::get('/reportacaso','ChartCasoController@reportcaso');