<?php

use RealRashid\SweetAlert\Facades\Alert;


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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
      Route::resource('patient', 'PatientsController');
      Route::get('/filter', 'PatientsController@filter');
      Route::resource('patient_details', 'PatientsController');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('calendar','EventsController');
});

Route::get('policy', function(){
    return View('policy');
});

Route::get('showcase', function(){
    return View('layouts.showcase');
});

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/register/{social}','Auth\RegisterController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/register/{social}/callback','Auth\RegisterController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
