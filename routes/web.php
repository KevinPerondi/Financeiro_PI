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
Route::post('/users/store',['as' => 'users.store', 'uses' =>'UsersController@store']);

Route::get('/despesas', ['as'=> 'despesas.home','uses'=>'DespesasController@index']);
Route::get('/despesas/create',['as' => 'despesas.create', 'uses' =>'DespesasController@create']);
Route::post('/despesas/store',['as' => 'despesas.store', 'uses' =>'DespesasController@store']);