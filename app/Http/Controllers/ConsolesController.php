<?php

namespace App\Http\Controllers;

use App\Console;
use Illuminate\Http\Request;
use Debugbar\Debugbar;
use Intervention\Image\Facades\Image;
use Storage;
use DB;

class ConsolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consoles = Console::all()->sortBy('title');
		
		return view("admin/consoles/list", [
			'consoles' => $consoles
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view("admin/consoles/create");
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
			'logo' => 'image',
		]);
		
		//Create an instance of Console, and set the properties manually.
		$console = new Console;
		$console->title = $request->title;
		
		if(request('logo')){
			$filename = $request->title . '.jpg';
			
			$path = Storage::putFileAs(
				'public/console_logos', $request->file('logo'), $filename
			);
			$console->logo = $filename;
		}
		
		$console->save();
		return redirect("/admin/consoles/" . $console->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function show(Console $console)
    {
        return view("admin/consoles/show", [
			"console" => $console
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function edit(Console $console)
    {
        return view("admin/consoles/edit", [
			"console" => $console
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Console $console)
    {
        request()->validate([
			'title' => 'required',
			'logo' => 'image',
		]);
		
		$console->title = $request->title;
		
		if(request('logo')){
			$filename = $request->title . '.jpg';
			
			$path = Storage::putFileAs(
				'public/console_logos', $request->file('logo'), $filename
			);
			$console->logo = $filename;
		}
		
		$console->save();
		return redirect("/admin/consoles/" . $console->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function destroy(Console $console)
    {
        $console->delete();
		
		return redirect("/admin/consoles");
    }
}
