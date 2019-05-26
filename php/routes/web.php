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
// a rota direciona para o controller
Route::get('/',
  ['as'=>'home', 'uses'=>'SiteHomeController@index']);

//login
Route::get('/login',
  ['as'=>'login', 'uses'=>'SiteLoginController@index'])  ;
Route::post('/login/entrar',
  ['as'=>'login.entrar', 'uses'=>'SiteLoginController@entrar'])  ;
Route::get('/login/sair',
  ['as'=>'login.sair', 'uses'=>'SiteLoginController@sair'])  ;

//contato
Route::get('/contato',
  ['as'=>'contato', 'uses'=>'ContatoController@index']);
Route::post('/contato',
  ['as'=>'contato.criar', 'uses'=>'ContatoController@criar']);
Route::put('/contato',
  ['as'=>'contato.editar', 'uses'=>'ContatoController@editar']);

//rotas que só serão acessiveis a usuários autenticados
Route::group(['middleware'=>'auth'], function(){
  //cursos
  Route::get('admin/cursos',
    ['as'=>'admin.cursos', 'uses'=>'CursoController@index']);
  Route::get('admin/cursos/adicionar',
    ['as'=>'admin.cursos.adicionar', 'uses'=>'CursoController@adicionar']);
  Route::post('admin/cursos/salvar',
    ['as'=>'admin.cursos.salvar', 'uses'=>'CursoController@salvar']);
  Route::get('admin/cursos/editar{id}',
    ['as'=>'admin.cursos.editar', 'uses'=>'CursoController@editar']);
  Route::put('admin/cursos/atualizar{id}',
    ['as'=>'admin.cursos.atualizar', 'uses'=>'CursoController@atualizar']);
  Route::get('admin/cursos/deletar{id}',
    ['as'=>'admin.cursos.deletar', 'uses'=>'CursoController@deletar']);
});
