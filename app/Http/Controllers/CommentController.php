<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Comment;
use Auth;
class CommentController extends Controller
{
    public function index()
    {
    	return view('admin.comment_index');
    }

    public function create()
    {
    	return 'fsgsg';
    }
    public function store()
    {
    	$user = Input::get('user');
    	$article = Input::get('article');
    	$content = Input::get('comment');
    	$comment = new Comment;
    	$comment->user_id = $user;
        if(Input::has('parent_id')){
            $comment->parent_id = Input::get('parent_id');
        }else{
            $comment->parent_id = 0;
        }
    	$comment->article_id = $article;
    	$comment->title = $content;
    	$comment->status = 1;
    	if($comment->save()){
    		return ['msg'=>'ok', 'cId' => $comment->id];
    	}else{
    		return ['msg'=>'error'];
    	}
    }
}
