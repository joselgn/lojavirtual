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

    //CATEGORIAS
    Route::get('/lista-categoria', 'CategoriaController@index');
    Route::get('/categoria/{id?}', 'CategoriaController@novo');
    Route::post('/categoria/{id?}','CategoriaController@cadastrar');
    //Grid
    Route::post('/ajax-categoria-grid','CategoriaController@ajaxGrid');//categoria
    //Delete
    Route::delete('/ajax-categoria-delete/{id?}','CategoriaController@delete');//Categoria


    //USUARIOS
    Route::get('/lista-usuarios', 'UsuarioController@index');
    Route::get('/usuario/{id?}', 'UsuarioController@tela');
    Route::post('/usuario/{id?}','UsuarioController@salvar');
    //Grid
    Route::post('/ajax-usuario-grid','UsuarioController@ajaxGrid');
    //Delete
    Route::delete('/ajax-usuario-delete/{id?}','UsuarioController@delete'); //USUARIOS


    //CARACTERISTICAS DO PRODUTO
    Route::get('/lista-caracteristicas', 'CaracteristicaController@index');
    Route::get('/caracteristica/{id?}', 'CaracteristicaController@tela');
    Route::post('/caracteristica/{id?}','CaracteristicaController@salvar');
    //Grid
    Route::post('/ajax-caracteristica-grid','CaracteristicaController@ajaxGrid');
    //Delete
    Route::delete('/ajax-caracteristica-delete/{id?}','CaracteristicaController@delete');

});//auth routes

