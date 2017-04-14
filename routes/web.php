<?php


/*
--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
}
);

Auth::routes();
Route::any('/register',function(){
	abort(404);
});
Route::get('/home', 'HomeController@index');
Route::get('/', 'AppController@index')->name('index');
Route::get('/about', 'AboutController@index')->name('about');;
Route::get('/news', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@showNews')->name('shownews');
Route::get('/category/{id}', 'NewsController@getCatNews')->name('getCatNews');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@createContact');
Route::post('/subscribe', 'AppController@createSubscribe');
Route::get('/projects', 'ProjectsController@index');
Route::get('/programs', 'ProgramController@index')->name('programs');
Route::get('/programname/{id}', 'ProgramController@getProgramByName')->name('getProgramByName');
Route::get('/programs/{id}', 'ProgramController@getProgram')->name('getProgram');
Route::get('/program/{id}', 'ProgramController@getAProgram')->name('getAProgram');
Route::get('/sector/{id}', 'AboutController@getSector')->name('getSector');
Route::post('/savetab', 'AboutController@saveTab')->name('saveTab');
Route::get('/sectornews/{id}', 'AboutController@getSectorNews')->name('getSectorNews');
Route::get('/fileentry/get/{filename}', ['as' => 'getentry', 'uses' => 'AboutController@getfile']);

Route::prefix('admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/users', 'AdminController@getUsers')->name('admin.users');
	Route::get('/programcomment', 'AdminController@getProgramComment')->name('getProgramComment');
	Route::post('/programcomment', 'AdminController@createProgramComment')->name('createProgramComment');
	Route::get('/category', 'AdminController@getCategories')->name('admin.categories');
	Route::post('/category', 'AdminController@createCategory')->name('admin.createcategory');
	Route::get('/location', 'AdminController@getLocation')->name('admin.getlocation');
	Route::get('/faq', 'AdminController@getFAQs')->name('admin.getfaqs');
	Route::post('/faq', 'AdminController@createFAQ')->name('admin.createfaq');
	Route::post('/location', 'AdminController@createLocation')->name('admin.createlocation');
	Route::post('/addnews', 'AdminController@createNews')->name('admin.createnews');
	Route::get('/addnews', 'AdminController@showAddNews')->name('admin.addnews');
	Route::get('/news/edit/{id}', 'AdminController@editNews')->name('admin.editnews');
	Route::post('/news/edit/{id}', 'AdminController@saveeditedNews')->name('admin.saveeditedNews');
	Route::post('/news/delete/{id}', 'AdminController@deleteNews')->name('admin.deletenews');
	Route::get('/array-data', 'AdminController@getNews')->name('datatables.data');
	Route::get('/allcategories', 'AdminController@getallcategories')->name('datatables.getallcat');
	Route::post('/category/delete/{id}', 'AdminController@deletecategories')->name('datatables.deletecat');
	Route::get('/category/edit/{id}', 'AdminController@getEditCategory')->name('admin.getEditCategory');
	Route::post('/category/edit/{id}', 'AdminController@editCategory')->name('admin.editCategory');
	Route::get('/programname/edit/{id}', 'AdminController@getEditprogramname')->name('admin.getEditprogramname');
	Route::post('/programname/edit/{id}', 'AdminController@editprogramname')->name('admin.editprogramname');
	Route::get('/program/edit/{id}', 'AdminController@getEditprogram')->name('admin.getEditprogram');
	Route::post('/program/edit/{id}', 'AdminController@editprogram')->name('admin.editprogram');
	Route::get('/programcomment/edit/{id}', 'AdminController@getEditprogramcomment')->name('admin.getEditprogramcomment');
	Route::post('/programcomment/edit/{id}', 'AdminController@editprogramcomment')->name('admin.editprogramcomment');
	Route::get('/president/edit/{id}', 'AdminController@getEditpresident')->name('admin.getEditpresident');
	Route::post('/president/edit/{id}', 'AdminController@editpresident')->name('admin.editpresident');
	Route::get('/location/edit/{id}', 'AdminController@getEditlocation')->name('admin.getEditlocation');
	Route::post('/location/edit/{id}', 'AdminController@editlocation')->name('admin.editlocation');
	Route::get('/sectorinfo/edit/{id}', 'AdminController@getEditsectorInfo')->name('admin.getEditsectorInfo');
	Route::post('/sectorinfo/edit/{id}', 'AdminController@editsectorInfo')->name('admin.editsectorInfo');
	Route::get('/faq/edit/{id}', 'AdminController@getEditfaq')->name('admin.getEditfaq');
	Route::post('/faq/edit/{id}', 'AdminController@editfaq')->name('admin.editfaq');
	Route::get('/history/edit/{id}', 'AdminController@getEdithistory')->name('admin.getEdithistory');
	Route::post('/history/edit/{id}', 'AdminController@edithistory')->name('admin.edithistory');
	Route::get('/slide/edit/{id}', 'AdminController@getEditslide')->name('admin.getEditslide');
	Route::post('/slide/edit/{id}', 'AdminController@editslide')->name('admin.editslide');
	
	Route::get('/allpronames', 'AdminController@getallpronames')->name('datatables.allpronames');
	Route::post('/allpronames/delete/{id}', 'AdminController@deleteproname')->name('datatables.deleteproname');
	Route::get('/allprograms', 'AdminController@getallprograms')->name('datatables.allprograms');
	Route::post('/allprograms/delete/{id}', 'AdminController@deleteprogram')->name('datatables.deleteprogram');
	Route::get('/allprogramcomments', 'AdminController@getallprogramcomments')->name('datatables.allprogramcomments');
	Route::post('/allprogramcomments/delete/{id}', 'AdminController@deleteprogramcomment')->name('datatables.deleteprogramcomment');
	Route::get('/allpresidents', 'AdminController@getallpresidents')->name('datatables.getallpresidents');
	Route::post('/allpresidents/delete/{id}', 'AdminController@deletepresident')->name('datatables.deletepresident');
	Route::get('/alllocations', 'AdminController@getalllocations')->name('datatables.getalllocations');
	Route::post('/alllocations/delete/{id}', 'AdminController@deletelocation')->name('datatables.deletelocation');
	Route::get('/allsectorinfos', 'AdminController@getallsectorinfos')->name('datatables.getallsectorinfos');
	Route::post('/allsectorinfos/delete/{id}', 'AdminController@deletesectorinfo')->name('datatables.deletesectorinfo');
	Route::get('/allfaq', 'AdminController@getallfaq')->name('datatables.getallfaq');
	Route::post('/allfaq/delete/{id}', 'AdminController@deletefaq')->name('datatables.deletefaq');
	Route::get('/allhistory', 'AdminController@getallhistory')->name('datatables.getallhistory');
	Route::post('/allhistory/delete/{id}', 'AdminController@deletehistory')->name('datatables.deletehistory');
	Route::get('/allslides', 'AdminController@getallslides')->name('datatables.getallslides');
	Route::post('/allslides/delete/{id}', 'AdminController@deleteslide')->name('datatables.deleteslide');
	Route::get('/allusers', 'AdminController@getallusers')->name('datatables.getallusers');
	Route::get('/allcontact', 'AdminController@getallcontact')->name('datatables.getallcontact');
	
	Route::get('/presidents', 'AdminController@getPresidents')->name('admin.presidents');
	Route::get('/intro', 'AdminController@getIntro')->name('admin.intro');
	Route::post('/intro', 'AdminController@createIntro')->name('admin.createintro');
	Route::get('/vow', 'AdminController@getvow')->name('admin.getvow');
	Route::post('/vow', 'AdminController@createvow')->name('admin.createvow');
	Route::get('/rule', 'AdminController@getrule')->name('admin.getrule');
	Route::post('/rule', 'AdminController@createrule')->name('admin.createrule');
	Route::get('/slide', 'AdminController@getSlide')->name('admin.getSlide');
	Route::post('/slide', 'AdminController@createSlide')->name('admin.createSlide');
	Route::get('/sector', 'AdminController@getSectorInfo')->name('admin.getSectorInfo');
	Route::post('/sector', 'AdminController@createSectorInfo')->name('admin.createSectorInfo');
	Route::get('/history', 'AdminController@getHistory')->name('admin.gethistory');
	Route::post('/history', 'AdminController@createHistory')->name('admin.createhistory');
	Route::get('/structure', 'AdminController@getStructure')->name('admin.getStructure');
	Route::post('/structure', 'AdminController@createStructure')->name('admin.createStructure');
	Route::post('/presidents', 'AdminController@createPresident')->name('admin.createpresident');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/contacts', 'AdminController@getContacts')->name('admin.getcontacts');
	Route::get('/programname', 'AdminController@getProgramName')->name('admin.getProgramName');
	Route::post('/programname', 'AdminController@createProgramName')->name('admin.createProgramName');
	Route::get('/programs', 'AdminController@getprograms')->name('admin.getprograms');
	Route::post('/programs', 'AdminController@createprogram')->name('admin.createprogram');
	Route::get('/sendmail', 'AdminController@getMail')->name('admin.getMail');
    Route::post('/sendmail', 'AdminController@sendMail')->name('admin.sendMail');
	Route::get('/options', 'AdminController@getoptions')->name('admin.getoptions');
	Route::post('/options/{id}', 'AdminController@createoptions')->name('admin.createoptions');

	Route::post('/storephoto/{x}/{y}', 'AdminController@storePhoto')->name('admin.storePhoto');
	Route::post('/storeaphoto/{x}/{y}', 'AdminController@storeAPhoto')->name('admin.storeAPhoto');
	Route::post('/deletephoto', 'AdminController@destroyPhoto')->name('admin.destroyPhoto');
    Route::post('/fileentry/add',[ 'as' => 'addentry', 'uses' => 'AdminController@addfile']);
}
);
