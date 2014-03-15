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

Route::resource('pointsofintrests', 'PoIController');
Route::get('poi/page/{perpage}/{page}', 'PoIController@page');
Route::get('poi/id/{id}', 'PoIController@show');
Route::get('poi/name/{keyword}', 'PoIController@name');

App::before(function(){
    // The (in)famous catch-all
    //Route::any('{all}', 'BaseController@handleRequest')->where('all', '.*');
});


App::after(function($request, $response){
    // Remove cookie(s)
    $response->headers->removeCookie( 'laravel_session' );
});
