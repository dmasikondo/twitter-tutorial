<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;


class UserController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */	
	public function __construct()
	{
		return $this->middleware('auth');
	}
    /**
     * Display the user specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */	
    public function index(User $user)
	{
		return view('users.index',compact('user'));
	}
    /**
     * Update the specified user follow resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function follow(User $user, Request $request)
	{
		if($request->user()->canFollow($user))
		{
			$request->user()->following()->attach($user);
		}
		
		return redirect()->back();
	}
    /**
     * Update the specified user unfollow resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */	
    public function unfollow(User $user, Request $request)
	{
		if($request->user()->canUnFollow($user))
		{
			$request->user()->following()->detach($user);
		}
		
		return redirect()->back();
	}	
    /**
     * Display the user specified followers resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */	
	 public function followedby(User $user, Request $request)
	 {
		 $followers = $request->user()->followers()->get();
		 	  return response()->json([
	  	'followers'=> $followers,
		
	  ]);
	 }
}
