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
Route::get('/home', 'HomeController@index');

/**
 * Filmes
 */
Route::get('/', ['as' => 'filmes::listar', 'uses' => 'HomeController@index']);
Route::get('/cadastrar', ['as' => 'filmes::cadastrar', 'uses' => 'FilmesController@create']);
Route::post('/cadastrar', ['as' => 'filmes::salvar', 'uses' => 'FilmesController@store']);
Route::get('/editar/{id}', ['as' => 'filmes::editar', 'uses' => 'FilmesController@edit']);
Route::post('/delete', ['as' => 'filmes::deletar', 'uses' => 'FilmesController@delete']);

/**
 * Categorias
 */
Route::post('/categoria', ['as' => 'categorias::salvar', 'uses' => 'CategoriasController@store']);