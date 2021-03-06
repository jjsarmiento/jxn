<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::post('/doLogin', 'Controller@doLogin');
Route::post('/doRegister', 'Controller@doRegister');
Route::get('/', 'Controller@index');

Route::get('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    // redirect to a protected route after logout to protect caching of page in user's browser - Jan Sarmiento
    return redirect('/home');
});

//Auth::routes();
Route::group(['middleware' => 'AuthJXN'], function(){
    Route::get('/home', 'HomeController@index');

    // ROUTES EXCLUSIVE FOR MASTER ROLES - Jan
    Route::group(['middleware' => 'AuthMaster'], function(){

    });
});

// handling of missing/non-existing routes are handled at Exceptions/Handler.php