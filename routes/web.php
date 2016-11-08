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
    return view('auth/login');
    
});

Route::get('home', function (){
    return view('home');
    
});

Route::group(['prefix' => 'admin','middleware' => 'auth.checkrole', 'as' => 'admin.'], function(){

Route::get('users', ['as'=> 'users','uses'=>'UsersController@index']);
Route::get('create',['as' => 'create', 'uses' =>'UsersController@create']);
Route::get('edit/{id}',['as' => 'edit', 'uses' =>'UsersController@edit']);
Route::get('remove/{id}',['as' => 'remove', 'uses' =>'UsersController@remove']);
Route::post('update/{id}',['as' => 'update', 'uses' =>'UsersController@update']);
Route::post('store',['as' => 'store', 'uses' =>'UsersController@store']);



});


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

Route::get('/mensalidades/user/pagar/{id}', ['as'=> 'mensalidades.pagar','uses'=>'MensalidadesController@pagar']);
Route::get('/mensalidades/create', ['as'=> 'mensalidades.create','uses'=>'MensalidadesController@create']);
Route::get('/mensalidades/insert', ['as'=> 'mensalidades.insert','uses'=>'MensalidadesController@insert']);
Route::get('/mensalidades/edit', ['as'=> 'mensalidades.edit','uses'=>'MensalidadesController@edit']);
Route::post('/mensalidades/store',['as' => 'mensalidades.store', 'uses' =>'mensalidadesController@store']);
Route::post('/mensalidades/update', ['as'=> 'mensalidades.update','uses'=>'MensalidadesController@update']);