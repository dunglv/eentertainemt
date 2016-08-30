<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Menu;
use App\Article;
use App\Category;
use App\MenuParent;
class MenuController extends Controller
{
    public static function buildTree(array $elements, $parentId = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent'] == $parentId) {
                $children = buildTree($elements, $element['id']);
                if ($children) {
                    $element['id'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

    public function index()
    {
        $menus = Menu::all();
        // echo '<pre>';
        // print_r(Menu::getChildMenu('1') );
        // echo '</pre>';
        // exit();
        return view('admin.menu_index')->with(['menus'=>$menus]);
    }

    public function create()
    {
        $menus = Menu::all()->where('parent', '<=' ,0);
        $article = Article::all();
        $category = Category::all();
        return view('admin.menu_create')->with(['menus'=>$menus, 'article' => $article, 'category'=>$category]);
    }
    
    public function store()
    {
        $menu = new Menu;
        $menu->title = Input::get('a_title');
        $menu->url = Input::get('a_url');
        $menu->type = Input::get('a_type');
        if(Input::has('a_link')){
            $menu->link = Input::get('a_link');
        }
        if(Input::has('a_category')){
            $menu->category = Input::get('a_category');
        }
        if(Input::has('a_article')){
            $menu->article = Input::get('a_article');
        }
        $menu->parent = Input::get('a_parent');
        


        $menu->status = Input::get('a_status');
        if($menu->save()){
            if((int)Input::get('a_parent') > 0){
                $menuparent = new MenuParent;
                $menuparent->menu_id =$menu->id;
                $menuparent->parent_id =  (int)Input::get('a_parent');
                $menuparent->save();
            }
            return redirect()->route('menu.create')->with(['notied'=>'ok']);
        }else{
            return redirect()->route('menu.create')->with(['notied'=>'error']);
        }
    }
    public function edit($url='')
    {
        $id = Input::get('id');
        $menu = Menu::where('id', '=', $id)->where('url', '=', trim($url))->get();
        $menus = Menu::where('id', '<>', $id)->where('parent', '=', 0)->get();
        $article = Article::all();
        $category = Category::all();
        return view('admin.menu_update')->with(['menu'=> $menu, 'menus'=>$menus, 'category'=>$category, 'article' => $article]);
    }
    public function update($url='')
    {
        $id = Input::get('id');
        $menu = Menu::find($id);
        $menu->title = Input::get('a_title');
        $menu->url = Input::get('a_url');
        $menu->type = Input::get('a_type');
        if(Input::has('a_link')){
            $menu->link = Input::get('a_link');
        }else{
            $menu->link = '';
        }
        if(Input::has('a_category')){
            $menu->category = Input::get('a_category');
        }else{
            $menu->category = '';
        }
        if(Input::has('a_article')){
            $menu->article = Input::get('a_article');
        }else{
            $menu->article = '';
        }
        $menu->parent = Input::get('a_parent');
        $menu->status = Input::get('a_status');
        if($menu->save()){
            $mn = Menu::find($id);
            return redirect()->route('menu.edit', [$mn->url, 'id'=>$id])->with(['notied' => 'ok']);
        }else{
            return redirect()->route('menu.edit', [$url, 'id'=>$id])->with(['notied' => 'error']);
        }
    }
    public function getdata_object()
    {
        if(Input::get('type')=='category'){
            $data = Category::all();
        }else{
            $data = Article::all();
        }
        return json_decode($data);
    }

    public function hide()
    {
        $id = Input::get('_id');
        $menu = Menu::find($id);
        if(Input::get('_mtype')!=2){
            if(Input::get('_mtype')==0){
                $menu->status = '0';
            }elseif(Input::get('_mtype')==1){
                $menu->status = '1';
            }

            if($menu->save()){
                $msg = 'ok';
            }else{
                $msg = 'error';
            }
        }else{
            if(Input::get('_mtype')==2){
                if($menu->delete()){
                    $msg = 'ok';
                }else{
                    $msg = 'error';
                }
            }
        }
        
        return $msg;
    }
    
}
