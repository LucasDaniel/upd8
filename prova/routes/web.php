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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/usuario/adicionar', 'App\Http\Controllers\UsuarioController@create')->name('usuario.adicionar');
Route::post('/usuario/adicionar', 'App\Http\Controllers\UsuarioController@add')->name('usuario.adicionar');
Route::get('/usuario/consulta', 'App\Http\Controllers\UsuarioController@consultar')->name('usuario.consulta');
Route::post('/usuario/consultar', 'App\Http\Controllers\UsuarioController@search')->name('usuario.consultar');
Route::get('/usuario/consultar', 'App\Http\Controllers\UsuarioController@search')->name('usuario.consultar');
Route::get('/usuario/excluir/{id}', 'App\Http\Controllers\UsuarioController@delete')->name('usuario.excluir');
Route::get('/usuario/editar/{id}', 'App\Http\Controllers\UsuarioController@editar')->name('usuario.editar');
