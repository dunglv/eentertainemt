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

Route::get('/', function () {
    return view('layout.home');
});
Route::get('/detail', function(){
	return view('article.detail');
});
Route::get('/abcxyz', function(){
	return view('admin.login');
});
Route::get('/abcd', [
	'as' => 'admin.home',
	'uses' => 'AdminController@index'
	]);
Route::get('/abcd/article/create', [
		'as' => 'article.create',
		'uses' => 'ArticleController@create'
	]);
Route::post('/abcd/article/create', [
		'as' => 'article.store',
		'uses' => 'ArticleController@store'
		]);
Route::post('/abcd/article/checkexists', [
		'as' => 'article.checkexists',
		'uses' => 'ArticleController@checkexists'
		]);