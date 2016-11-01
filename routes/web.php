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

Route::get('/doacoes', ['as'=> 'doações.home','uses'=>'DoaçõesController@index']);
Route::get('/doacoes/create',['as' => 'doações.create', 'uses' =>'DoaçõesController@create']);
Route::get('/doacoes/edit/{id}',['as' => 'doações.edit', 'uses' =>'DoaçõesController@edit']);
Route::get('/doacoes/remove/{id}',['as' => 'doações.remove', 'uses' =>'DoaçõesController@remove']);
Route::post('/doacoes/update/{id}',['as' => 'doações.update', 'uses' =>'DoaçõesController@update']);
Route::post('/doacoes/store',['as' => 'doações.store', 'uses' =>'DoaçõesController@store']);