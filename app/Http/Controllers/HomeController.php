<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
	public function index()
	{
		$post = DB::table('posts')
				->join('categories', 'posts.Category_id', 'categories.id')
				->select('posts.*', 'categories.name')
				->orderBy('posts.id', 'DESC')
				->paginate(3);
		return view('home', compact('post'));
	}
}
