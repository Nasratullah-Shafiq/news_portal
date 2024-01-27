<?php
ob_start();
session_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/Database.php');
include_once($filepath.'/Format.php');
include_once($filepath.'/Method.php');
// include_once($filepath.'/Users.php');
spl_autoload_register(function($class){
include_once "_Partial Components/".$class.".php";
});
$db = new Database();
$fm = new Format();
// $usr = new Users();
$mtd = new Method();

// if(!isset($_SESSION['Username'])){
//     header('Location: sign in.php');
// }
?>
<!DOCTYPE html>
<html>
<head>
<title> پښتو </title>
	<meta charset="utf-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link href="../img/checklist.png" rel="icon" type="image/png" >
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">

	<link href="../CSS/font-awesome.css" rel="stylesheet" >
    <link href="../CSS/font-awesome.min.css" rel="stylesheet" >
    <link href="../CSS/animated.css" rel="stylesheet" >
	<link rel="stylesheet" type="text/css" href="CSS/News_Style.CSS">
	
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.js" type="text/javascript" ></script>
    <script src = "../js/OnlineQuiz.js"></script>
    <script src = "../js/TiOut.js"></script>
</head>
<body class="body">
	<div class="top-header">
	</div>
	<div class="news-header">
		<div class="container">
			<div class="news-title text-right" style="padding-right: -5px;"><h1> News|پښتو </h1></div>
		</div>
		<div class="news-content">
			<div class="container">
			<div class="col-md-10 text-right pull-right" style="padding-right: 5px;">
					
				<div class="navbar-collapse collapse">
						<?php
					if(isset($_GET['id'])){ ?>
					<a  href="index.php"> کورپاڼه </a>|

					<?php }else{ ?>
					  <a class = "active" href="index.php"> کورپاڼه </a>|
					 
					<?php }?>

					<?php
					    $allCategory = $mtd->getCategory();
					    if($allCategory->num_rows>0){
					        while($row = $allCategory->fetch_assoc()){
					            if(isset($_GET['id']) && $row['Category_ID']==$_GET['id']){
					                $SubjectID = $row['Category_ID'];
					                $subject = $row['Category'];
					                echo "<a class = 'active' href = 'News.php?id=".$SubjectID."'> $subject </a>";
					            }
					            else{
					                $SubjectID = $row['Category_ID'];
					                $subject = $row['Category'];
					                echo "<a  href = 'News.php?id=".$SubjectID."'> $subject </a>|";
					            }
					        }
					}
					    else{
					        echo "<center> <h3><p> No Subjects Yet </p></h3> </center>";
					    }

					?>
					</div>

					<!-- <a href = ""> کورپاڼه </a>|
					<a href = ""> افغانستان </a>|
					<a href = ""> نړۍ </a>|
					<a href = ""> لوبي </a>|
					<a href = ""> ټکنالوژي </a>|
					<a href = ""> ساینس </a>|
					<a href = ""> چاپیریال </a>|
					<a href = ""> روغتیا </a>|
					<a href = ""> سفر </a> -->
				</div>
				<div class="col-md-2" >
					<li class="dropdown dropdown-user">
                    <a href="javascrip:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username"> ژبه </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu text-right" id="drop-down-language">
                        <li class="text-right">
                            <a href="../index.php">
                              انگلیسی </a>
                        </li>
                        <li class="text-right">
                          <a href="Pashto/index.php">
                              پښتو  </a>
                        </li>
                        <li class="text-right">
                          <a href="Dari/index.php">
                              دری  </a>
                        </li>
                    </ul>
                </li>
			</div>
				
					
		</div>
	</div>
</div>