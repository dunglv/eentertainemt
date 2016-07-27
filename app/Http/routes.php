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
	return view('admin.home');
});