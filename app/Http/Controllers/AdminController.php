<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Auth;
use Yajra\Datatables\Datatables;
use App\Admin;
use App\User;
use App\Category;
use App\News;
use App\President;
use App\Location;
use App\Faq;
use App\Contact;
use App\Intro;
use App\History;
use App\Slide;
use App\sectorInfo;
use App\Structure;
use App\Program;
use App\ProgramName;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getNews()
    {
        $allnews = News::with('user')->select(['id', 'title', 'user_id', 'created_at']);

        return Datatables::of($allnews)
            ->editColumn('action', function ($data) {
                return '
                    <a class="btn btn-xs btn-success"  data-target-id="'.$data->id.'" data-toggle="modal" data-target="#myModal">Засах</a>
                    <a class="btn btn-xs btn-danger" onclick="deleteNews('.$data->id.')"  >Устгах</a>
                ';
            })
            ->make(true);
    }

    public function index(Datatables $datatables)
    {
         return view('admin.admin');
    }


    public function getUsers()
    {
         $users = User::get();
         return view('admin.users', [
			'users' => $users,
		]);
    }

    public function getCategories()
    {
         $categories = Category::get();
         return view('admin.categories', [
			'categories' => $categories,
		]);
    }


    public function showAddNews()
    {
         $categories = Category::get();
         $locations = Location::get();
         return view('admin.addNews', [
			'categories' => $categories,
            'locations' => $locations,
		]);
    }
    
    public function createNews(Request $request)
    {
          $news = new News;
          $news->title = Input::get('title'); 
          $news->image = Input::get('filepath'); 
          $news->content = Input::get('description'); 
          $news->location_id = Input::get('location');
          $news->news_category_id = Input::get('category');
          $news->user_id = Auth::user()->id;
          $news->save();
          return redirect('admin/addnews')->with('status', 'Амжилттай хадгалагдлаа!');
    }

    public function editNews($id){
        $news = News::findOrFail($id);
        return $news;
    }

    public function deleteNews($id){
        $news = News::findOrFail($id);
        $news->delete();
        return 'success';
    }

    public function getPresidents(){
         $presidents = President::get();
        return view('admin.presidents', [
            'presidents' => $presidents,
        ]);
    }
    
    public function createPresident(){
          $president = new President;
          $president->firstname = Input::get('firstname'); 
          $president->lastname = Input::get('lastname'); 
          $president->description = Input::get('description'); 
          $president->photo_URL = Input::get('filepath');
          $president->year = Input::get('year');
          $president->save();
          return redirect('admin/presidents')->with('presidentstatus', 'Амжилттай хадгалагдлаа!');
    }

    public function createCategory(){
          $category = new Category;
          $category->name = Input::get('name'); 
          $category->save();
          return redirect('admin/category')->with('categorytstatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getLocation(){
        $locations = Location::get();
        return view('admin.location',[
            'locations' => $locations,
        ]);
    }

    public function createLocation(){
        $location = new Location;
        $location->name = Input::get('name'); 
        $location->latitude = Input::get('lat'); 
        $location->longitude = Input::get('lon');
        $location->c_person_name = Input::get('cpersonname'); 
        $location->c_person_email = Input::get('cpersonemail'); 
        $location->c_person_phone = Input::get('cpersonphone'); 
        $location->save();
        return redirect('admin/location')->with('locationstatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getFAQs(){
        $faqs = Faq::get();
        return view('admin.FAQ',[
            'faqs' => $faqs,
        ]);
    }

    public function createFAQ(){
        $faq = new Faq;
        $faq->question = Input::get('question'); 
        $faq->answer = Input::get('answer'); 
        $faq->save();
        return redirect('admin/faq')->with('faqstatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getContacts(){
        $contacts = Contact::with('sector')->get();
        return view('admin.contact',[
            'contacts' => $contacts,
        ]);
    }

     public function getIntro(){
        $intro = Intro::get();
        return view('admin.intro',[
            'intro' => $intro,
        ]);
    }

    public function createIntro(){
        Intro::orderBy('created_at', 'desc')->take(1)->delete();
        $intro = new Intro;
        $intro->description = Input::get('description'); 
        $intro->save();
        return redirect('admin/intro')->with('introstatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getHistory(){
        $histories = History::get();
        return view('admin.history',[
            'histories' => $histories,
        ]);
    }

    public function createHistory(){
        $history = new History;
        $history->title = Input::get('title');
        $history->images = Input::get('filepath');  
        $history->date = Input::get('date'); 
        $history->description = Input::get('description'); 
        $history->save();
        return redirect('admin/history')->with('historystatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getSlide(){
        $slides = Slide::get();
        return view('admin.slide',[
            'slides' => $slides,
        ]);
    }

    public function createSlide(){
        $slide = new Slide;
        $slide->title = Input::get('title');
        $slide->image = Input::get('filepath');  
        $slide->description = Input::get('description');
        $slide->btnText = Input::get('btnText'); 
        $slide->btnLink = Input::get('btnLink'); 
        if(!$slide->isButton){
            $slide->isButton = 0;
        }
        $slide->isButton = Input::get('isButton');
        $slide->save();
        return redirect('admin/slide')->with('slidestatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getSectorInfo(){
        $locations = Location::get();
        $sectorInfos = sectorInfo::get();
        return view('admin.sectorInformation',[
            'sectorInfos' => $sectorInfos,
            'locations' => $locations,
        ]);
    }


    public function createSectorInfo(){
        $sector = new sectorInfo;
        $sector->title = Input::get('title');
        $sector->description = Input::get('description');
        $sector->location_id = Input::get('location');  
        $sector->save();
        return redirect('admin/sector')->with('sectorstatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getStructure(){
        $structure = Structure::get();
        return view('admin.structure',[
            'structure' => $structure,
        ]);
    }

    public function createStructure(){
        Structure::orderBy('created_at', 'desc')->take(1)->delete();
        $structure = new Structure;
        $structure->description = Input::get('description');
        $structure->save();
        return redirect('admin/structure')->with('structurestatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getProgramName(){
        $programNames = ProgramName::get();
        return view('admin.programname',[
            'programNames' => $programNames,
        ]);
    }

    public function createProgramName(){
        $programname = new ProgramName;
        $programname->name = Input::get('name');
        $programname->save();
        return redirect('admin/programname')->with('programnamestatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getprograms(){
        $programs = Program::get();
        $programNames = ProgramName::get();
        return view('admin.program',[
            'programs' => $programs,
            'programNames' => $programNames
        ]);
    }

    public function createprogram(){
        $program = new Program;
        $program->title = Input::get('title');
        $program->image = Input::get('filepath');
        $program->programName_id = Input::get('programname');
        $program->description = Input::get('description');
        $program->save();
        return redirect('admin/programs')->with('programstatus', 'Амжилттай хадгалагдлаа!');
    }
}
