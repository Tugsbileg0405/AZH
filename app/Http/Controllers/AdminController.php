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
use App\Programcomment;
use App\Subsriber;
use Mail;
use App\Mail\EmailReminder;
use App\Mail\NewsRemind;
use Image;
use Illuminate\Support\Facades\Storage;
use App\Options;
use App\rule;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Province;
use App\Vow;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\PhotosRequest;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    
    public function getNews()
    {
        $allnews = News::with('user')->with('sector')->select(['id','location_id' ,'title', 'user_id', 'views' , 'created_at']);
        return Datatables::of($allnews)->editColumn('action', function ($data) {
            return '
                    <a class="btn btn-xs btn-success"  href="admin/news/edit/'.$data->id.'">Засах</a>
                    <a class="btn btn-xs btn-danger" onclick="deleteNews('.$data->id.')"  >Устгах</a>
                ';
        })->make(true);
    }
    
    
    public function getallprograms()
    {
        $Program = Program::with('programName')->select(['id', 'title', 'programName_id', 'created_at']);
        return Datatables::of($Program)->editColumn('action', function ($data) {
            return '
                    <a class="btn btn-xs btn-success"  href="program/edit/'.$data->id.'">Засах</a>
                    <a class="btn btn-xs btn-danger" onclick="deleteProgram('.$data->id.')"  >Устгах</a>
                ';
        })->make(true);
    }
    
    
    public function deleteprogram($id)
    {
        $Program = Program::findOrFail($id);
        $Program->delete();
        return 'success';
    }
    
    
    public function getallprogramcomments()
    {
        $Program = Programcomment::with('programName')->select(['id', 'title', 'program_id', 'created_at']);
        return Datatables::of($Program)->editColumn('action', function ($data) {
            return '
                    <a class="btn btn-xs btn-success"  href="programcomment/edit/'.$data->id.'">Засах</a>
                    <a class="btn btn-xs btn-danger" onclick="deleteProgramComment('.$data->id.')"  >Устгах</a>
                ';
        })->make(true);
    }
    
    
    public function deleteprogramcomment($id)
    {
        $Programcomment = Programcomment::findOrFail($id);
        $Programcomment->delete();
        return 'success';
    }
    
    
    public function getallpresidents()
    {
        $President = President::select(['id', 'firstname', 'lastname', 'year', 'created_at']);
        return Datatables::of($President)->editColumn('action', function ($data) {
            return '
                        <a class="btn btn-xs btn-success"  href="president/edit/'.$data->id.'">Засах</a>
                        <a class="btn btn-xs btn-danger" onclick="deletePresident('.$data->id.')"  >Устгах</a>
                    ';
        })->make(true);
    }
    
    
    public function deletepresident($id)
    {
        $President = President::findOrFail($id);
        $President->delete();
        return 'success';
    }
    
    public function getalllocations()
    {
        $Location = Location::with('province')->select(['id', 'province_id', 'c_person_name', 'c_person_email','c_person_phone','c_person_facebook','information', 'created_at']);
        return Datatables::of($Location)->editColumn('action', function ($data) {
            return '	
                        <a class="btn btn-xs btn-success"  href="location/edit/'.$data->id.'">Засах</a>
                        <a class="btn btn-xs btn-danger" onclick="deleteLocation('.$data->id.')"  >Устгах</a>
                    ';
        })->make(true);
    }
    
    
    public function deletelocation($id)
    {
        $Location = Location::findOrFail($id);
        $Location->delete();
        return 'success';
    }
    
    public function getallsectorinfos()
    {
        $sectorInfo = sectorInfo::with('province')->select(['id', 'title', 'location_id', 'created_at']);
        return Datatables::of($sectorInfo)->editColumn('action', function ($data) {
            return '
                        <a class="btn btn-xs btn-success"  href="sectorinfo/edit/'.$data->id.'">Засах</a>
                        <a class="btn btn-xs btn-danger" onclick="deleteSectorInfo('.$data->id.')"  >Устгах</a>
                    ';
        })->make(true);
    }
    
    
    public function deletesectorinfo($id)
    {
        $sectorInfo = sectorInfo::findOrFail($id);
        $sectorInfo->delete();
        return 'success';
    }
    
    
    public function getallfaq()
    {
        $Faq = Faq::select(['id', 'question', 'answer', 'created_at']);
        return Datatables::of($Faq)->editColumn('action', function ($data) {
            return '
                        <a class="btn btn-xs btn-success"  href="faq/edit/'.$data->id.'">Засах</a>
                        <a class="btn btn-xs btn-danger" onclick="deleteFaq('.$data->id.')"  >Устгах</a>
                    ';
        })->make(true);
    }
    
    
    public function deletefaq($id)
    {
        $Faq = Faq::findOrFail($id);
        $Faq->delete();
        return 'success';
    }
    
    
    public function getallhistory()
    {
        $History = History::select(['id', 'title', 'description', 'date', 'created_at']);
        return Datatables::of($History)->editColumn('action', function ($data) {
            return '
                        <a class="btn btn-xs btn-success"  href="history/edit/'.$data->id.'">Засах</a>
                        <a class="btn btn-xs btn-danger" onclick="deleteHistory('.$data->id.')"  >Устгах</a>
                    ';
        })->make(true);
    }
    
    
    public function deletehistory($id)
    {
        $History = History::findOrFail($id);
        $History->delete();
        return 'success';
    }
    
    public function getallslides()
    {
        $Slide = Slide::select(['id', 'title', 'description',  'created_at']);
        return Datatables::of($Slide)->editColumn('action', function ($data) {
            return '
                        <a class="btn btn-xs btn-success"  href="slide/edit/'.$data->id.'">Засах</a>
                        <a class="btn btn-xs btn-danger" onclick="deleteSlide('.$data->id.')"  >Устгах</a>
                    ';
        })->make(true);
    }
    
    
    public function deleteslide($id)
    {
        $Slide = Slide::findOrFail($id);
        $Slide->delete();
        return 'success';
    }
    
    public function getallusers()
    {
        $User = User::select(['id','name', 'email', 'created_at']);
        return Datatables::of($User)->make(true);
    }
    
    public function getallcontact()
    {
        $Contact = Contact::with('sector')->select(['id','c_email', 'c_message','location','c_phone', 'created_at']);
        return Datatables::of($Contact)->make(true);
    }
    
    public function getallcategories()
    {
        $allcat = Category::select(['id', 'name', 'created_at']);
        return Datatables::of($allcat)->editColumn('action', function ($data) {
            return '
                    <a class="btn btn-xs btn-success"  href="category/edit/'.$data->id.'">Засах</a>
                    <a class="btn btn-xs btn-danger" onclick="deleteCat('.$data->id.')"  >Устгах</a>
                ';
        })->make(true);
    }
    
    
    public function getEditCategory($id)
    {
        $Category = Category::findOrFail($id);
        return view('admin.editcategory', [
                        'Category' => $Category
                    ]);
    }
    
    public function editCategory($id)
    {
        $Category = Category::findOrFail($id);
        $Category->name = Input::get('name');
        $Category->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getEditprogramname($id)
    {
        $ProgramName = ProgramName::findOrFail($id);
        return view('admin.editprogramname', [
                        'ProgramName' => $ProgramName,
                    ]);
    }
    
    public function editprogramname($id)
    {
        $ProgramName = ProgramName::findOrFail($id);
        $ProgramName->name = Input::get('name');
        $ProgramName->description = Input::get('description');
        $ProgramName->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getEditprogram($id)
    {
        $Program = Program::findOrFail($id);
        $programNames = ProgramName::get();
        return view('admin.editprogram', [
                        'Program' => $Program,
                        'programNames' => $programNames
                    ]);
    }
    
    public function editprogram(NewsRequest $request, $id)
    {
        $program = Program::findOrFail($id);
        $program->title = Input::get('title');
        $program->short_description = Input::get('shortdescription');
        $program->image = $request->get('photo');
        $program->programName_id = Input::get('programname');
        $program->description = Input::get('description');
        $program->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getEditprogramcomment($id)
    {
        $Programcomment = Programcomment::findOrFail($id);
        $programNames = ProgramName::get();
        return view('admin.editprogramcomment', [
                        'Programcomment' => $Programcomment,
                        'programNames' => $programNames
                    ]);
    }
    
    public function editprogramcomment(NewsRequest $request, $id)
    {
        $p_comment = Programcomment::findOrFail($id);
        $p_comment->title = Input::get('title');
        $p_comment->subtitle = Input::get('subtitle');
        $p_comment->imageURL = $request->get('photo');
        $p_comment->program_id = Input::get('programname');
        $p_comment->description = Input::get('comment');
        $p_comment->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    
    public function getEditpresident($id)
    {
        $President = President::findOrFail($id);
        return view('admin.editpresident', [
                                                    'President' => $President,
                                                ]);
    }
    
    public function editpresident(NewsRequest $request, $id)
    {
        $president = President::findOrFail($id);
        $president->firstname = Input::get('firstname');
        $president->lastname = Input::get('lastname');
        $president->description = Input::get('description');
        $president->photo_URL = $request->get('photo');
        $president->year = Input::get('year');
        $president->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getEditlocation($id)
    {
        $Location = Location::findOrFail($id);
        $provinces = Province::get();
        return view('admin.editlocation', [
                        'Location' => $Location,
                        'provinces' => $provinces
                    ]);
    }
    
    public function editlocation($id)
    {
        $location = Location::findOrFail($id);
        $location->province_id = Input::get('name');
        $location->c_person_name = Input::get('cpersonname');
        $location->c_person_email = Input::get('cpersonemail');
        $location->c_person_phone = Input::get('cpersonphone');
        $location->c_person_facebook = Input::get('cpersonfacebook');
        $location->information = Input::get('information');
        $location->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    
    public function getEditsectorInfo($id)
    {
        $sectorInfo = sectorInfo::findOrFail($id);
        $provinces = Province::get();
        return view('admin.editsectorinfo', [
                        'sectorInfo' => $sectorInfo,
                        'provinces' => $provinces
                    ]);
    }
    
    public function editsectorInfo($id)
    {
        $sector = sectorInfo::findOrFail($id);
        $sector->title = Input::get('title');
        $sector->description = Input::get('description');
        $sector->location_id = Input::get('location');
        $sector->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    
    public function getEditfaq($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.editfaq', [
                        'faq' => $faq,
                ]);
    }
    
    public function editfaq($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->question = Input::get('question');
        $faq->answer = Input::get('answer');
        $faq->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getEdithistory($id)
    {
        $history = History::findOrFail($id);
        return view('admin.edithistory', [
                        'history' => $history,
                    ]);
    }
    
    
    
    public function edithistory(PhotosRequest $request, $id)
    {
        $history = History::findOrFail($id);
        $history->title = Input::get('title');
        if ($request->get('photos')) {
            $history->images = serialize($request->get('photos'));
        }
        $history->date = Input::get('date');
        $history->description = Input::get('description');
        $history->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getEditslide($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.editslide', [
                        'slide' => $slide,
                    ]);
    }
    
    
    
    public function editslide(NewsRequest $request, $id)
    {
        $slide = Slide::findOrFail($id);
        $slide->title = Input::get('title');
        $slide->image = $request->get('photo');
        $slide->description = Input::get('description');
        $slide->btnText = Input::get('btnText');
        $slide->btnLink = Input::get('btnLink');
        if (!$slide->isButton) {
            $slide->isButton = 0;
        }
        $slide->isButton = Input::get('isButton');
        $slide->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function deletecategories($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        return 'success';
    }
    
    public function getallpronames()
    {
        $ProgramName = ProgramName::select(['id', 'name', 'created_at']);
        return Datatables::of($ProgramName)->editColumn('action', function ($data) {
            return '
                    <a class="btn btn-xs btn-success"  href="programname/edit/'.$data->id.'">Засах</a>
                    <a class="btn btn-xs btn-danger" onclick="deleteProName('.$data->id.')"  >Устгах</a>
                ';
        })->make(true);
    }
    
    public function deleteproname($id)
    {
        $ProgramName = ProgramName::findOrFail($id);
        $ProgramName->delete();
        return 'success';
    }
    
    
    
    public function index(Datatables $datatables)
    {
        $categories = Category::get();
        $provinces = Province::get();
        return view('admin.admin', [
                    'categories' => $categories,
                    'provinces' => $provinces,
                ]);
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
        $provinces = Province::get();
        return view('admin.addNews', [
                        'categories' => $categories,
                        'provinces' => $provinces,
                    ]);
    }
    
    public function createNews(NewsRequest $request)
    {
        $news = new News;
        $news->title = Input::get('title');
        if ($request->get('photo')) {
            $news->image = $request->get('photo');
        }
        $news->content = Input::get('description');
        $news->short_description = Input::get('shortdescription');
        $news->location_id = Input::get('location');
        $news->news_category_id = Input::get('category');
        $news->user_id = Auth::user()->id;
        $news->save();
        $subscribers = Subsriber::get();
        $emails = Subsriber::get()->pluck('email')->toArray();
        if (!$subscribers->isEmpty()) {
            Mail::to($emails)->queue(new NewsRemind($news));
        }
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function editNews($id)
    {
        $categories = Category::get();
        $news = News::findOrFail($id);
        $provinces = Province::get();
        return view('admin.editnews', [
                        'news' => $news,
                        'categories' => $categories,
                        'provinces' => $provinces,
                    ]);
        ;
    }
    
    public function saveeditedNews(NewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->title = Input::get('title');
        $news->image = $request->get('photo');
        $news->content = Input::get('description');
        $news->short_description = Input::get('shortdescription');
        $news->location_id = Input::get('location');
        $news->news_category_id = Input::get('category');
        $news->user_id = Auth::user()->id;
        $news->created_at = $request->updatedDate;
        $news->updated_at = $request->updatedDate;
        $news->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }
    
    public function deleteNews($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return 'success';
    }
    
    public function getPresidents()
    {
        $presidents = President::get();
        return view('admin.presidents', [
                        'presidents' => $presidents,
                    ]);
    }
    
    public function createPresident(NewsRequest $request)
    {
        $president = new President;
        $president->firstname = Input::get('firstname');
        $president->lastname = Input::get('lastname');
        $president->description = Input::get('description');
        $president->photo_URL = $request->get('photo');
        $president->year = Input::get('year');
        $president->save();
        return redirect('admin/presidents')->with('presidentstatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function createCategory()
    {
        $category = new Category;
        $category->name = Input::get('name');
        $category->save();
        return redirect('admin/category')->with('categorytstatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getLocation()
    {
        $locations = Location::get();
        $provinces = Province::get();
        return view('admin.location', [
                        'locations' => $locations,
                        'provinces' => $provinces
                    ]);
    }
    
    public function createLocation()
    {
        $location = new Location;
        $location->province_id = Input::get('name');
        $location->c_person_name = Input::get('cpersonname');
        $location->c_person_email = Input::get('cpersonemail');
        $location->c_person_phone = Input::get('cpersonphone');
        $location->c_person_facebook = Input::get('cpersonfacebook');
        $location->information = Input::get('information');
        $location->save();
        return redirect('admin/location')->with('locationstatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getFAQs()
    {
        $faqs = Faq::get();
        return view('admin.FAQ', [
                        'faqs' => $faqs,
                    ]);
    }
    
    public function createFAQ()
    {
        $faq = new Faq;
        $faq->question = Input::get('question');
        $faq->answer = Input::get('answer');
        $faq->save();
        return redirect('admin/faq')->with('faqstatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getContacts()
    {
        $contacts = Contact::with('sector')->get();
        return view('admin.contact', [
                        'contacts' => $contacts,
                    ]);
    }
    
    public function getIntro()
    {
        $intro = Intro::get();
        return view('admin.intro', [
                        'intro' => $intro,
                    ]);
    }
    
    public function createIntro()
    {
        Intro::orderBy('created_at', 'desc')->take(1)->delete();
        $intro = new Intro;
        $intro->description = Input::get('description');
        $intro->save();
        return redirect('admin/intro')->with('introstatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getvow()
    {
        $vow = Vow::get();
        return view('admin.vow', [
                        'vow' => $vow,
                    ]);
    }
    
    public function createvow()
    {
        Vow::orderBy('created_at', 'desc')->take(1)->delete();
        $vow = new Vow;
        $vow->description = Input::get('description');
        $vow->save();
        return redirect('admin/vow')->with('vowstatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getHistory()
    {
        $histories = History::get();
        return view('admin.history', [
                        'histories' => $histories,
                    ]);
    }
    
    public function createHistory(PhotosRequest $request)
    {
        $history = new History;
        $history->title = Input::get('title');
        if ($request->get('photos')) {
            $history->images = serialize($request->get('photos'));
        }
        $history->date = Input::get('date');
        $history->description = Input::get('description');
        $history->save();
        return redirect('admin/history')->with('historystatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getSlide()
    {
        $slides = Slide::get();
        return view('admin.slide', [
                    'slides' => $slides,
                ]);
    }
    
    public function createSlide(NewsRequest $request)
    {
        $slide = new Slide;
        $slide->title = Input::get('title');
        $slide->image = $request->get('photo');
        $slide->description = Input::get('description');
        $slide->btnText = Input::get('btnText');
        $slide->btnLink = Input::get('btnLink');
        if (!$slide->isButton) {
            $slide->isButton = 0;
        }
        $slide->isButton = Input::get('isButton');
        $slide->save();
        return redirect('admin/slide')->with('slidestatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getSectorInfo()
    {
        $locations = Location::get();
        $sectorInfos = sectorInfo::get();
        $provinces = Province::get();
        return view('admin.sectorInformation', [
                    'sectorInfos' => $sectorInfos,
                    'locations' => $locations,
                    'provinces' => $provinces,
                ]);
    }
    
    
    public function createSectorInfo()
    {
        $sector = new sectorInfo;
        $sector->title = Input::get('title');
        $sector->description = Input::get('description');
        $sector->location_id = Input::get('location');
        $sector->save();
        return redirect('admin/sector')->with('sectorstatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getStructure()
    {
        $structure = Structure::get();
        return view('admin.structure', [
                    'structure' => $structure,
                ]);
    }
    
    public function createStructure()
    {
        Structure::orderBy('created_at', 'desc')->take(1)->delete();
        $structure = new Structure;
        $structure->description = Input::get('description');
        $structure->save();
        return redirect('admin/structure')->with('structurestatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getProgramName()
    {
        $programNames = ProgramName::get();
        return view('admin.programname', [
                    'programNames' => $programNames,
                ]);
    }
    
    public function createProgramName()
    {
        $programname = new ProgramName;
        $programname->name = Input::get('name');
        $programname->description = Input::get('description');
        $programname->save();
        return redirect('admin/programname')->with('programnamestatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getprograms()
    {
        $programs = Program::get();
        $programNames = ProgramName::get();
        return view('admin.program', [
                        'programs' => $programs,
                        'programNames' => $programNames
                    ]);
    }
    
    public function createprogram(NewsRequest $request)
    {
        $program = new Program;
        $program->title = Input::get('title');
        $program->short_description = Input::get('shortdescription');
        $program->image = $request->get('photo');
        $program->programName_id = Input::get('programname');
        $program->description = Input::get('description');
        $program->save();
        return redirect('admin/programs')->with('programstatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getProgramComment()
    {
        $programNames = ProgramName::get();
        $Programcomments  = Programcomment::get();
        return view('admin.programcomment', [
                    'Programcomments' => $Programcomments,
                    'programNames' => $programNames
                ]);
    }
    
    public function createProgramComment(NewsRequest $request)
    {
        $p_comment = new Programcomment;
        $p_comment->title = Input::get('title');
        $p_comment->subtitle = Input::get('subtitle');
        $p_comment->imageURL = $request->get('photo');
        $p_comment->program_id = Input::get('programname');
        $p_comment->description = Input::get('comment');
        $p_comment->save();
        return redirect('admin/programcomment')->with('pcommentstatus', 'Амжилттай хадгалагдлаа!');
    }
    
    public function getMail()
    {
        return view('admin.email');
    }
    
    public function sendMail()
    {
        $title = Input::get('title');
        $description = Input::get('description');
        $subscribers = Subsriber::get();
        $emails = Subsriber::get()->pluck('email')->toArray();
        if (!$subscribers->isEmpty()) {
            Mail::to($emails)->queue(new EmailReminder($title, $description));
        }
        return redirect('admin/sendmail')->with('mailstatus', 'Амжилттай илгээлээ !');
    }
    
    
    public function storePhoto(Request $request, $x, $y)
    {
        $photo = $request->file('file');
        $path = 'photos/uploads/'.md5(microtime()).'.'.$photo->getClientOriginalExtension();
        Image::make($photo->getRealPath())->fit($x, $y)->save($path);
        
        return response()->view('admin.photoview', [
                    'photo' => $path,
                ], 200);
    }
    
    public function destroyPhoto(Request $request)
    {
        $photo = $request->get('path');
        Storage::disk('public_path')->delete($photo);
        
        return response()->json([
                    'success' => true,
                ], 200);
    }

    public function storeAPhoto(Request $request, $x, $y)
    {
        $photo = $request->file('file');
        $path = 'photos/uploads/'.md5(microtime()).'.'.$photo->getClientOriginalExtension();
        Image::make($photo->getRealPath())->fit($x, $y)->save($path);
        return response()->view('admin.aphotoview', [
                    'photo' => $path,
                ], 200);
    }
    
    
    public function getoptions()
    {
        $sectors = Options::findOrFail(1);
        $members = Options::findOrFail(2);
        $projects = Options::findOrFail(3);
        return view('admin.options', [
            'sectors' => $sectors,
            'members' => $members,
            'projects' => $projects,
        ]);
    }

    public function createoptions($id)
    {
        $options = Options::findOrFail($id);
        $options->name = Input::get('name');
        $options->value = Input::get('value');
        $options->save();
        return redirect()->back()->with('optionstatus', 'Амжилттай хадгалагдлаа!');
    }

    public function createrule()
    {
        rule::orderBy('created_at', 'desc')->take(1)->delete();
        $rule = new rule;
        $rule->description = Input::get('description');
        $rule->title = Input::get('title');
        $rule->subtitle = Input::get('subtitle');
        $rule->file = Input::get('filename');
        $rule->original_filename = Input::get('originalfilename');
        $rule->path_filename = Input::get('path');
        $rule->save();
        return redirect('admin/rule')->with('rulestatus', 'Амжилттай хадгалагдлаа!');
    }

    public function getrule()
    {
        $rule = rule::get();
        return view('admin.addRules', [
            'rule' => $rule,
        ]);
    }

    public function addfile(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $original_filename = $file->getClientOriginalName();
        $filepath = Storage::disk('public_path')->put('uploads/'.$file->getFilename().'.'.$extension, File::get($file));
        $filename = $file->getFilename().'.'.$extension;
        $path = 'storage/'.$filename;
        $array = array();
        $array[] = $original_filename;
        $array[] = $filename;
        $array[] = $path;
        return response()->json($array);
    }
}
