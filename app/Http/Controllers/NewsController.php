<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;

class NewsController extends Controller
{
	public function index(){
		$categories = Category::get();
		$allnews = News::orderby('created_at', 'desc')
		            ->paginate(3);
		
		return view('news', [
		                'categories' => $categories,
		                'allnews' => $allnews,
		            ]);
	}
	
	public function showNews($id){
		$news = News::findOrFail($id);
		$categories = Category::get();
		$news->views = $news->views + 1;
		$news->save();
		$latestnews = News::where('id', '!=', $news->id)->orderBy('created_at', 'desc')->take(3)->get();
		return view('anews', [
		                'news' => $news,
						'categories' => $categories,
		                'latestnews' => $latestnews
		            ]);
	}
	
	public function getCatNews($id){
		$categories = Category::get();
		$category = Category::findOrFail($id);
		$allnews = $category->news()
		            ->orderby('created_at', 'desc')
		            ->paginate(3);
		
		return view('news', [
		                'category' => $category,
		                'categories' => $categories,
		                'allnews' => $allnews,
		            ]);
	}
}
