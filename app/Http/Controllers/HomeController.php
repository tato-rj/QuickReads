<?php

namespace App\Http\Controllers;

use App\Story;
use App\Author;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function admin()
	{
		$stories_count = Story::count();
		$categories_count = Category::count();
		$authors_count = Author::count();

		return view('pages/dashboard', compact('stories_count', 'categories_count', 'authors_count'));
	}
}
