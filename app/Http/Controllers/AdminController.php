<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
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
		// echo "<pre>";
		// print_r($categories);
		// echo "</pre>";
		return view('admin.main')->with('categories', $categories);
	}

    public function create(){
    	return view('admin.article_create');
    }


}
