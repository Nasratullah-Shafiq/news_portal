<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Heading = $_POST['Heading'];
		$Body =  $_POST['Body'];
		$Source =  $_POST['Source'];
		$Category_ID =  $_POST['Category_ID'];
		
	
		
		$Newsdd = $usr->addNews($Heading, $Body, $Source, $Category_ID);
	
	}
?>