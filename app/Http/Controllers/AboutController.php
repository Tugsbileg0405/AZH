<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use App\Location;
use App\News;
use App\Intro;
use App\History;
use App\sectorInfo;
use App\Structure;
use App\rule;
use App\Vow;
use App\Category;

class AboutController extends Controller{
	public function index(Request $request){
		$sectionInfos = sectorInfo::all();
		$histories = History::all();
		$categories = Category::all();
		$vow = Vow::orderBy('created_at', 'desc')->take(1)->get();
		$intro = Intro::orderBy('created_at', 'desc')->take(1)->get();
		$structure = Structure::orderBy('created_at', 'desc')->take(1)->get();
		$latestnews = News::orderBy('created_at', 'desc')->take(3)->get();
		$rule = rule::orderBy('created_at', 'desc')->take(1)->get();
		$tabname = $request->session()->get('tabname');
		if($tabname == null){
			$tabname = '#home';
		}
		if( Input::has('name') )
		 {
		 	$tabname = Input::get('name');
		 	$request->session()->put('tabname', '#'.$tabname);
		 	return Redirect::route('about')->withName('#'.$tabname);
		 }

		return view('about',[
		            'sectionInfos' => $sectionInfos,
		            'latestnews' => $latestnews,
					'lastnews' => $latestnews->toJson(),
		            'histories' => $histories,
		            'intro' => $intro,
					'vow' => $vow,
		            'structure' => $structure,
					'rule' => $rule,
					'categories'  => $categories,
					'tabname' => $tabname,
		        ]);
	}
	
	
	public function getSector($id){
		$sectorInfo = sectorInfo::where('location_id',$id)->orderBy('created_at', 'desc')->take(1)->get();
		return $sectorInfo;
	}
	
	public function getSectorNews($id){
		$sectorInfoNews = News::where('location_id', $id)->orderBy('created_at', 'desc')->take(3)->get();
		return $sectorInfoNews;
	}

	public function getfile($filename){
		return response()->download('uploads/'.$filename);
	}

	public function savetab(Request $request){
		$request->session()->put('tabname', $request->data);
		return redirect('about')->with('success');
	}

	
}
