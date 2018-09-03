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

//GET Routes
Route::get('/', 'IndexController@index');
Route::get('/registro', 'IndexController@novoRegistro');
Route::get('/logout', 'Auth\LoginController@logout');

//AUTH Rotes
Auth::routes();
Route::middleware('auth')->group(function () {
    //Home - Index Admin
    Route::get('/home', 'HomeController@index')->name('home');

    //Categorias
    Route::get('/lista-categoria', 'CategoriaController@index');
    Route::get('/categoria/{id?}', 'CategoriaController@novo');
    Route::post('/categoria/{id?}','CategoriaController@cadastrar');
    //GRID
    Route::post('/ajax-categoria-grid','CategoriaController@ajaxGrid');//categoria
    //DELETE
    Route::delete('/ajax-categoria-delete/{id?}','CategoriaController@delete');//Categoria



});//auth routes

