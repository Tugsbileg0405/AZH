<?php

/*
|--------------------------------------------------------------------------
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
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'AppController@index')->name('index');
Route::get('/about', 'AboutController@index');
Route::get('/news', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@showNews')->name('shownews');
Route::get('/category/{id}', 'NewsController@getCatNews')->name('getCatNews');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@createContact');
Route::get('/projects', 'ProjectsController@index');
Route::get('/sector/{id}', 'AboutController@getSector')->name('getSector');
Route::get('/sectornews/{id}', 'AboutController@getSectorNews')->name('getSectorNews');

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/users', 'AdminController@getUsers')->name('admin.users');
    Route::get('/category', 'AdminController@getCategories')->name('admin.categories');
    Route::post('/category', 'AdminController@createCategory')->name('admin.createcategory');
    Route::get('/location', 'AdminController@getLocation')->name('admin.getlocation');
    Route::get('/faq', 'AdminController@getFAQs')->name('admin.getfaqs');
    Route::post('/faq', 'AdminController@createFAQ')->name('admin.createfaq');
    Route::post('/location', 'AdminController@createLocation')->name('admin.createlocation');
    Route::post('/addnews', 'AdminController@createNews')->name('admin.createnews');
    Route::get('/addnews', 'AdminController@showAddNews')->name('admin.addnews');
    Route::get('/news/edit/{id}', 'AdminController@editNews')->name('admin.editnews');
    Route::post('/news/delete/{id}', 'AdminController@deleteNews')->name('admin.deletenews');
    Route::get('/array-data', 'AdminController@getNews')->name('datatables.data');
    Route::get('/presidents', 'AdminController@getPresidents')->name('admin.presidents');
    Route::get('/intro', 'AdminController@getIntro')->name('admin.intro');
    Route::post('/intro', 'AdminController@createIntro')->name('admin.createintro');
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
});
