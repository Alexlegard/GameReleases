<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
	protected $guarded = [];
	
    public function game()
	{
		return $this->belongsToMany(Game::class);
	}
}
