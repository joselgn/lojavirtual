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

    //USUARIOS
    Route::get('/lista-usuarios', 'UsuarioController@index');
    Route::get('/usuario/{id?}', 'UsuarioController@tela');
    Route::post('/usuario/{id?}','UsuarioController@salvar');
    //AJAX
    Route::post('/ajax-usuario-grid','UsuarioController@ajaxGrid');//Grid
    //Delete
    Route::delete('/ajax-usuario-delete/{id?}','UsuarioController@delete'); //USUARIOS

    //CATEGORIAS
    Route::get('/lista-categoria', 'CategoriaController@index');
    Route::get('/categoria/{id?}', 'CategoriaController@novo');
    Route::post('/categoria/{id?}','CategoriaController@cadastrar');
    //AJAX
    Route::post('/ajax-categoria-grid','CategoriaController@ajaxGrid');//Grid
    Route::post('/ajax-categoria-busca','CategoriaController@ajaxBusca');//Busca
    //Delete
    Route::delete('/ajax-categoria-delete/{id?}','CategoriaController@delete');//Categoria


    //CARACTERISTICAS
    Route::get('/lista-caracteristicas', 'CaracteristicaController@index');
    Route::get('/caracteristica/{id?}', 'CaracteristicaController@tela');
    Route::post('/caracteristica/{id?}','CaracteristicaController@salvar');
    //AJAX
    Route::post('/ajax-caracteristica-grid','CaracteristicaController@ajaxGrid');//GRID
    Route::post('/ajax-caracteristica-busca','CaracteristicaController@ajaxBusca');//Busca Caracteristicas
    //Delete
    Route::delete('/ajax-caracteristica-delete/{id?}','CaracteristicaController@delete');


    //PRODUTOS
    Route::get('/lista-produtos', 'ProdutoController@index');
    Route::get('/produto/{id?}', 'ProdutoController@tela');
    Route::post('/produto/{id?}','ProdutoController@salvar');
    //Grid
    Route::post('/ajax-produto-grid','ProdutoController@ajaxGrid');
    //Delete
    Route::delete('/ajax-produto-delete/{id?}','ProdutoController@delete');

});//auth routes

