<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('username');
		
		return view("admin/users/list", [
			'users' => $users
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("admin/users/show", [
			'user' => $user
		]);
    }

    /**
     * Show the form for setting the user as admin.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit_admin(User $user)
    {
        return view("admin/users/edit_admin", [
			'user' => $user
		]);
    }

    /**
     * Update the admin status of a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_admin(Request $request, User $user)
    {
        request()->validate([
			'is_admin' => 'required'
		]);
		
		$user->type = $request->is_admin;
		$user->save();
		return redirect("/admin/users/" . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
