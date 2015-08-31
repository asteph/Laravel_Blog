<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showIndex()
	{
		$posts = Post::paginate(4);
		return View::make('posts.index')->with(['posts'=>$posts]);
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showSimpleSimon()
	{
		return View::make('simplesimon');
	}

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
		    return Redirect::intended('/');
		} else {
		    // login failed, go back to the login screen
		    // 1. Display a session flash error
			Session::flash('errorMessage', 'Incorrect email or password. Please try again.');
		    // 2. Log email that tried to authenticate
		    return Redirect::action('HomeController@showLogin');
		}
	}

	public function showUserCreate()
	{
		return View::make('userCreate');
	}

	public function userCreate()
	{
		// create the validator
	    $validator = Validator::make(Input::all(), User::$rules);

	    // attempt validation
	    if ($validator->fails()) {
	        // validation failed, redirect to the user create page with validation errors and old inputs
	        Session::flash('errorMessage', 'New User was not succesfully created, see errors below:');
	        //log error to app/storage/logs/laravel.log
	        Log::info('Unsuccessful attempt create new user: ',Input::all());
	        return Redirect::back()->withInput()->withErrors($validator);
	    } else {
	    	if(Input::get('password') == Input::get('confirm_password')){
		        // validation succeeded and passwords same, create new user
		        $user = new User();
				$user->first_name = Input::get('first_name');
				$user->last_name = Input::get('last_name');
				$user->email = Input::get('email');
				$user->password = Input::get('password');
				$user->save();
				Session::flash('successMessage', 'Welcome ' . $user->first_name . '!');
				Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')));
				return Redirect::action('PostsController@index');
			}else{
				Session::flash('errorMessage', 'Passwords did not match.');
				return Redirect::back()->withInput();
			}
	    }

	}


	public function doLogout()
	{
		Auth::logout();
		Session::flash('errorMessage', 'Incorrect email or password. Please try again.');
		return Redirect::to('/');
	}


}
