<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Game;
use Illuminate\Http\Request;
use Carbon;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all()->sortBy('title');
		
		return view("admin/comments/list", [
			'comments' => $comments,
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Game $game)
    {
        //dd($game->id);
		//Auth()->user()->id
		//$request->comment
		
		request()->validate([
			'comment' => 'required',
		]);
		
		$comment = new Comment;
		$comment->content = $request->comment;
		$comment->user_id = Auth()->user()->id;
		$comment->game_id = $game->id;
		$time = Carbon\Carbon::now();
		$comment->time_submitted = $time;
		$comment->save();
		return redirect("games/" . Auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view("admin/comments/show", [
			'comment' => $comment
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
		$comment->user->strikes = $comment->user->strikes + 1;
		$comment->user->save();
		
        $comment->delete();
		
		return redirect("admin/comments");
    }
}
