<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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
	    	$filename = date('Ymd').'_'.md5(rand(100,10000000)).'.'.$extension;
    		Input::file('a_thumbnail')->move($path, $filename);
    	}
    	// $filename = Input::file('a_thumbnail');
    	// echo '<pre>';
    	// print_r(Input::get('a_url')); exit();
    	// echo '</pre>';

    	$article = new Article;
    	$article->category_id = Input::get('a_cate');
    	$article->member_id = 3;
    	$article->title = Input::get('a_title');
    	$article->url = Input::get('a_url');
    	$article->type = Input::get('a_type');
    	$article->description = Input::get('a_desc');
    	$article->content = Input::get('a_content');
    	$article->thumbnail = '/images/items/'.$filename ;
    	$article->tag = Input::get('a_tag');
        if($article->save()){
            $article->status = Input::get('a_status');
            $cate = Category::all();
            return view('admin.article_create')->with(['categories'=> $cate, 'notied'=>'ok']);
        }else{
            return view('admin.article_create')->with(['categories'=> $cate, 'notied'=>'error']);
        }
    }


    public function checkexists()
    {
    	$title = Input::get('a_title_chk');
    	$url = Input::get('a_url_chk');
        $fn = Input::get('fn');
        if($fn=='update'){
            $id = Input::get('id');
            $titleck = Article::where('title','=', $title)->where('id','<>', $id);
        }else{
            $titleck = Article::where('title','=', $title);
        }
    	$urlck = Article::where('url','=', $url);
    	if($titleck->count() > 0){
    		return '_e_title';
    	}elseif($urlck->count() > 0){
    		return '_e_url';
    	}else{
    		return '_ok';
    	}
    }

    public function edit($url="")
    {
        $cate = Category::all();
        $id = Input::get('post');
        if(Input::get('type')=='post'){
            if(Input::get('fn')=='edit'){
                $article = Article::find($id)->where('url','=',$url)->get();
                return view('admin.article_update')->with(['categories'=> $cate,'article'=>$article]);
            }
        }
    }

    public function update()
    {
        $thumb = '';
        if(Input::has('a_h_thumbnail')){
            $thumb = Input::get('a_h_thumbnail');
        }else{
            $thumb = Input::file('a_thumbnail');
            if ($thumb->isValid()) {
                $path = public_path().'/images/items/';
                $extension = $thumb->getClientOriginalExtension();
                $filename = date('Ymd').'_'.md5(rand(100,10000000)).'.'.$extension;
                $thumb->move($path, $filename);
                $thumb =  '/images/items/'.$filename;
            }
        }
        $id = Input::get('post');
        $article = Article::find($id);
        $article->category_id = Input::get('a_cate');
        $article->member_id = 3;
        $article->title = Input::get('a_title');
        $article->url = Input::get('a_url');
        $article->type = Input::get('a_type');
        $article->description = Input::get('a_desc');
        $article->content = Input::get('a_content');
        $article->thumbnail = $thumb;
        $article->tag = Input::get('a_tag');
        $article->status = Input::get('a_status');
        if($article->save()){
            $cate = Category::all();
            $art = Article::find($id)->where('url','=',trim(Input::get('a_url')))->get();
            return view('admin.article_update')->with(['categories'=> $cate,'article'=>$art, 'notied'=>'ok']);
        }else{
            return view('admin.article_update')->with(['categories'=> $cate,'article'=>$art, 'notied'=>'error']);
        }
    }

    public function destroy()
    {
        $id = Input::get('_id');
        $article = Article::find($id);
        $path = public_path().$article->thumbnail;
        if (file_exists($path))
        {
            unlink($path);
        }
        // return $article->thumbnail;
        // exit();
        $article->delete();
    }

}
