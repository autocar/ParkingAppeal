<?php

class Test_Controller extends Base_Controller {




	public function action_index()
	{
		echo "Hello! Welcome to the admin testing page!";
		echo "<br>";
		$cwid = Session::get('cwid');
		echo "Your CWID passed from the session is: ".$cwid;
	}

	public function action_welcome($name)
	{
		echo "Welcome to the site, {$name}.";
	}

	public function action_login()
	{
		echo "This is a login page! Woo hoo!";
	}

	public function get_stupid($name, $location)
	{
			echo "{$name} is a genius. He is from {$location}";
	}

}