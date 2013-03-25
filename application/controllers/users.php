<?php

class Users_Controller extends Base_Controller {
	
	public $restful = true;

	public function __construct()
	{
		$this->filter('before','auth')->only(array('store_user'));
	}

	public function get_new_student ()
	{
		return View::make('users.students.new');
	}

	public function get_new($user)
	{
		if($user == 'alumni')
		{
			return View::make('users.alumni.new');
		}
		elseif($user == 'student')
		{
			return View::make('users.students.new');	
		}	
	}

	public function post_create($user)
	{
		$validation = User::validate(Input::all());

		if($user == 'alumni')
		{
			$user_type = 1;

			if($validation->passes())
			{
				$this->store_user($user_type);
				return Redirect::to_route('login')->with('message','<div class="alert alert-success">Thanks for registering!</div>');
			}
			else
			{
				return Redirect::to('register/alumni')->with_errors($validation)->with_input();
			}
		}
		elseif($user == 'student')
		{
			$user_type = 0;

			if($validation->passes())
			{
				$this->store_user($user_type);
				return Redirect::to_route('login')->with('message','<div class="alert alert-success">Thanks for registering!</div>');
			}
			else
			{
				return Redirect::to('register/student')->with_errors($validation)->with_input();
			}
		}
	}

	private function store_user($user_type)
	{	
		$pass = Hash::make(Input::get('password'));
		$graduated = Input::get('month') . ', ' . Input::get('year');

		User::create(array(
			'email' => Input::get('email'),
			'password' => $pass,
			'fName' => Input::get('fName'),
			'lName' => Input::get('lName'),
			'bio' => Input::get('bio'),
			'major' => Input::get('major'),
			'second_major' => Input::get('second_major'),
			'minor' => Input::get('minor'),
			'second_minor' => Input::get('second_minor'),
			'graduated' => $graduated,
			'alumni' => $user_type,
		));

		mkdir('public/uploads/' . $pass );
		mkdir('public/uploads/' . $pass . '/files' );
		mkdir('public/uploads/' . $pass . '/thumbnails' );

		return;
	}

	public function get_login()
	{
		return View::make('users.login');
	}

	public function post_login()
	{
		$user = array(
			'username' => Input::get('email'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($user)) 
		{
			return Redirect::to_route('home');
		} 
		else 
		{
			return Redirect::to_route('login')
				->with('message', '<div class="alert alert-error">Your username or password is incorrect, please try again.</div>');
		}
	}

	public function get_logout()
	{
		if(Auth::check())
		{
			Auth::logout();
			return Redirect::to_route('login')
				->with('message', '<div class="alert alert-warning">You are now logged out</div>');
		} 
		else
		{
			return Redirect::to_route('home');
		}
	}	
}

?>