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

// Route::get('/', function () {
// 	return view('welcome');
// });


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@dashboard');
Route::resource('sendemail', 'ContactUSController');
Route::post('/registeruser','UserController@registeruser');

Route::group([
    'middleware' => ['web','auth']
],
    function() {
        
        Route::resource('events', 'EventController');
        Route::resource('users', 'UserController');
        Route::get('/show/school/{id}','\Bimmunity\Bimmodels\Http\Controllers\BuildingController@profile');
        Route::get('/inf_news_event','\Bimmunity\Bimmodels\Http\Controllers\BuildingController@newevents');
        Route::resource('requests', 'RequestController');
        Route::get('/school/facility/{id}','\Bimmunity\Bimmodels\Http\Controllers\BuildingController@facility');
        
            
});




