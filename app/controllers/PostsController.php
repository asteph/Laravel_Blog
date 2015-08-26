<?php

class PostsController extends \BaseController {


	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// find more specific posts with queries and order them
			// $query = Post::with('user');
			// $query->where('title', '=', 'ENGINEER LEADING-EDGE MINDSHARE');
				//additional queries made just like above are treated as AND
				//if want to use an OR change clause to orWhere();
			// $posts = $query->orderBy('created_at')->paginate(5);
		// jump to another linked table
			// $query->whereHas('user', function($q){
			//	 $q->where('first_name', 'Alissa')
			// });
			// $query->orWhereHas('user', function($q){
			//	 $q->where('last_name', 'Stephens')
			// });
		// must end with paginate(), get(), or post()
		if(Input::has('search')){
			$query = Post::with('user');

			$query->whereHas('user', function($q){
				$search = Input::get('search');
				$q->where('title', 'like', "%$search%");
			});
			$posts = $query->paginate(4);
			return View::make('posts.index')->with(array('posts' => $posts));
		}elseif(Input::has('user')){
			$query = Post::with('user');

			$query->whereHas('user', function($q){
				$user = Input::get('user');
				$q->where('user_id', '=', "$user");
			});
			$posts = $query->paginate(4);
			return View::make('posts.index')->with(array('posts' => $posts));
		}else{
			$posts = Post::with('user')->paginate(4);
			return View::make('posts.index')->with(array('posts' => $posts));
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation
	    if ($validator->fails()) {
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        Session::flash('errorMessage', 'Your new post was not successfully created. See errors below:');
	        //log error to app/storage/logs/laravel.log
	        Log::info('Unsuccessful attempt to create blog post: ',Input::all());
	        return Redirect::back()->withInput()->withErrors($validator);
	    } else {
	        // validation succeeded, create and save the post
	        $post = new Post();
			$post->title = strtoupper(Input::get('title'));
			$post->body = Input::get('body');
			// change to use uploaded image path and save image in img folder
			$post->img_url = 'http://lorempixel.com/900/300/';
			$post->user_id = Auth::id();
			$post->save();
			Session::flash('successMessage', 'Your new post titled "' . $post->title . '" was successfully created.');
			return Redirect::action('PostsController@index');
	    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Post::find($id)){
			$post = Post::find($id);
			return View::make('posts.show')->with('post', $post);
		}else{
			App::abort(404);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		if(Auth::check() && Auth::user()->id == $post->user_id){
			return View::make('posts.edit')->with('post', $post);
		}else{
			Session::flash('errorMessage', 'Hey buddy, you can not edit or delete a post that is not yours.');
			return View::make('posts.show')->with('post', $post);
		} 
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation
	    if ($validator->fails()) {
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        Session::flash('errorMessage', 'The update was unsuccessful. See errors below:');
	        return Redirect::back()->withInput()->withErrors($validator);
	    } else {
			$post = Post::find($id);
			$post->title = strtoupper(Input::get('title'));
			$post->body = Input::get('body');
			//need to add in file upload and chance this
			$post->img_url = 'http://lorempixel.com/900/300/animals';
			$post->save();
			Session::flash('successMessage', 'Your post titled "' . $post->title . '" was successfully updated.');
			return Redirect::action('PostsController@show', array($id));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();
		Session::flash('successMessage', 'Your post titled "' . $post->title . '" was successfully deleted.');
		return Redirect::action('PostsController@index');
	}


}
