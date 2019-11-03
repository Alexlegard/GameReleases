<?php

namespace App\Http\Controllers;

use App\Developer;
use Illuminate\Http\Request;
use Debugbar\Debugbar;
use Intervention\Image\Facades\Image;
use Storage;
use DB;

class DevelopersController extends Controller
{
    /**
     * Display a listing of the developers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$developers = Developer::all()->sortBy('title');
		
        return view("admin/developers/list", [
			'developers' => $developers
		]);
    }

    /**
     * Show the form for creating a new developer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/developers/create");
    }

    /**
     * Store a newly created developer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		request()->validate([
			'title' => 'required',
			'description' => 'required',
			'logo' => 'image',
		]);
		
		//Create an instance of Developer, and set the properties manually.
		$developer = new Developer;
		$developer->title = $request->title;
		$developer->description = $request->description;
		
		if(request('logo')){
			$filename = $request->title . '.jpg';
			
			$path = Storage::putFileAs(
				'public/developer_logos', $request->file('logo'), $filename
			);
			$developer->logo = $filename;
		}
		
		$developer->save();
		return redirect("/admin/developers/" . $developer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function show(Developer $developer)
    {
        return view("admin/developers/show", [
			"developer" =>  $developer
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function edit(Developer $developer)
    {
        return view("admin/developers/edit", [
			"developer" => $developer
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Developer $developer)
    {
        request()->validate([
			'title' => 'required',
			'description' => 'required',
			'logo' => 'image',
		]);
		
		$developer->title = $request->title;
		$developer->description = $request->description;
		
		if(request('logo')){
			$filename = $request->title . '.jpg';
			
			$path = Storage::putFileAs(
				'public/developer_logos', $request->file('logo'), $filename
			);
			$developer->logo = $filename;
		}
		
		$developer->save();

		return redirect("/admin/developers/" . $developer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();
		
		return redirect("/admin/developers");
    }
}
