<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	protected $guarded = [];
	
    public function game()
	{
		return $this->belongsToMany(Game::class, 'id');
	}
}
