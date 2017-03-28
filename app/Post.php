<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */	
    protected $fillable =['body'];
	
	protected $appends =['HumanCreatedAt'];
	
    /**
     * A Post belongs to a user.
     *
     * @
     */	
	 public function user()
	 {
		 return $this->belongsTo('App\User');
	 }
	 
//////Human readable posted at date/////////
	public function getHumanCreatedAtAttribute()
	{
		return $this->created_at->diffForHumans();
	}
}
