<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'SiteController@index');
Route::get('/api', 'SiteController@api');
Route::get('/legal', 'SiteController@legal');

Route::resource('pointsofintrests', 'PoIController');
Route::get('poi/page/{perpage}/{page}', 'PoIController@page');
Route::get('poi/', 'PoIController@index');
Route::get('poi/id/{id}', 'PoIController@show');
Route::get('poi/name/{keyword}', 'PoIController@name');

Route::resource('calendar', 'CalendarController');
Route::get('cal/page/{perpage}/{page}', 'CalendarController@page');
Route::get('cal/', 'CalendarController@index');
Route::get('cal/id/{id}', 'CalendarController@show');
Route::get('cal/name/{keyword}', 'CalendarController@name');
Route::get('cal/all/', 'CalendarController@all');

Route::get('user/all', 'UserController@all');
Route::get('user/show/{email}', 'UserController@show');
Route::post('user/login/', 'UserController@login');

App::before(function(){
    // The (in)famous catch-all
    //Route::any('{all}', 'BaseController@handleRequest')->where('all', '.*');
});


App::after(function($request, $response){
    // Remove cookie(s)
    $response->headers->removeCookie( 'laravel_session' );
});
