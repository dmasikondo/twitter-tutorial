// JavaScript Document
new Vue({
	el: '#timeline',
	data: {
		post: '',
		posts: [],
		limit: 2,
		total: 0
	},
	methods:{ 
		postStatus: function(e){
			e.preventDefault();
			
			$.ajax({
				url: '/posts',
				type: 'POST',
				dataType: 'json',
				data: {
					'body': this.post
				}
			}).success(function(data){
				this.post ='';
				this.posts.unshift(data);
			}.bind(this));
		},
		getPosts: function(){
			$.ajax({
				url: '/posts',
				type: 'GET',
				dataType: 'json',
				data: {
					limit: this.limit
				}
			}).success(function(data){
				this.posts = data.posts;
				this.total = data.total;
			}.bind(this));
		},
		getMorePosts: function(e){
			e.preventDefault();
			this.limit = this.limit + this.limit;
			this.getPosts();
		},

	},
			ready: function(){
			this.getPosts();
			
				setInterval(function(){
					this.getPosts();					
				}.bind(this), 10000);
		}
});