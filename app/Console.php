<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    public function game()
	{
		return $this->belongsToMany(Game::class);
	}
}
