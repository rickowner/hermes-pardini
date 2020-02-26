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

Route::get('api','CadastroController@index');

Route::get('cadastros','CadastroController@create');

Route::post('store','CadastroController@store');

Route::get('edit','CadastroController@edit');

Route::get('cadastros/{id}/edit','CadastroController@edit');

Route::post('/update','CadastroController@update');