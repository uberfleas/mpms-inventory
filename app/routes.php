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

Route::get('/', function()
{
	return View::make('pages.home');
});

//--- Routes for the Art Object Set

//Artobj Route
Route::resource('artobjs', 'ArtobjController');

//Medium Route
Route::resource('mediums', 'MediumController');

//Genre Route
Route::resource('genres', 'GenreController');

//Event Route
Route::resource('shows', 'ShowController');

//Commission Route
Route::resource('commissions','CommissionController');

//Customer Route
Route::resource('customers','CustomerController');