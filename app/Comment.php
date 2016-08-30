<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function article()
    {
    	return $this->belongsTo('App\Article'); 
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getChildrenComments($id)
    {
    	$comments = Comment::where('status', 1)->where('parent_id', $id)->orderBy('id','DESC')->get();
    	return $comments;
    }
}
