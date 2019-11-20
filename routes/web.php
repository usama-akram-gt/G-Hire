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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


//Developer Routes

Route::get('/Developer', function () {
    return view('Developer.Dashboard');
})->name('Devdashboard');

Route::get('/Developer/ApplyToProject', function () {
    return view('Developer.applytoprojects');
})->name('ApplyToProject');

Route::get('/Developer/profile', function () {
    return view('Developer.profile');
})->name('Devprofile');

Route::get('/Developer/messages', function () {
    return view('Developer.messages');
})->name('Devmessages');



//Default Main Route
Route::get('/', function () {
    return view('index');
})->name('default');

Route::get('/loggingin', function () {
    return view('auth.loggingin');
})->name('loggingin');

Route::get('/register/PO', function () {
    return view('auth.POregister');
})->name('POregister');

Route::get('/register/Dev', function () {
    return view('auth.Devregister');
})->name('Devregister');

Route::get('/passwordrecovery', function () {
    return view('auth.passwordrecovery');
})->name('passwordrecovery');



//Product Owner Routes
Route::get('/ProductOwner', function () {
    return view('ProductOwner.Dashboard');
})->name('POdashboard');

Route::get('/ProductOwner/PostProject', function () {
    return view('ProductOwner.postproject');
})->name('PostProject');

Route::get('/ProductOwner/profile', function () {
    return view('ProductOwner.profile');
})->name('POprofile');

Route::post('/ProductOwner/messages', function () {
    return view('ProductOwner.messages');
})->name('POmessages');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
