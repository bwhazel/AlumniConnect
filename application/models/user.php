<?php

class User extends Basemodel {
	public static $rules = array(
		'email' => 'required|email|unique:users',
		'fName' => 'required',
		'lName' => 'required',
		'major' => 'required',
		'password' => 'required|between:6,12|confirmed',
		'password_confirmation' => 'required|between:6,12',
		'minor' => 'required',
		
	);
}