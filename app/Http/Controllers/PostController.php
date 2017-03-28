<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}	
    /**
     * Display a listing of the users posts resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Request $request)
    {
      $allPosts= $post->whereIn('user_id',
	  $request->user()->followers()->lists('users.id')->push($request->user()->id))->with('user');
	  $posts= $allPosts->orderBy('created_at','desc')
	  ->take($request->get('limit',5))
	  ->get();
	  return response()->json([
	  	'posts'=> $posts,
		'total'=> $allPosts->count(),
		
	  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
		$this->validate($request,[
			'body'=>'required|max:140'
		]);
       $createdPost = $request->user()->post()->create([
	   'body'=>$request->body,]);
	   return response()->json($post->with('user')->find($createdPost->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
