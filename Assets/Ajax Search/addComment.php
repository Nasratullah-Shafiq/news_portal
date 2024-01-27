<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$News_ID = $_POST['News_ID'];
		$User_ID = $_POST['User_ID'];
		$Comment = $_POST['Comment'];
		
		$Commentdd = $usr->addComment($News_ID, $User_ID, $Comment);
	
	}
?>