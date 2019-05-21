<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contato', ['uses'=>'ContatoController@index']);// a rota direciona para o controller
Route::post('/contato', ['uses'=>'ContatoController@criar']);
Route::put('/contato', ['uses'=>'ContatoController@editar']);

//cursos
Route::get('admin/cursos', ['as'=>'admin.cursos', 'uses'=>'CursoController@index']);
Route::get('admin/cursos/adicionar', ['as'=>'admin.cursos.adicionar', 'uses'=>'CursoController@adicionar']);
Route::post('admin/cursos/salvar', ['as'=>'admin.cursos.salvar', 'uses'=>'CursoController@salvar']);
Route::get('admin/cursos/editar{id}', ['as'=>'admin.cursos.editar', 'uses'=>'CursoController@editar']);
Route::put('admin/cursos/atualizar{id}', ['as'=>'admin.cursos.atualizar', 'uses'=>'CursoController@atualizar']);
Route::put('admin/cursos/deletar{id}', ['as'=>'admin.cursos.deletar', 'uses'=>'CursoController@deletar']);
