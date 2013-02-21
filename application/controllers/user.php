<?php

class User_Controller extends Base_Controller {


	public $restful = true;

	public function get_index()
	{
		echo "Hello! Welcome to the user management page!";
	}

	public function get_login()
	{
		echo "Hello! Welcome to the login page!";
			echo Form::open('user/login', 'POST');
			echo Form::text('username');
			echo Form::submit('Click Me!');
			echo Form::close();
	}

	public function post_login()
	{
		echo "You posted to the login page!";
		echo "<br>";
		echo Input::get('username');
	}

	public function get_display($userID){
		echo "You are now viewing the profile of user ID: {$userID}";
	}


}