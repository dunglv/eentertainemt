<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Input;
class ArticleController extends Controller
{
    public function create()
    {
    	$cate = Category::all();
    	return view('admin.article_create')->with('categories', $cate);
    }

    public function store()
    {
    	
    	if (Input::file('a_thumbnail')->isValid()) {
    		$path = public_path().'/images/items/';
	    	$extension = Input::file('a_thumbnail')->getClientOriginalExtension();
	    	$filename = rand(10000,999999).'.'.$extension;
    		Input::file('a_thumbnail')->move($path, $filename);

    	}
    	// $filename = Input::file('a_thumbnail');
    	// echo '<pre>';
    	// print_r(Input::get('a_url')); exit();
    	// echo '</pre>';

    	$article = new Article;
    	$article->categories_id = Input::get('a_cate');
    	$article->members_id = 3;
    	$article->title = Input::get('a_title');
    	$article->url = Input::get('a_url');
    	$article->type = Input::get('a_type');
    	$article->description = Input::get('a_desc');
    	$article->content = Input::get('a_content');
    	$article->thumbnail = $path.$filename ;
    	$article->tag = Input::get('a_tag');
    	$article->status = Input::get('a_status');
    	$article->save();
    	return redirect()->route('article.create');
    }


}
