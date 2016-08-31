<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Tag;
use App\Comment;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
class ArticleController extends Controller
{
    public function create()
    {
    	$cate = Category::all();
    	return view('admin.article_create')->with('categories', $cate);
    }

    public function store()
    {
        // $tags = Input::get('a_tag');
        // foreach (explode(',', trim($tags, ',')) as $tag) {
        //     $getTag = Tag::where('title', $tag)->get();
        //     if($getTag->count() == 0){
        //         $iTags = new Tag;
        //         $iTags->title = $tag;
        //         $iTags->status = 1;
        //         $iTags->save();
        //         // echo $iTags->id;
        //         $article->tags()->attach($iTags->id);
        //     }else{
        //         foreach ($getTag as $tag_n) {
        //             // $article->tags()->attach($tag_n->id);
        //         }
        //     }
        // }
        // exit();
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
    	if(Input::get('a_type')=='video'){
            $article->idv = Input::get('a_idv');
        }else{
            $article->idv = '';
        }
    	$article->description = Input::get('a_desc');
    	$article->content = Input::get('a_content');
    	$article->thumbnail = '/images/items/'.$filename ;
        $article->status = Input::get('a_status');
        $tags = Input::get('a_tag');
        if($article->save()){
            //save tag in tag table and article_tag table
            foreach (explode(',', trim($tags, ',')) as $tag) {
                $getTag = Tag::where('title', $tag)->get();
                if($getTag->count() == 0){
                    $iTags = new Tag;
                    $iTags->title = $tag;
                    $iTags->status = 1;
                    $iTags->save();
                    $article->tags()->attach($iTags->id);
                }else{
                    foreach ($getTag as $tag_n) {
                        $article->tags()->attach($tag_n->id);
                    }
                }
            }
            //get all catengories
            $cate = Category::all();
            return redirect()->route('article.create')->with(['categories'=> $cate, 'notied'=>'ok']);
        }else{
            return redirect()->route('article.create')->with(['categories'=> $cate, 'notied'=>'error']);
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
                $tags = $article[0]->tags()->get();
                return view('admin.article_update')->with(['categories'=> $cate,'article'=>$article, 'tags' => $tags]);
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
        if(Input::get('a_type')=='video'){
            $article->idv = Input::get('a_idv');
        }else{
            $article->idv = '';
        }
        $article->description = Input::get('a_desc');
        $article->content = Input::get('a_content');
        $article->thumbnail = $thumb;
        $article->tag = Input::get('a_tag');
        $article->status = Input::get('a_status');

        $tags = Input::get('a_tag');
        // echo "<pre>";
        // print_r($tags[0]->title);
        // echo "</pre>";
        // exit();
        if($article->save()){
            //save tag in tag table and article_tag table
            $article->tags()->detach();
            foreach (explode(',', trim($tags, ',')) as $tag) {
                $getTag = Tag::where('title', $tag)->get();
                if($getTag->count() == 0){
                    $iTags = new Tag;
                    $iTags->title = $tag;
                    $iTags->status = 1;
                    $iTags->save();
                    $article->tags()->attach($iTags->id);
                }else{
                    foreach ($getTag as $tag_n) {
                        $article->tags()->attach($tag_n->id);
                    }
                }
            }
            
            $cate = Category::all();
            $art = Article::find($id)->where('url','=',trim(Input::get('a_url')))->get();
            $taglist = $article->tags()->get();
            // return redirect()->route('article.edit', [Input::get('a_url'), 'type'=> 'post', 'fn'=>'edit', 'post'=> $id])->with(['notied'=>'ok']);
            return redirect()->route('article.edit', [$article->url, 'type' => 'post', 'fn' => 'edit', 'post' => $id])->with(['categories'=> $cate,'article'=>$art, 'notied'=>'ok', 'tags' => $taglist]);
        }else{
            $taglist = $article->tags()->get();
            return redirect()->route('article.edit', [$article->url, 'type' => 'post', 'fn' => 'edit', 'post' => $id])->with(['categories'=> $cate,'article'=>$art, 'notied'=>'error', 'tags' => $taglist]);
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

    public function get_home_article()
    {
        $featured = Article::where('status', '=', '1')->orderBy('viewcount', 'DESC')->take(5)->get();
        $newest = Article::where('status', '=', 1)->orderBy('created_at')->take(5)->get();
        $cate = Category::with(['articles'=>function($query){
            $query->orderBy('created_at', 'DESC');
        }])->get()->map(function($cate){
            $cate->articles = $cate->articles->where('status', 1)->take(5);
            return $cate;
        });
       
        return view('layout.home')->with(['featured'=>$featured, 'newest'=>$newest, 'cate'=>$cate]);
    }

    public function detail_home_article($url='', Request $request)
    {
        $article = Article::with('categories')->with('tags')->where('url', '=', $url)->get();
        if($article->count()==0){
            return view('errors.404');
        }else{
            $tags = $article[0]->tags()->get();
            
            $comments = Comment::where('article_id', $article[0]->id)->where('status', 1)->orderBy('id', 'DESC'
                )->get(); 
            $samecate = Article::where('category_id','=', $article[0]->category_id)->where('id','<>', $article[0]->id)->where('status', '=', 1)->get();
            
            return view('article.detail')->with(['article'=>$article, 'samecate'=>$samecate, 'tags'=> $tags, 'comments' => $comments]);
        }
    }

}
