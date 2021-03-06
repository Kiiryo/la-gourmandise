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

Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::auth();

    Route::resource('/queries/search', 'QueryController@search');

    Route::get('/', 'HomeController@index');

    Route::resource('/recette', 'RecetteController');

    Route::get('/compte/mesrecettes', 'CompteController@mesrecettes');

    Route::resource('/compte', 'CompteController');
});