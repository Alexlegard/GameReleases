<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
	protected $guarded = [];
	
    public function game()
	{
		return $this->belongsTo(Game::class);
	}
}
