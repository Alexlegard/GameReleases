<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Developer;
use App\Publisher;
use Illuminate\Http\Request;
use Storage;
use DB;
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
		
        return view("admin/games/create", [
			'developers' => $developers,
			'publishers' => $publishers,
			'genres' => $genres
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
		
		foreach($request->developer as $d){
			//We want to add Beenox, then Epic as developers.
			$developerid = Developer::where('title', $d)->get();
			$developerid = $developerid[0]->id;
			$game->developer()->toggle($gameid, $developerid);
		}
		
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
		
        return view("admin/games/show", [
			"game" => $game,
			"publisher" => $publisher,
		]);
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
        //
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
