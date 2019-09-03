<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|Here is where you can register admin routes for your application. These routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::resource('movie', 'MovieController');
Route::get('movie/destroy/{id}',['as'=>'movie/destroy','uses'=>'MovieController@destroy']);
Route::get('movie/update/{id}',['as'=>'movie/update','uses'=>'MovieController@update']);
Route::post('movie/show',['as'=>'movie/show','uses'=>'MovieController@show']);

Route::resource('user', 'UserController');
Route::get('user/destroy/{id}',['as'=>'user/destroy','uses'=>'UserController@destroy']);
Route::get('user/update/{id}',['as'=>'user/update','uses'=>'UserController@update']);
Route::post('user/show',['as'=>'user/show','uses'=>'UserController@show']);

Route::resource('status', 'StatusController');
Route::get('status/destroy/{id}',['as'=>'status/destroy','uses'=>'StatusController@destroy']);
Route::get('status/update/{id}',['as'=>'status/update','uses'=>'StatusController@update']);
Route::post('status/show',['as'=>'status/show','uses'=>'StatusController@show']);

Route::resource('category', 'CategoryController');
Route::get('category/destroy/{id}',['as'=>'category/destroy','uses'=>'CategoryController@destroy']);
Route::get('category/update/{id}',['as'=>'category/update','uses'=>'CategoryController@update']);
Route::post('category/show',['as'=>'category/show','uses'=>'CategoryController@show']);
