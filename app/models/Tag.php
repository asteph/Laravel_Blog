<?php 
	class Tag extends Eloquent
	{
		protected $table = 'tags';
		//allows many tags to be added at once
		//laravel protects against pivot assignments being made in a loop
		protected $fillable = array('name');
		public function posts()
		{
			return $this->belongsToMany('Post', 'post_tag');
		}
	}