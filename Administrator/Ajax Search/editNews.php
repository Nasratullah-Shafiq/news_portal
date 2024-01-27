<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$News_ID = $_POST['News_ID'];
		$Heading = $_POST['Heading'];
		$Body = $_POST['Body'];
		$Source = $_POST['Source'];
		$Category_ID = $_POST['Category_ID'];
		
		
		$updtNews = $usr->updateNews($News_ID, $Heading, $Body, $Source, $Category_ID);
	
	}
?>