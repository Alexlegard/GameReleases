<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];
	
	public function developer()
	{
		return $this->belongsToMany(Developer::class);
	}
	
	public function publisher()
	{
		return $this->hasOne(Publisher::class, 'id');
	}
	
	public function genre()
	{
		return $this->belongsToMany(Genre::class);
	}
}
