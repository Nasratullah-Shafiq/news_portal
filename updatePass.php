<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$User_ID= $_POST['User_ID'];
		$Password = $_POST['Password'];
		$userforgot = $usr->updatePass($Password, $User_ID);
	}
?>