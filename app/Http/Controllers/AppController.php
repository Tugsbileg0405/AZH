<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\President;
use App\News;
use App\Slide;
use App\ProgramName;
use App\Programcomment;
use Mail;
use Illuminate\Support\Facades\Input;

class AppController extends Controller
{
	public function index(){
		$presidents = President::get();
		$ProgramNames = ProgramName::get();
		$slides = Slide::get();
		$latestnews = News::orderBy('created_at', 'desc')->take(3)->get();
		return view('index', [
		            'presidents' => $presidents,
		            'latestnews' => $latestnews,
		            'slides' => $slides,
		            'ProgramNames' => $ProgramNames,
		        ]);
	}
	
	public function createSubscribe(){
		$email = Input::get('email');
		// 		Mail::send('mail', ['email' => $email], function($message) use ($email) {
			// 			$message->to($email);
			// 			$message->subject('Ардчилсан залуучуудын холбоо');
			//
		}
		);
		return redirect('/')->with('substatus', 'Дагасанд баярлалаа!');
	}
}
