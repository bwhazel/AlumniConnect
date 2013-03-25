<?php

class Home_Controller extends Base_Controller {

	public $restful = true;

	public function get_index(){
			return View::make('home.index');
	}

	public function get_files(){
			return View::make('users.file');
	}


}