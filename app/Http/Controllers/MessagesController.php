<?php

namespace App\Http\Controllers;

use App\Message;
use App\Genre;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all()->sortBy('name');
		
		return view("admin/messages/list", [
			'messages' => $messages
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contact");
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
			'name' => 'required',
			'message' => 'required'
		]);
		
		$message = new Message;
		$message->name = $request->name;
		$message->message = $request->message;
		$message->email = $request->email;
		$message->save();
		
		$genres = Genre::all()->sortBy('title');
		
		return view('welcome', [
			'genres' => $genres
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view("admin/messages/show", [
			'message' => $message
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
		
		return redirect('/admin/messages');
    }
}
