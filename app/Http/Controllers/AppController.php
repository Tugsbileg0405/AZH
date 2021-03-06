<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Mail;
use App\President;
use App\News;
use App\Slide;
use App\ProgramName;
use App\Programcomment;
use App\Subsriber;
use App\Options;
use App\Category;

class AppController extends Controller
{
	public function index(){
		$presidents = President::get();
		$ProgramNames = ProgramName::get();
		$slides = Slide::get();
		$categories = Category::get();
		$sectors = Options::findOrFail(1);
		$members = Options::findOrFail(2);
		$projects = Options::findOrFail(3);
		$latestnews = News::orderBy('created_at', 'desc')->take(3)->get();
		return view('index', [
				    'presidents' => $presidents,
				    'latestnews' => $latestnews,
				    'slides' => $slides,
				    'ProgramNames' => $ProgramNames,
					'sectors' => $sectors,
					'members' => $members,
					'projects' => $projects,
					'categories' => $categories,
				]);
	}
	
	public function createSubscribe(){
		$email = Input::get('email');
		$message = "";
		$user = Subsriber::where('email', '=', $email)->first();
		if ($user === null) {
			$subriber = new Subsriber;
			$subriber->email = $email;
			$subriber->save();
			$message = "success";
	    }
		else {
			$message = "failed";
		}
		
		return response()->json(['responseText' => $message], 200);
	}
}
