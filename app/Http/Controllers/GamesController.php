<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Developer;
use App\Publisher;
use App\Console;
use Illuminate\Http\Request;
use Storage;
use DB;
use Illuminate\Support\Facades\Route;
use Debugbar\Debugbar;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$games = Game::all()->sortBy('title');
		
        return view("admin/games/list", [
			'games' => $games
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$developers = Developer::all()->sortBy('title');
		$publishers = Publisher::all()->sortBy('title');
		$genres = Genre::all()->sortBy('title');
		$consoles = Console::all()->sortBy('title');
		
        return view("admin/games/create", [
			'developers' => $developers,
			'publishers' => $publishers,
			'genres' => $genres,
			'consoles' => $consoles,
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// We want to toggle the relationship with developer and genre
		// so the game and developer are related
		// and the game and genre are related
		// without having to set the column (since there is no column)
		
		$debug = '';
		
		request()->validate([
			'title' => 'required',
			'description' => 'required',
			'developer' => 'required',
			'publisher' => 'required',
			'genre' => 'required',
			'releasedate' => 'date',
			'boxart' => 'image',
		]);
		
		$game = new Game;
		//Set title of game
		$game->title = $request->title;
		
		//Set description of game
		$game->description = $request->description;
		
		//Set publisher of game
		$publisher = Publisher::where('title', $request->publisher)->get();
		$publisherid = $publisher[0]->id;
		$game->publisher_id = $publisherid;
		
		//Set releasedate of game if there is one...
		$game->release_date = $request->releasedate;
		
		//Set boxart if there is one...
		if(request('boxart')){
			
			$filename = $request->title . '.jpg';
			
			$path = Storage::putFileAs(
				'public/game_boxart', $request->file('boxart'), $filename
			);
			
			$game->boxart = $filename;
		}
		
		$game->save();
		
		//Set developer of game with toggle
		$gameid = Game::where('title', $game->title)->get();
		$gameid = $gameid[0]->id;
		

		$game->developer()->sync($request->game, $request->developer);
		$game->genres()->sync($request->game, $request->genre);
		$game->console()->sync($request->game, $request->console);
		
		return redirect("/admin/games");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
		$publisher = Publisher::where('id', $game->publisher_id)->get();
		$publisher = $publisher[0];
		

		if ( Route::currentRouteName() == 'admin.games.show' ) {
			
			return view("admin/games/show", [
				"game" => $game,
				"publisher" => $publisher,
			]);
		}
		
		if ( Route::currentRouteName() == 'public.games.show' ) {
			return view("games/show", [
				"game" => $game,
				"publisher" => $publisher,
			]);
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $developers = Developer::all()->sortBy('title');
		$publishers = Publisher::all()->sortBy('title');
		$publisher = Publisher::where('id', $game->publisher_id)->get();
		$publisher = $publisher[0];
		$genres = Genre::all()->sortBy('title');
		
		return view("admin/games/edit", [
			"game" => $game,
			"developers" => $developers,
			"publisher" => $publisher,
			"publishers" => $publishers,
			"genres" => $genres
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {

		request()->validate([
			'title' => 'required',
			'description' => 'required',
			'developer' => 'required',
			'publisher' => 'required',
			'genre' => 'required',
			'releasedate' => 'required|date',
			'boxart' => 'image',
		]);
		
		//Set title of game
		$game->title = $request->title;
		
		//Set description of game
		$game->description = $request->description;
		
		//Set publisher of game
		$publisher = Publisher::where('title', $request->publisher)->get();
		$publisherid = $publisher[0]->id;
		$game->publisher_id = $publisherid;
		
		//Set release date of game
		$game->release_date = $request->releasedate;
		
		//Set boxart if there is one...
		if(request('boxart')){
			
			$filename = $request->title . '.jpg';
			
			$path = Storage::putFileAs(
				'public/game_boxart', $request->file('boxart'), $filename
			);
			
			$game->boxart = $filename;
		}
		
		$game->save();
		
		//Add in relationship to the right developer and genre
		$game->developer()->sync($request->developer);
		$game->genres()->sync($request->genre);
		
		return redirect("admin/games/" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
		
		return redirect("/admin/games");
    }
}
