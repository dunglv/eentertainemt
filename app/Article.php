<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['category_id, member_id, title, url, type, idv, thumbnail, description, content, tag, viewcount, likecount, dislikecount, status'];

    public function categories()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }
}
