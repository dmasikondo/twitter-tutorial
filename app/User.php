<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
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
     * A User has many Posts
     *
     * @
     */	
	 public function post()
	 {
		 return $this->hasMany('App\Post');
	 }
	 
///////model binding/////
	public function getRouteKeyName()
	{
		return 'username';
	}
	
////// this user is not the current user
	public function isNot(User $user)
	{
		return $this->id !==$user->id;
	}
////// this user is following the current user
	public function isFollowing(User $user)
	{
		return (bool) $this->following->where('id', $user->id)->count();
	}	
////// can this user be followed (only if not self and not already followed)////
	public function CanFollow(User $user)
	{
		if (!$this->isNot($user))
		{
			return false;
		}
		return !$this->isFollowing($user);
	}

//////////////unfollow a user (if following		
public function canUnFollow(User $user)
	{
		return $this->isFollowing($user);		
	}	
///////u user has many followers and following has many users
 
 	public function following()
	{
		return $this->belongsToMany('App\User', 'follows','user_id','follower_id');
	}
 	public function followers()
	{
		return $this->belongsToMany('App\User', 'follows','follower_id','user_id');
	}	
	
}
