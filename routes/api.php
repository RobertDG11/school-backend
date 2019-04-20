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
Route::post('addDetails/{teacher_id}', 'TeacherDetailsController@addDetails');
Route::get('teacherDetails', 'TeacherDetailsController@index');
Route::get('teacherDetail/{id}', 'TeacherDetailsController@show');