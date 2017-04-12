<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\ProgramName;
use App\Program;
use App\Programcomment;
use App\Category;

class ProgramController extends Controller
{
	public function index(Request $request){
		$programNames = ProgramName::get();
		$startid = $request->session()->get('startid');
		$programs = Program::orderBy('created_at', 'desc')->get();
		$categories = Category::get();
		return view('programs', [
		                'programNames' => $programNames,
						'categories' => $categories,
						'programs' => $programs,
						'startid' => $startid
		            ]);
	}
	
	public function getProgram($id){
		$programName  = ProgramName::findOrFail($id);
		$categories = Category::get();
		return view('program', [
		                'programName' => $programName,
						'categories' => $categories,
		            ]);
	}
	
	public function getAProgram($id){
		$program  = Program::findOrFail($id);
		$categories = Category::get();
		return view('aprogram', [
		                'program' => $program,
						'categories' => $categories,
		            ]);
	}
	
	public function getProgramByName(Request $request,$id){
		$request->session()->put('startid', $id);
		if($id == 0){
			$programName  = Program::orderBy('created_at','desc')->get();
		}else{
			$programName  = Program::where('programName_id', '=', $id)->orderBy('created_at', 'desc')->get();
		}
		return $programName;
	}
	
}
