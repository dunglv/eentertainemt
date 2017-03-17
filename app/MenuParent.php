<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuParent extends Model
{
    protected $table = 'menuparents';

    public function parentMenu()
    {
    	return $this->belongsTo('App\Menu', 'menu_id');
    }
}
