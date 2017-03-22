<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\President;
use App\News;
use App\Slide;
use App\ProgramName;

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
}
