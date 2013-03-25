<?php

class Work extends Basemodel {

	public static $rules = array(
		'company' => 'required',
		'city' => 'required'
	);

	public function user() 
	{
		return $this->belongs_to('User');
	}

	public static function get_user($email)
	{
		return static::where('email', '=', $email);
	}

	public static function your_work()
	{
		return static::where('user_id', '=' , Auth::user()->id)->paginate(5);
	}
}