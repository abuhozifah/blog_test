<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PostsController@index');

Route::get('posts', 'PostsController@index');

Route::post('search', 'PostsController@search');

Route::get('search', 'PostsController@index');

Route::get('add', 'PostsController@add');

Route::post('add', 'PostsController@add_act');

Route::post('comment', 'PostsController@comment');

Route::get('post/{id}', 'PostsController@view');

Route::get('login', 'UsersController@login');

Route::post('login', 'UsersController@login_act');

Route::get('logout', 'UsersController@logout');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
