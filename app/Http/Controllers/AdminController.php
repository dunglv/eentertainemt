<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
	public function index()
	{
		$categories = Category::with(['articles'=> function($query){
			$query->orderBy('created_at', 'DESC');
		}])->get()->map(function($cate){
			$cate->articles = $cate->articles->take(5);
			return $cate;
		});

		//articles need approved
		$a_articles = Article::orderBy('created_at', 'DESC')->where('status', '=', 0)->take(5)->get();
		//articles newest
		$n_articles = Article::orderBy('created_at', 'DESC')->take(5)->get();
		// echo "<pre>";
		// print_r($a_articles);
		// echo "</pre>";
		// exit();
		return view('admin.main')->with(['categories'=> $categories, 'a_articles' => $a_articles, 'n_articles' => $n_articles]);
	}

    public function create(){
    	return view('admin.article_create');
    }


    public function upload_img()
    {
    	if(Input::has('a_h_thumbnail')){
    		return Input::get('a_h_thumbnail');
    	}else{
    		return Input::get('a_thumbnail');
    	}
    }


}
