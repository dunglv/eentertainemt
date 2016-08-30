<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Input;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function resultSearch()
    {
        $key = Input::get('key');
        $articles = Article::where('title','like', '%'.$key.'%')->orWhere('content','like', '%'.$key.'%')->get();

        // echo '<pre>';
        // print_r($article);
        // echo '</pre>';
        // exit();
        return view('article.resultsearch')->with(['articles'=>$articles, 'key' => $key]);
    }

    public function resultTag($tag='')
    {
        // return $tag;
        $tags = Tag::where('title', $tag)->get();
        // echo '<pre>';
        // print_r($tags[0]->articles());
        // echo '</pre>';
        // exit();
        // return $id_tag;
        // exit();
        // $articles = Tag
        return view('article.resulttag')->with(['tags'=>$tags, 'tag' => $tag]);
    }

    
}
