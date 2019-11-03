<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Game;
use App\Developer;
use App\Publisher;
use App\Console;
use App\Genre;
use Illuminate\Http\Request;
use Debugbar\Debugbar;
use Intervention\Image\Facades\Image;
use Storage;
use DB;

class AdminController extends Controller
{
	public function admin(User $user)
    {

		$nogames = Game::count();
		$nodevelopers = Developer::count();
		$nopublishers = Publisher::count();
		$noconsoles = Console::count();
		$nogenres = Genre::count();
		
        return view('admin/admin', [
			"user" => auth()->user(),
			"nogames" => $nogames,
			"nodevelopers" => $nodevelopers,
			"nopublishers" => $nopublishers,
			"noconsoles" => $noconsoles,
			"nogenres" => $nogenres,
		]);
    }
	
    public function __construct()
    {
        $this->middleware('auth');
    }
	
}
