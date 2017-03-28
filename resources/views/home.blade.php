@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="timeline">
        <div class="col-md-4">
        	<h3>@{{post}}</h3>
           <form role="form" v-on:submit ="postStatus">
           <div class="form-group">
           		<textarea name="body" class="form-control" placeholder="What are you up to?" v-model="post"></textarea>
           </div>
           		<input type="submit" class="form-control" value="Post" v-show="post">
           </form>          
        </div>
        <div class="col-md-8">
        	<p v-if="!posts.length">No posts to view yet. Follow someone and make it happen.</p>
        	<div class="posts">                    	
            	<div class="media" v-for="post in posts" track-by="id" transition="expand">
                	<div class="media-left">
                    	<i class="fa fa-user media-object"></i>
                    </div>
                    <div class="media-body">
                    	<div class="user">
                           @<a href="/users/@{{post.user.username}}"><strong>@{{post.user.username}} </strong>-- @{{post.HumanCreatedAt}}</a>
                        </div>
                        <p>@{{post.body}}</p>
                    </div>
                </div>
            <a href="#" class="btn btn-default" v-if="total>posts.length" v-on:click="getMorePosts($event)">Show more posts</a>
            </div>
        </div>
    </div>
</div>
@endsection
