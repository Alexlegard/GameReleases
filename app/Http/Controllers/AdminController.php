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

class AdminController extends Controller
{
	public function admin(User $user)
    {
		//Auth()->user()->name
		
        return view('admin/admin')->with('user', Auth()->user());
    }
	
    public function __construct()
    {
        $this->middleware('auth');
    }
	
}
