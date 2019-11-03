<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	
	const ADMIN_TYPE = 'admin';
	const DEFAULT_TYPE = 'default';
	
	public function isAdmin()
	{
		return $this->type === self::ADMIN_TYPE;    
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	/* This is a useful function you can use to access
	 * different events like created, updated, and deleted.
	 * More info: https://laravel.com/docs/5.8/eloquent#events
	 */
	protected static function boot()
	{
		parent::boot();
		
		static::created(function($user) {
			$user->profile()->create([
				'description' => 'Welcome to my Game Releases profile.'
			]);
		});
	}
	
	/* Simple function to say the user has one profile. */
	public function profile()
	{
		return $this->hasOne(Profile::class);
	}
	
	public function comment()
	{
		return $this->hasMany(Comment::class);
	}
}
