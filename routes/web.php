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




Auth::routes();


Route::get('/', function (){
    return view('home');
    
});
Route::get('/users', ['as'=> 'users.home','uses'=>'UsersController@index']);
Route::get('/users/create',['as' => 'users.create', 'uses' =>'UsersController@create']);
Route::get('/users/edit/{id}',['as' => 'users.edit', 'uses' =>'UsersController@edit']);
Route::get('/users/remove/{id}',['as' => 'users.remove', 'uses' =>'UsersController@remove']);
Route::post('/users/update/{id}',['as' => 'users.update', 'uses' =>'UsersController@update']);
Route::post('/users/store',['as' => 'users.store', 'uses' =>'UsersController@store']);

Route::get('/despesas', ['as'=> 'despesas.home','uses'=>'DespesasController@index']);
Route::get('/despesas/create',['as' => 'despesas.create', 'uses' =>'DespesasController@create']);
Route::get('/despesas/edit/{id}',['as' => 'despesas.edit', 'uses' =>'DespesasController@edit']);
Route::get('/despesas/remove/{id}',['as' => 'despesas.remove', 'uses' =>'DespesasController@remove']);
Route::post('/despesas/update/{id}',['as' => 'despesas.update', 'uses' =>'DespesasController@update']);
Route::post('/despesas/store',['as' => 'despesas.store', 'uses' =>'DespesasController@store']);


Route::get('/doacoes', ['as'=> 'doacaos.home','uses'=>'DoacaosController@index']);
Route::get('/doacoes/create',['as' => 'doacaos.create', 'uses' =>'DoacaosController@create']);
Route::get('/doacoes/edit/{id}',['as' => 'doacaos.edit', 'uses' =>'DoacaosController@edit']);
Route::get('/doacoes/remove/{id}',['as' => 'doacaos.remove', 'uses' =>'DoacaosController@remove']);
Route::post('/doacoes/update/{id}',['as' => 'doacaos.update', 'uses' =>'DoacaosController@update']);
Route::post('/doacoes/store',['as' => 'doacaos.store', 'uses' =>'DoacaosController@store']);


Route::get('/mensalidades/user/{user_id}', ['as'=> 'mensalidades.user','uses'=>'MensalidadesController@user']);
Route::post('/mensalidades/store',['as' => 'mensalidades.store', 'uses' =>'mensalidadesController@store']);

Route::get('/mensalidades/user/edit/{id}', ['as'=> 'mensalidades.edit','uses'=>'MensalidadesController@edit']);
//Route::get('/mensalidades/geral', ['as'=> 'mensalidades.geral','uses'=>'MensalidadesController@geral']);
Route::get('/mensalidades/create', ['as'=> 'mensalidades.create','uses'=>'MensalidadesController@create']);
Route::get('/mensalidades/insert', ['as'=> 'mensalidades.insert','uses'=>'MensalidadesController@insert']);