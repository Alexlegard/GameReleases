<?php
use Debugbar\Debugbar;

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
/**********************STATIC PAGES**********************************************************************************/

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

/********************* Profile ***************************************************************************************/

/* Show profile */
Route::get('/profile/{user}', 'ProfilesController@profile')->name('profile.show');
/* Edit profile */
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
/* Update profile */
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

/******************** Admin/index ************************************************************************************/

/* Index */
Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');

/******************** Admin/games ************************************************************************************/
/* /games (list) */
Route::get('admin/games', 'GamesController@index')->middleware('is_admin')->name('games.index');
/* /games/create */
Route::get('admin/games/create', 'GamesController@create')->middleware('is_admin')->name('games.create');
/* /games (store) */
Route::post('admin/games', 'GamesController@store')->middleware('is_admin')->name('games.store');
/* /games/{id} (show) */
Route::get('admin/games/{game}', 'GamesController@show')->middleware('is_admin')->name('games.show');
/* /games/{id}/edit */
Route::get('admin/games/{game}/edit', 'GamesController@edit')->middleware('is_admin')->name('games.edit');
/* /games/{id} (destroy) */
Route::delete('admin/games/{game}', 'GamesController@destroy')->middleware('is_admin')->name('games.destroy');


/********************* Admin/developers ******************************************************************************/
/* /developers (list) */
Route::get('admin/developers', 'DevelopersController@index')->middleware('is_admin')->name('developers.index');
/* /developers/create */
Route::get('admin/developers/create', 'DevelopersController@create')->middleware('is_admin')->name('developers.create');
/* /developers (store) */
Route::post('admin/developers', 'DevelopersController@store')->middleware('is_admin')->name('developers.store');
/* /developers/{id} (show) */
Route::get('admin/developers/{developer}', 'DevelopersController@show')->middleware('is_admin')->name('developers.show');
/* /developers/{id}/edit */
Route::get('admin/developers/{developer}/edit', 'DevelopersController@edit')->middleware('is_admin')->name('developers.edit');
/* /developers/{id} (update) */
Route::patch('admin/developers/{developer}', 'DevelopersController@update')->middleware('is_admin')->name('developers.update');
/* /developers/{id} (destroy) */
Route::delete('admin/developers/{developer}', 'DevelopersController@destroy')->middleware('is_admin')->name('developers.destroy');


/********************** Admin/publishers *****************************************************************************/
/* /publishers (list) */
Route::get('admin/publishers', 'PublishersController@index')->middleware('is_admin')->name('publishers.index');
/* /publishers/create */
Route::get('admin/publishers/create', 'PublishersController@create')->middleware('is_admin')->name('publishers.create');
/* /developers (store) */
Route::post('admin/publishers', 'PublishersController@store')->middleware('is_admin')->name('publishers.store');
/* /publishers/{id} (show) */
Route::get('admin/publishers/{publisher}', 'PublishersController@show')->middleware('is_admin')->name('publishers.show');
/* /publishers/{id}/edit */
Route::get('admin/publishers/{publisher}/edit', 'PublishersController@edit')->middleware('is_admin')->name('publishers.edit');
/* /publishers/{id} (update) */
Route::patch('admin/publishers/{publisher}', 'PublishersController@update')->middleware('is_admin')->name('publishers.update');
/* /pulishers/{id} (destroy) */
Route::delete('admin/publishers/{publisher}', 'PublishersController@destroy')->middleware('is_admin')->name('publishers.destroy');


/*********************** Admin/genres *********************************************************************************/
/* /genres (list) */
Route::get('admin/genres', 'GenresController@index')->middleware('is_admin')->name('genres.index');
/* /genres/create */
Route::get('admin/genres/create', 'GenresController@create')->middleware('is_admin')->name('genres.create');
/* /genres (store) */
Route::post('admin/genres', 'GenresController@store')->middleware('is_admin')->name('genres.store');
/* /genres/{id} (show) */
Route::get('admin/genres/{genre}', 'GenresController@show')->middleware('is_admin')->name('genres.show');
/* /genres/{id}/edit */
Route::get('admin/genres/{genre}/edit', 'GenresController@edit')->middleware('is_admin')->name('genres.edit');
/* /genres/{id} (update) */
Route::patch('admin/genres/{genre}', 'GenresController@update')->middleware('is_admin')->name('genres.update');
/* /genres/{id} (destroy) */
Route::delete('admin/genres/{genre}', 'GenresController@destroy')->middleware('is_admin')->name('genres.destroy');

/*********************** API ******************************************************************************************/

Route::namespace('Api')->group(function() {
	Route::apiResource('games', 'GamesController');
});