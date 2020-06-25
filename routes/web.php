<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//pega todos passageiros
Route::get('/passageiros','PassageiroController@index');

//cadastra passageiro
Route::post('/passageiros','PassageiroController@Insert');

//edita passageiro
Route::get('/passageiros/{id}','PassageiroController@indexUpdate')->name('detalhe_passageiro');

//post update passageiro
Route::post('/passageiros/{id}','PassageiroController@Update');

//pega form do passageiro por json
Route::get('/form_passageiros/{id}','PassageiroController@show')->name('form_passageiro');

//pega tabela com todos passageiros
Route::get('/passageiros_table','PassageiroController@content_table')->name('passageiros_table');

Route::get('/fretados','FretadoController@index');

Route::get('/fretados_table','FretadoController@content_table')->name('fretados_table');

Route::post('/fretados','FretadoController@Insert')->name('fretados');

Route::get('/fretados/{id}','FretadoController@indexUpdate');

Route::post('/fretados/{id}','FretadoController@Update');
