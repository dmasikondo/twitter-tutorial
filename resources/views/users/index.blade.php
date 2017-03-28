@extends('layouts.app')

@section('content')

	<div  class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<h2>{{$user->username}}</h2>
                @if(Auth::user()->isNot($user))
                	@if(Auth::user()->isFollowing($user))
                    	<a href="/users/{{$user->username}}/unfollow">Unfollow</a>
                    @else
                    	<a href="/users/{{$user->username}}/follow">Follow</a>
                    @endif
                @else
                	<h5>My Account created -- {{$user->created_at->diffForHumans()}}</h5>
                @endif
            </div>
        </div>
    </div>
@stop