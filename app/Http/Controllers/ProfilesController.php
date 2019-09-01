<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function profile($u)
    {
		$user = User::find($u);
		
        return view('users.profile', [
			'user' => $user,
		]);
    }
	
	public function edit($u)
	{
		$user = User::find($u);
		
		return view('users.edit', [
			'user' => $user,
		]);
	}
	
	public function update($id)
	{
		//This is a nice method that you can use to validate forms...
		$data = request()->validate([
			'description' => 'required',
			'url' => 'url',
		]);
		
		$user = User::find($id);
		auth()->user()->profile->update($data);
		
		return redirect("/profile/{$user->id}");
	}
}
