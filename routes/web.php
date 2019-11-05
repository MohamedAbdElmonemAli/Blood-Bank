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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.signin');
});

Route::get('/newPassword','UserController@ResetPassword')->name('newPassword');
Route::post('/newPassword','UserController@NewPassword')->name('postNewPassword');
Route::get('/resetPassword','UserController@GetEmail')->name('resetPassword');
Route::post('/resetPassword','UserController@SendEmail')->name('postResetPassword');


Route::group(['middleware'=>['auth','auto-check-permission'],'prefix' => 'admin'],function(){

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('governorate','GovernorateController');
Route::resource('city','CityController');
Route::resource('category','CategoryController');
Route::resource('role','RoleController');
Route::resource('post','PostController');
Route::resource('setting','SettingController');
Route::resource('client','ClientController');
Route::resource('donationrequests','DonationRequestController');
Route::resource('contact','ContactController');
Route::resource('user','UserController');
Route::get('search','ClientController@search');
Route::get('donationsearch','DonationRequestController@donationsearch');
Route::post('status/{id}','ClientController@status');
Route::get('reset','UserController@reset');
Route::post('changePassword','UserController@changePassword');
});


Auth::routes();


Route::group(['prefix' => 'user','namespace'=>'Front'],function(){

  Route::get('loginsite','AuthController@getLogin')->name('loginsite');
  Route::post('loginsite','AuthController@login');
  Route::get('register','AuthController@getRegister')->name('register');
  Route::post('register','AuthController@newRegister');
  Route::get('/newPassword','AuthController@ResetPassword')->name('newPassword');
  Route::post('/newPassword','AuthController@NewPassword')->name('postNewPassword');
  Route::get('/resetPassword','AuthController@GetEmail')->name('resetPassword');
  Route::post('/resetPassword','AuthController@SendEmail')->name('postResetPassword');
  Route::group(['middleware'=>'auth:client'],function(){

    Route::get('homepage','MainController@home')->name('homepage');
    Route::get('user/logout',function(){
      auth()->guard('client')->logout();
      return redirect('user/loginsite');
    })->name('logoutsite');
    });
    Route::get('postdetail/{id}','MainController@postdetail')->name('postdetail');
    Route::get('donationdetail/{id}','MainController@donationdetail')->name('donationdetail');
    Route::get('donations','MainController@donations')->name('donations');
    Route::get('donationsearch','MainController@donationsearch')->name('donationsearch');
    Route::get('setting','MainController@setting')->name('setting');
    Route::post('contact','MainController@contact')->name('contact');
    Route::get('how_we_are','MainController@how_we_are')->name('how_we_are');
    Route::get('allarticles','MainController@allarticles')->name('allarticles');
    Route::post('toggle-favourite','MainController@toggleFavourite')->name('toggle-favourite');
    Route::get('donationrequest','MainController@getdonationrequest')->name('donationrequest');
    Route::post('postdonation','MainController@postdonation')->name('postdonation');


});
