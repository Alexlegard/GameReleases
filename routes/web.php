<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
/**********************STATIC PAGES****************************/

// These methods save us from having to create a controller just
// to return a static view.

Route::get('/', function () {
    return view('welcome');
});

Route::get('suggestgame', function()
{
	return view('suggestgame');
});

Route::get('contact', function()
{
	return view('contact');
});
Route::get('advanced', function()
{
	return view('advanced');
});
/**************************************************************/
/********************* GET routes *****************************/

Route::get('/profile/{user}', 'ProfilesController@profile')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

/******************** Patch routes ****************************/

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');