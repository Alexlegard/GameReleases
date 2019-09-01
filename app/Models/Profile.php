<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];
	
    //We're going to try to make our profile have a description and a URL.
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
