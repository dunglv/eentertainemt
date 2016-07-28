<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
class AdminController extends Controller
{
	public function index()
	{
		return view('admin.main');
	}
    public function create(){
    	return view('admin.article_create');
    }


}
