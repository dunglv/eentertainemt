<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['categories_id, members_id, title, url, type, thumbnail, description, content, tag, viewcount, likecount, dislikecount, status'];

    public function categories()
    {
    	return $this->belongsTo('App\Category');
    }
}
