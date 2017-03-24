<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Location;
use App\Faq;
use App\Contact;

class ContactController extends Controller
{
	public function index(){
		$locations = Location::all();
		$faqs = Faq::all();
		return view('contact',[
		            'locations' => $locations,
		            'faqs' => $faqs,
		        ]);
	}
	
	public function createContact(){
		$contact = new Contact;
		$contact->c_email = Input::get('email');
		$contact->c_message = Input::get('message');
		$contact->location = Input::get('location');
		$contact->c_phone = Input::get('phone');
		$contact->save();
		return redirect('contact')->with('contactstatus', 'Амжилттай илгээлээ!');
	}
}
