<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Like_ID = $_POST['Like_ID'];
		
		$Likeremove = $usr->disLike($Like_ID);
	
	}
?>