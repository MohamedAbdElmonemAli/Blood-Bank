<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'V1', 'namespace'=>'Api'],function(){
    Route::get('governorates','MainController@governorates');
    Route::get('cities','MainController@cities');
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::post('resetpassword','AuthController@resetpassword');
    Route::post('newpassword','AuthController@newpassword');

    Route::group(['middleware'=>'auth:api'],function(){
      Route::get('posts','MainController@posts');
      Route::get('postDetails','MainController@postDetails');
      Route::get('clients','MainController@clients');
      Route::get('getcategories','MainController@getcategories');
      Route::get('searchByCategory','MainController@searchByCategory');
      Route::get('favourites','MainController@favourites');
      Route::post('toggleFavourites','MainController@toggleFavourites');
      Route::get('settings','MainController@settings');
      Route::post('contacts','MainController@contacts');
      Route::get('profile','MainController@profile');
      Route::post('editprofile','MainController@editprofile');
      Route::get('notificationsetting','MainController@notificationsetting');
      Route::get('notifications','MainController@notifications');
      Route::post('updatenotificationsetting','MainController@updatenotificationsetting');
      Route::post('registertoken','AuthController@registertoken');
      Route::post('removetoken','AuthController@removetoken');
      Route::post('createDonation','MainController@createDonation');
      Route::get('donationSearch','MainController@donationSearch');
      Route::get('donations','MainController@donations');
      Route::get('donationDetails','MainController@donationDetails');

    });
});
