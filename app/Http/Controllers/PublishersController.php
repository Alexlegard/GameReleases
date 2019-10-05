<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;
use Debugbar\Debugbar;
use Intervention\Image\Facades\Image;
use Storage;
use DB;

class PublishersController extends Controller
{
    /**
     * Display a listing of the publishers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$publishers = Publisher::all()->sortBy('title');
		
        return view("admin/publishers/list", [
			'publishers' => $publishers
		]);
    }

    /**
     * Show the form for creating a new publisher.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/publishers/create");
    }

    /**
     * Store a newly created publisher in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
			'title' => 'required',
			'description' => 'required',
			'logo' => 'image'
		]);
		
		//Create an instance of Publisher, and set the properties manually.
		$publisher = new Publisher;
		$publisher->title = $request->title;
		$publisher->description = $request->description;
		
		if(request('logo')){
			//dd("Inside if");
			$filename = $request->title . '.jpg';
			
			$path = Storage::putFileAs(
				'public/publisher_logos', $request->file('logo'), $filename
			);
			$publisher->logo = $filename;
		}
		
		$publisher->save();
		
		return redirect("/admin/publishers/" . $publisher->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        return view("admin/publishers/show", [
			"publisher" => $publisher
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view("admin/publishers/edit", [
			"publisher" => $publisher
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
		request()->validate([
			'title' => 'required',
			'description' => 'required',
			'logo' => 'image'
		]);
		
		$publisher->title = $request->title;
		$publisher->description = $request->description;
		
		if(request('logo')){
			$filename = $request->title . '.jpg';
			
			$path = Storage::putFileAs(
				'public/publisher_logos', $request->file('logo'), $filename
			);
			$publisher->logo = $filename;
		}
		
		$publisher->save();
		return redirect("/admin/publishers/" . $publisher->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
		
		return redirect("/admin/publishers");
    }
}
