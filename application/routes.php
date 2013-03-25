<?php

// Home Resource
////////////////	
Route::get('/', array('before' => 'auth', 'as' => 'home', 'uses' => 'home@index'));
Route::get('files', array('before' => 'auth', 'as' => 'files', 'uses' => 'home@files'));

// User Resource
////////////////
Route::get('users', array('as' => 'users', 'uses' => 'users@index'));
Route::get('users/(:any)', array('as' => 'user', 'uses' => 'users@show'));
Route::get('register/(:any)', array('as' => 'register', 'uses' => 'users@new'));
Route::get('logout', array('as' => 'logout', 'uses' => 'users@logout'));
Route::get('login', array('as'=> 'login', 'uses' => 'users@login'));
Route::get('users/(:any)/edit', array('as' => 'edit_user', 'uses' => 'users@edit'));
Route::post('register/(:any)', array('before' => 'csrf', 'uses' => 'users@create'));
Route::post('login', array('uses' => 'users@login'));
Route::put('users/(:any)', 'users@update');
Route::delete('users/(:any)', 'users@destroy');


//File Uploader
////////////////
Route::any('upload', function()
{
	$upload_handler = IoC::resolve('uploadhandler');

	header('Pragma: no-cache');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Content-Disposition: inline; filename="files.json"');
	header('X-Content-Type-Options: nosniff');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

	switch ($_SERVER['REQUEST_METHOD']) 
	{
	    case 'OPTIONS':
	        break;
	    case 'HEAD':
	    case 'GET':
	        $upload_handler->get();
	        break;
	    case 'POST':
	        if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
	            $upload_handler->delete();
	        } else {
	            $upload_handler->post();
	        }
	        break;
	    case 'DELETE':
	        $upload_handler->delete();
	        break;
	    default:
	        header('HTTP/1.1 405 Method Not Allowed');
	}
});

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
|		Route::get('/', array('before' => 'filter', function()
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