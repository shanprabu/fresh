<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
 * 
 */

Route::get('/','HomeController@Index');
Route::get('/login','HomeController@Login');
Route::post('/login','HomeController@postLogin');
Route::get('/ajax','HomeController@ajaxCheck');
Route::post('/ajaxreturn','HomeController@ajaxReturn');
Route::get('/angular','HomeController@angularTest');
Route::post('/angularsearch','HomeController@angularSearch');

Route::get('/testupload','HomeController@testUpload');
Route::post('/testupload','HomeController@doUpload');

//User authentication and registration
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');