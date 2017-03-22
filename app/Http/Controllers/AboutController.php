<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\News;
use App\Intro;
use App\History;
use App\sectorInfo;
use App\Structure;

class AboutController extends Controller
{
    public function index(){
        $sectionInfos = sectorInfo::all();
        $histories = History::all();
        $intro = Intro::orderBy('created_at', 'desc')->take(1)->get();
        $structure = Structure::orderBy('created_at', 'desc')->take(1)->get();
        $latestnews = News::orderBy('created_at', 'desc')->take(3)->get();
        return view('about',[
            'sectionInfos' => $sectionInfos,
            'latestnews' => $latestnews,
            'histories' => $histories,
            'intro' => $intro,
            'structure' => $structure,
        ]);
    }


    public function getSector($id){
        $sectorInfo = sectorInfo::findOrFail($id);
        return $sectorInfo;
    }

    public function getSectorNews($id){
        $sectorInfoNews = News::where('location_id', $id)->orderBy('created_at', 'desc')->take(3)->get();
        return $sectorInfoNews;
    }
    
}
