<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramName;
use App\Program;
use App\Programcomment;

class ProgramController extends Controller
{
	public function index(){
		$programNames = ProgramName::get();
		return view('programs', [
		                'programNames' => $programNames,
		            ]);
	}
	
	public function getProgram($id){
		$programName  = ProgramName::findOrFail($id);
		return view('program', [
		                'programName' => $programName,
		            ]);
	}
	
	public function getAProgram($id){
		$program  = Program::findOrFail($id);
		return view('aprogram', [
		                'program' => $program,
		            ]);
	}
	
	
}
