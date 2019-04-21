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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@authenticate');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('teacherDetail/{id}', 'TeacherDetailsController@addDetails');
Route::get('teacherDetails', 'TeacherDetailsController@index');
Route::get('teacherDetail/{id}', 'TeacherDetailsController@show');
Route::post('booking', 'BookingController@create');
Route::put('booking/{id}', 'BookingController@update');
Route::get('booking', 'BookingController@index');
Route::get('booking/{id}', 'BookingController@find');
Route::post('classroom', 'ClassroomController@create');
Route::put('classroom/{id}', 'ClassroomController@update');
Route::get('classroom', 'ClassroomController@index');
Route::get('classroom/{id}', 'ClassroomController@find');
