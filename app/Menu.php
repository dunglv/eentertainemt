<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
use App\Category;
class Menu extends Model
{
    protected $table = 'menus';

    public function childrenMenu()
    {
    	return $this->hasMany('App\MenuParent', 'id');
    }

    public static function getChildMenu($id)
    {
    	$child = Menu::where('parent', '=', $id)->get();
    	return $child;
    }

    public static function getChildMenuActive($id)
    {
        $child = Menu::where('parent', '=', $id)->where('status', 1)->get();
        return $child;
    }

    public static function getUrlArticle($id)
    {
        $article = Article::where('id', $id)->where('status', 1)->get();
        return $article;
    }

    public static function getUrlCategory($id)
    {
        $category = Category::where('id', $id)->where('status', 1)->get();
        return $category;
    }
}
