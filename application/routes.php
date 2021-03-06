<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Log::info(sprintf("%s %s %s Seg[%d]: %s %s %s",
    Request::method(),
    URI::full(),
    Request::ip(),
    Router::$segments,
    URI::segment(1, '-'),
    URI::segment(2, '-'),
    URI::segment(3, '-')
));

// start page
Route::get('/', 'sapoc@index');

// login/logout
Route::get('login', 'sapoc@login');
Route::post('login', 'sapoc@auth');
Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

// register
Route::get('verify', 'sapoc@verify');
Route::post('verify', 'sapoc@send_verification');

//Route::get('register', 'user@register');
Route::get('register', 'sapoc@register');
Route::post('register', 'sapoc@create_user');

// offers
Route::group(array('before' => 'auth'), function() {
    Route::get('user/bids', 'user@bids');
    Route::get('user/profile', 'user@profile');
    Route::post('user/profile', 'user@profile');
});

Route::get('offers/new_freight', 'offers@new_freight');
Route::get('offers/new_trans', 'offers@new_trans');
Route::post('offers/new_post', 'offers@new_post');

// search
Route::get('search/freight' , 'search@make2');
Route::post('search/freight', 'search@make');
Route::get('search/trans'   , 'search@make2');
Route::post('search/trans'  , 'search@make');

// livesearch
Route::get('ref/test', 'ref@test');
Route::post('ref/test', 'ref@test');
Route::get('ref/country', 'ref@country');
Route::get('ref/district', 'ref@district');
Route::get('ref/town', 'ref@town');

/*
Route::get('/', function()
{
	return View::make('home.index');
});
*/

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});