 


<?php
use App\Events\messagesEvent;
use Illuminate\Http\Request;	
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');


//Developer Routes

Route::get('/Developer', function () {
    return view('Developer.Dashboard');
})->name('Devdashboard')->middleware('auth');

Route::get('/Developer/ApplyToProject', 'Projects@index')->name('ApplyToProject')->middleware('auth');

Route::get('/user/profile', 'Profile@index')->name('profile')->middleware('auth');

Route::get('/Developer/messages', function () {
    return view('Developer.messages');
})->name('Devmessages')->middleware('auth');

Route::post('/applyproject/{id}/{title}','Projects@applyForProject');

Route::get('/ProductOwner/postedprojects', 'Projects@getPostedProjects')->name('developerRequests');   //get posted projects list

Route::get('/startTest/{id}/{catagory}', 'Projects@startTest')->name('startTest');   //Getting Tests Details

//recommended developer's list
Route::post('/submitProject/{id}','FileController@storeFile')->name('uploadFile');


//Default Main Route
Route::get('/', function () {
    return view('welcome');
})->name('default');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register/PO', function () {
    return view('auth.POregister');
})->name('POregister');

Route::get('/register/Dev', function () {
    return view('auth.Devregister');
})->name('Devregister');

Route::get('/registerDeveloper', 'Auth\RegisterDeveloperController@create')->name('registerDeveloper');

Route::get('/ShowMessages', 'ContactsController@get')->name('showmessages');

Route::get('/passwordrecovery', function () {
    return view('auth.passwordrecovery');
})->name('passwordrecovery');

Route::get('/contacts', 'ContactsController@get')->name('GetContacts');

Route::get('/conversation/{id}', 'ContactsController@getMessagesFor')->name('GetMessagesList');

Route::post('/conversation/send', 'ContactsController@send')->name('sendMessage');

Route::post('/conversation/send/{id}', 'ContactsController@initailsend');



//Product Owner Routes
Route::get('/user', 'Dashboard@index')->name('dashboard')->middleware('auth');

Route::get('/ProductOwner/PostProject', 'Projects@postproject')->name('PostProject')->middleware('auth');

Route::post('/ProductOwner/PostNewProject', 'Projects@postnewproject')->name('PostNewProject')->middleware('auth');


Route::get('/ProductOwner/profile', function () {
    return view('ProductOwner.profile');
})->name('POprofile')->middleware('auth');

//editProject/
Route::post('/editProject/{id}','Projects@editProject');

//developer's list
Route::get('/showemplist/{pid}','Projects@getEmployeeList')->name('emplist');


Route::get('/ProductOwner/feedback','feedback@givefeedback');

//postfeedback 
Route::post('/postfeedback/{id}/{pid}','feedback@storeFeedback')->name('postfeedback');

//activeProjects
Route::get('/ProductOwner/ActiveProjects/{id}', 'Projects@activeProjects')->name('ActiveProjects')->middleware('auth');


//makePayment
Route::post('/make/payment/{card_name}/{card_email}/{card_address}/{card_number}/{card_cvv}/{card_month}/{card_year}/{dev_id}/{project_id}/{token}/{offeramount}', 'Payments@makePayment')->name('makePayment')->middleware('auth');

//recommended developer's list
Route::get('/showrecodevlist/{pid}/{catagory}','RecommendationSystem@startDeveloperRecommendation')->name('recodevlist');

//file downloader
Route::get('/ProductOwner/downloadFile/{path}/{name}', function(Request $req){
	$filepath = $req->path;
	$filename = $req->name;
	return response()->download(storage_path("app/public/{$filepath}"),$filename);
})->name('download');

//Endorsement
Route::get('/Endorsement/{id}','FileController@filecontrolling')->name('endorsement');

//create repo
Route::get('/create_repo/{projid}/{devid}/{poid}/{reponame}','Projects@versioncontrolsystem')->name('vcs');

//screensharing
Route::get('/doscreensharing','ScreenShareController@startScreenSharing')->name('screensharing');