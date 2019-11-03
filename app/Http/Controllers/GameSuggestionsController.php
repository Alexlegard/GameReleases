<?php

namespace App\Http\Controllers;

use App\GameSuggestion;
use App\Console;
use App\Genre;
use Illuminate\Http\Request;

class GameSuggestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$suggestions = GameSuggestion::all()->sortBy('title');
		
        return view("admin/suggestions/list", [
			'suggestions' => $suggestions
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consoles = Console::all();
		
		return view("suggestgame", [
			"consoles" => $consoles
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
		
		
        request()->validate([
			'title' => 'required',
			'developer' => 'required',
			'mathanswer' => 'min:5|max:5'
		]);
		
		$gamesuggestion = new GameSuggestion;
		$gamesuggestion->title = $request->title;
		$gamesuggestion->releasedate = $request->releasedate;
		$gamesuggestion->developer = $request->developer;
		$gamesuggestion->publisher = $request->publisher;
		$gamesuggestion->save();
		
		$genres = Genre::all()->sortBy('title');
		
		return view('welcome', [
			'genres' => $genres
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GameSuggestion  $gameSuggestion
     * @return \Illuminate\Http\Response
     */
    public function show(GameSuggestion $gameSuggestion)
    {
        return view('admin/suggestions/show', [
			'suggestion' => $gameSuggestion
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameSuggestion  $gameSuggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameSuggestion $gameSuggestion)
    {
        $gameSuggestion->delete();
		
		return redirect('/admin/suggestions');
    }
}
