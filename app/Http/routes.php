<?php
use App\Article;
use Illuminate\Http\Request;
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
// $routes = Route::getRoutes();
// echo '<pre>';
// print_r(Route::has('article.detail')); 
// echo '</pre>';
// exit();

Route::get('/', [
	'as' => 'front.home',
	'uses' => 'ArticleController@get_home_article'
	]);
Route::get('/change_language', [
	'as' => 'front.lang',
	'uses' => 'HomeController@getLanguage'
	]);

Route::get('/tag/{tag}', [
	'as' => 'front.tag',
	'uses' => 'HomeController@resultTag'
	]);
Route::get('/article/{url}', [
	'as' => 'front.detail_article',
	'uses' => 'ArticleController@detail_home_article'
	]);

Route::get('/category/{url}', [
	'as' => 'front.detail_category',
	'uses' => 'CategoryController@detail'
	]);
// Route::get('/abcxyz', function(){
// 	return view('admin.login');
// });

Route::get('/search', [
	'as' => 'front.search',
	'uses' => 'HomeController@resultSearch',
	]);


// *********************************************************
// MANGE ROUTE IN ADMIN DASHBOARD
//**********************************************************

Route::get('/adminlogin', [
	'as' => 'admin.login',
	'uses' => 'AdminController@getLogin'
	]);
Route::post('/adminlogin', [
	'as' => 'admin.postlogin',
	'uses' => 'AdminController@postLogin'
	]);

Route::get('/ajax/articles', 'CategoryController@loadAjaxArticlePage');
Route::get('/comment/create', [
	'as' => 'comment.create',
	'uses' => 'CommentController@store'
	]);
Route::post('/comment/create', [
	'as' => 'comment.store',
	'uses' => 'CommentController@store'
	]);
//******************
// ADMIN ROUTE
//********************
Route::group(['prefix'=>'abcd', 'middleware' => 'login'], function(){
	//Logout
	Route::get('/logout', [
		'as' => 'admin.logout',
		'uses' => 'AdminController@logout'
		]);

	Route::get('/article/destroy', 'ArticleController@destroy');

	Route::get('/', [
		'as' => 'admin.home',
		'uses' => 'AdminController@index'
		]);

	Route::get('/article/create', [
			'as' => 'article.create',
			'uses' => 'ArticleController@create'
		]);
	Route::post('/article/create', [
			'as' => 'article.store',
			'uses' => 'ArticleController@store'
			]);
	Route::post('/article/checkexists', [
			'as' => 'article.checkexists',
			'uses' => 'ArticleController@checkexists'
			]);
	Route::get('/article/{url}',[
		'as' => 'article.edit',
		'uses' => 'ArticleController@edit'
		]);

	Route::put('/article/{url}',[
		'as' => 'article.update',
		'uses' => 'ArticleController@update'
		]);

	Route::get('/category/', [
		'as' => 'category.index',
		'uses' => 'CategoryController@index'
		]);
	Route::get('/category/destroy', [
		'as' => 'category.destroy',
		'uses' => 'CategoryController@destroy'
		]);
	Route::get('/category/create', [
		'as' => 'category.create',
		'uses' => 'CategoryController@create'
		]);
	Route::post('/category/create', [
		'as' => 'category.store',
		'uses' => 'CategoryController@store'
		]);
	Route::get('/category/{url}', [
		'as' => 'category.edit',
		'uses' => 'CategoryController@edit'
		]);
	Route::put('/category/{url}', [
		'as' => 'category.update',
		'uses' => 'CategoryController@update'
		]);

	Route::post('/upload_image', 'AdminController@upload_img');

	Route::get('/comment', [
		'as' => 'comment.home',
		'uses' => 'CommentController@index'
		]);
	


	/**********************************************************/
	/* 						MENU                              */
	/**********************************************************/
	Route::get('/menu', [
		'as' => 'menu.index',
		'uses' => 'MenuController@index'
		]);
	Route::get('/menu/create', [
		'as' => 'menu.create',
		'uses' => 'MenuController@create'
		]);
	Route::post('/menu/create', [
		'as' => 'menu.store',
		'uses' => 'MenuController@store'
		]);
	Route::get('/menu/edit/{url}', [
		'as' => 'menu.edit',
		'uses' => 'MenuController@edit'
		]);
	Route::put('/menu/edit/{url}', [
		'as' => 'menu.update',
		'uses' => 'MenuController@update'
		]);
	Route::get('/menu/getdata_object', [
		'as' => 'menu.getdata_object',
		'uses' => 'MenuController@getdata_object'
		]);
	Route::get('/menu/hide', [
		'as' => 'menu.hide',
		'uses' => 'MenuController@hide'
		]);
});


Route::auth();

Route::get('/home', 'HomeController@index');
// $routeCollection = Route::getRoutes();

// foreach ($routeCollection as $value) {
//     echo $value->getPath().'<br>';
// }
Route::get('/get-payment', [
	'as' => 'payment.index',
	'uses' => 'PaypalController@get_payment'
	]);
// Route::post('/post-payment', [
// 	'as' => 'payment.process',
// 	'uses' => 'PaypalController@post_payment'
// 	]);
Route::post('/get-payment', [
	'as' => 'payment.process',
	'uses' => 'PaypalController@post_payment_id_card'
	]);
Route::get('/status-payment', [
	'as' => 'payment.status',
	'uses' => 'PaypalController@get_payment_status'
	]);

