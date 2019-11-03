<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Publisher;
use App\Game;
use Illuminate\Http\Request;
use Debugbar\Debugbar;
use Intervention\Image\Facades\Image;
use Storage;
use DB;

class ProfilesController extends Controller
{
    public function profile(User $user)
    {
		$games = Game::all();
		$games = game::orderBy('created_at', 'asc')
		->take(1)
		->get();
		
		//dd($user);
		
        return view('users.profile', [
			'user' => $user,
			'games' => $games,
		]);
    }
	
	public function edit(User $user)
	{
		
		/*Authorise the user before returning the view...*/
		
		$this->authorize('update', $user->profile);
		
		return view('users.edit', [
			'user' => $user,
		]);
	}
	
	public function update(Request $request, User $user)
	{	
		$filename = $user->id . '.jpg';
		
		//This is a nice method that you can use to validate forms...
		$data = request()->validate([
			'description' => 'required',
			'url' => 'url',
			'image' => 'image',
		]);
		
		/* If the request has an image, we're going to do something special. */
		if(request('image')) {
			
			$image = $request->file('image');
			$filename = $user->id . '.jpg';
			
			//Resize image to 300x300
			$image = Image::make($image);
			$image->resize(300, 300);
			
			$path = Storage::putFileAs(
				'public/profile_images', $request->file('image'), $filename
			);
		}
		
		/* Perform the update operation */
		auth()->user()->profile->update($data);
		
		if(request('image')) {
			$profile = auth()->user()->profile;
			$profile->image = $filename;
			$profile->save();
		}
		
		return redirect("/profile/{$user->id}");
	}
}
