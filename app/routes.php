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

Route::resource('cafes', 'CafeController');
Route::get('cafe/page/{perpage}/{page}', 'CafeController@page');
Route::get('cafe/id/{id}', 'CafeController@show');
Route::get('cafe/name/{keyword}', 'CafeController@name');

App::before(function(){
    // The (in)famous catch-all
    //Route::any('{all}', 'BaseController@handleRequest')->where('all', '.*');
});


App::after(function($request, $response){
    // Remove cookie(s)
    $response->headers->removeCookie( 'laravel_session' );
});
