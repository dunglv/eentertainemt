<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\Input;
class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.cate_home')->with(['categories' => $category]);
    }
    public function create()
    {
        return view('admin.cate_create');
    }


    public function detail($url='')
    {
        $category = Category::where('url', $url)->where('status', 1)->get();
        // echo '<pre>';
        // print_r($articles);
        // echo '</pre>';
        
        if ($category->count() > 0) {
            $articles = Article::where('category_id', $category[0]->id)->where('status', 1)->paginate(1);
            return view('category.detail')->with(['category'=> $category, 'articles' => $articles]);
        }else{
            return view('errors.404');
        }
    }

    public function loadAjaxArticlePage()
    {
        $id_cate = Input::get('category');
        $articles = Article::where('category_id', $id_cate)->where('status', 1)->paginate(1);
        return view('category.page_article')->with(['articles' => $articles]);
        // return $articles;
    }
    public function store()
    {
        if (Input::file('a_thumbnail')->isValid()) {
            $path = public_path().'/images/items/';
            $extension = Input::file('a_thumbnail')->getClientOriginalExtension();
            $filename = date('Ymd').'_'.md5(rand(100,10000000)).'.'.$extension;
            Input::file('a_thumbnail')->move($path, $filename);
        }

        $title = Input::get('a_title');
        $url = Input::get('a_url');
        $desc = Input::get('a_desc');
        $status = Input::get('a_status');

        $category = new Category;
        $category->title = $title;
        $category->url = $url;
        $category->description = $desc;
        $category->thumbnail = '/images/items/'.$filename ;
        $category->status = $status;
        if($category->save()){
            return redirect()->route('category.create')->with(['notied'=>'ok']);
        }else{
            return redirect()->route('category.create')->with(['notied'=>'error']);
        }
    }
    public function edit($url='')
    {
        $id = Input::get('category');

        if(Input::get('type')=='category'){
            if(Input::get('fn')=='edit'){
                $category= Category::find($id)->where('url','=',$url)->get();
                 // echo '<pre>';
                 //    print_r($category);
                 //    echo '</pre>';
                return view('admin.cate_update')->with(['category'=>$category]);
            }
        }
    }

    public function update($url='')
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
        $id = Input::get('category');
        $category = Category::find($id);
        $category->title = Input::get('a_title');
        $category->url = Input::get('a_url');
        $category->description = Input::get('a_desc');
        $category->thumbnail = $thumb;
        $category->status = Input::get('a_status');
        if($category->save()){
            $cate = Category::find($id)->where('url','=',trim(Input::get('a_url')))->get();
            // echo '<pre>';
            // print_r($cate);
            // echo '</pre>';
            return redirect()->route('category.edit', [$category->url, 'type'=> 'category', 'fn'=> 'edit', 'category'=> $id])->with(['category'=>$cate, 'notied'=>'ok']);
        }else{
            return redirect()->route('category.edit', [$category->url, 'type'=> 'category', 'fn'=> 'edit', 'category'=> $id])->with(['category'=>$cate, 'notied'=>'error']);
        }
    }

    public function destroy()
    {
        $id = Input::get('_id');
        $category = Category::find($id);
        $path = public_path().$category->thumbnail;
        if (file_exists($path))
        {
            unlink($path);
        }
        $category->delete();
        return $id;
    }

    
}
