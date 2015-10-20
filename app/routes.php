<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showPortfolio');

Route::get('simplesimon', 'HomeController@showSimpleSimon');

Route::get('whack-a-mouse', 'HomeController@showWhackAMole');

Route::get('calculator', 'HomeController@showCalculator');

Route::get('resume', 'HomeController@showResume');

Route::get('portfolio', 'HomeController@showPortfolio');

Route::get('eventfinder', 'HomeController@showEventfinder');

Route::post('posts/{id}/comment', 'PostsController@storeComment');

Route::get('/posts/list', 'PostsController@getList');

Route::get('/posts/manage', 'PostsController@getManage');

Route::get('posts/{id}/comment', 'PostsController@show');

Route::delete('posts/{id}/destroy', 'PostsController@destroyComment');

Route::resource('posts', 'PostsController');

Route::get('login', 'HomeController@showLogin');

Route::post('login', 'HomeController@doLogin');

Route::get('logout', 'HomeController@doLogout');

Route::get('userCreate', 'HomeController@showUserCreate');

Route::post('userCreate', 'HomeController@userCreate');

