<?php
use Debugbar\Debugbar;
use App\Genre;
use App\Console;

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
	$genres = Genre::all()->sortBy('title');
	
    return view('welcome', [
		"genres" => $genres
	]);
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


/******************** Games front-end ********************************************************************************/

/* Post comment */
Route::post('games/{game}/comment', 'CommentsController@store')->name('comments.store');
/* Show game */
Route::get('games/{game}', 'GamesController@show')->name('public.games.show');

/******************** Game suggestions *******************************************************************************/

/* /suggestgame (Suggest a game) */
Route::get('suggestgame', 'GameSuggestionsController@create')->name('gamesuggestions.create');
/* /gamesuggestion (store) */
Route::post('suggestgame', 'GameSuggestionsController@store')->name('gamesuggestions.store');
/******************** Admin/index ************************************************************************************/

Route::prefix('admin')->group(function() {
	
	/* Index */
	Route::get('', 'AdminController@admin')->middleware('is_admin')->name('admin');

	/******************** Admin/games ************************************************************************************/
	/* /games (list) */
	Route::get('games', 'GamesController@index')->middleware('is_admin')->name('games.index');
	/* /games/create */
	Route::get('games/create', 'GamesController@create')->middleware('is_admin')->name('games.create');
	/* /games (store) */
	Route::post('games', 'GamesController@store')->middleware('is_admin')->name('games.store');
	/* /games/{id} (show) */
	Route::get('games/{game}', 'GamesController@show')->middleware('is_admin')->name('admin.games.show');
	/* /games/{id}/edit */
	Route::get('games/{game}/edit', 'GamesController@edit')->middleware('is_admin')->name('games.edit');
	/* /games/{id} (update) */
	Route::patch('games/{game}', 'GamesController@update')->middleware('is_admin')->name('games.update');
	/* /games/{id} (destroy) */
	Route::delete('games/{game}', 'GamesController@destroy')->middleware('is_admin')->name('games.destroy');


	/********************* Admin/developers ******************************************************************************/
	/* /developers (list) */
	Route::get('developers', 'DevelopersController@index')->middleware('is_admin')->name('developers.index');
	/* /developers/create */
	Route::get('developers/create', 'DevelopersController@create')->middleware('is_admin')->name('developers.create');
	/* /developers (store) */
	Route::post('developers', 'DevelopersController@store')->middleware('is_admin')->name('admin.developers.store');
	/* /developers/{id} (show) */
	Route::get('developers/{developer}', 'DevelopersController@show')->middleware('is_admin')->name('developers.show');
	/* /developers/{id}/edit */
	Route::get('developers/{developer}/edit', 'DevelopersController@edit')->middleware('is_admin')->name('developers.edit');
	/* /developers/{id} (update) */
	Route::patch('developers/{developer}', 'DevelopersController@update')->middleware('is_admin')->name('developers.update');
	/* /developers/{id} (destroy) */
	Route::delete('developers/{developer}', 'DevelopersController@destroy')->middleware('is_admin')->name('developers.destroy');


	/********************** Admin/publishers *****************************************************************************/
	/* /publishers (list) */
	Route::get('publishers', 'PublishersController@index')->middleware('is_admin')->name('publishers.index');
	/* /publishers/create */
	Route::get('publishers/create', 'PublishersController@create')->middleware('is_admin')->name('publishers.create');
	/* /developers (store) */
	Route::post('publishers', 'PublishersController@store')->middleware('is_admin')->name('publishers.store');
	/* /publishers/{id} (show) */
	Route::get('publishers/{publisher}', 'PublishersController@show')->middleware('is_admin')->name('publishers.show');
	/* /publishers/{id}/edit */
	Route::get('publishers/{publisher}/edit', 'PublishersController@edit')->middleware('is_admin')->name('publishers.edit');
	/* /publishers/{id} (update) */
	Route::patch('publishers/{publisher}', 'PublishersController@update')->middleware('is_admin')->name('publishers.update');
	/* /pulishers/{id} (destroy) */
	Route::delete('publishers/{publisher}', 'PublishersController@destroy')->middleware('is_admin')->name('publishers.destroy');


	/*********************** Admin/genres *********************************************************************************/
	/* /genres (list) */
	Route::get('genres', 'GenresController@index')->middleware('is_admin')->name('genres.index');
	/* /genres/create */
	Route::get('genres/create', 'GenresController@create')->middleware('is_admin')->name('genres.create');
	/* /genres (store) */
	Route::post('genres', 'GenresController@store')->middleware('is_admin')->name('genres.store');
	/* /genres/{id} (show) */
	Route::get('genres/{genre}', 'GenresController@show')->middleware('is_admin')->name('genres.show');
	/* /genres/{id}/edit */
	Route::get('genres/{genre}/edit', 'GenresController@edit')->middleware('is_admin')->name('genres.edit');
	/* /genres/{id} (update) */
	Route::patch('genres/{genre}', 'GenresController@update')->middleware('is_admin')->name('genres.update');
	/* /genres/{id} (destroy) */
	Route::delete('genres/{genre}', 'GenresController@destroy')->middleware('is_admin')->name('genres.destroy');

	/*********************** Admin/consoles *******************************************************************************/

	/* /consoles (list) */
	Route::get('consoles', 'ConsolesController@index')->middleware('is_admin')->name('consoles.index');
	/* /consoles/create */
	Route::get('consoles/create', 'ConsolesController@create')->middleware('is_admin')->name('consoles.create');
	/* /consoles (store) */
	Route::post('consoles', 'ConsolesController@store')->middleware('is_admin')->name('consoles.store');
	/* /consoles/{id} (show) */
	Route::get('consoles/{console}', 'ConsolesController@show')->middleware('is_admin')->name('consoles.show');
	/* /consoles/{id}/edit */
	Route::get('consoles/{console}/edit', 'ConsolesController@edit')->middleware('is_admin')->name('consoles.edit');
	/* /genres/{id} (update) */
	Route::patch('consoles/{console}', 'ConsolesController@update')->middleware('is_admin')->name('consoles.update');
	/* /genres/{id} (destroy) */
	Route::delete('consoles/{console}', 'ConsolesController@destroy')->middleware('is_admin')->name('consoles.destroy');
	
	/************************ Admin/comments *****************************************************************************/
	
	/* /comments (list) */
	Route::get('comments', 'CommentsController@index')->middleware('is_admin')->name('comments.index');
	/* /comments/{id} (show) */
	Route::get('comments/{comment}', 'CommentsController@show')->middleware('is_admin')->name('comments.show');
	/* /comments/{id} (destroy) */
	Route::delete('comments/{comment}', 'CommentsController@destroy')->middleware('is_admin')->name('comments.destroy');
	
	/************************ Admin/users ********************************************************************************/
	
	/* /users (list) */
	Route::get('users', 'UsersController@index')->middleware('is_admin')->name('users.index');
	/* /users/{id} (show) */
	Route::get('users/{user}', 'UsersController@show')->middleware('is_admin')->name('users.show');
	/* /users/{id}/edit_admin */
	Route::get('users/{user}/edit_admin', 'UsersController@edit_admin')->middleware('is_admin')->name('users.edit_admin');
	/* /users/{id} */
	Route::patch('users/{user}', 'UsersController@update_admin')->middleware('is_admin')->name('users.update_admin');
	
	/************************ Admin/suggestions **************************************************************************/
	
	/* /suggestions/{id} (show) */
	Route::get('suggestions/{gameSuggestion}', 'GameSuggestionsController@show')->middleware('is_admin')->name('gameSuggestions.show');
	/* /suggestions (list) */
	Route::get('suggestions', 'GameSuggestionsController@index')->middleware('is_admin')->name('gameSuggestions.index');
	/* /suggetions/{id} (destroy) */
	Route::delete('suggestions/{gameSuggestion}', 'GameSuggestionsController@destroy')->middleware('is_admin')->name('gameSuggestions.destroy');
	
});













