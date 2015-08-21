<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showIndex');

Route::get('/resume', 'HomeController@showResume');

Route::get('/portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');

Route::get('/rolldice/{guess}', function($guess)
{
	$data = array('guess' => $guess);
	return View::make('roll-dice')->with($data);
});

Route::get('/sayhello/{name?}', function($name = null)
{
	if (ucfirst($name) == "Chris") {
        return Redirect::to('/');
    } else {
		return 'Hello ' . ucfirst($name);
	}
});

Route::get('/orm-test', function ()
{
	$i = mt_rand(1, 10);
    $post1 = new Post();
    $post1->title = strtoupper('Eloquent is awesome!');
    $post1->body  = 'It is super easy to create a new post.';
    $post1->img_url = "http://lorempixel.com/720/280/abstract/$i";
    $post1->save();

    $i++;
    $post2 = new Post();
    $post2->title = strtoupper('Post number two');
    $post2->body  = 'The body for post number two.';
    $post2->img_url = "http://lorempixel.com/720/280/abstract/$i";
    $post2->save();
});



