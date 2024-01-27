<?php
ob_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Database.php');
include_once($filepath.'./_Partial Components/Format.php');

include_once($filepath.'./_Partial Components/Users.php');
spl_autoload_register(function($class){
include_once "_Partial Components/".$class.".php";
});
?>
<html>
<title> forgot Password </title>
<head>
   <meta name="viewport" content=" width=device-width, initial-scale=1" /> 
   <link rel = "Stylesheet" type = "text/css" href = "../CSS/signin-style.css"/>
   <link href ="../CSS/bootstrap.min.css" rel=" stylesheet" />
   <link href ="../CSS/bootstrap.css" rel=" stylesheet" />
   <link href="../CSS/font-awesome.css" rel="stylesheet">
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/bootstrap.js"></script>

   <script src="../js/jquery.js" type="text/javascript" ></script>
   <script src = "./js/OnlineQuiz.js"></script>

</head>
<body class="body"> 

<div class = "form-control" id="forgot-form">

<div class = "font">
<p class="p-forgot text-right" > ایمیل و پسورد خود را بنویسید تا که اکونت خود را اصلاح کنید </p>
</div>

<form method = "POST" action = "">
 <div class="form-group" >
	<div class="input-group " style="padding-left: 10px;">
		  <input  type="text" class="form-control text-right" name = "Username" id = "Username"placeholder="  اسم یوزر">
      <span class = "input-group-addon" id = "span-signin"><i class="fa fa-user"></i></span>
    </div>
  </div>
  <div class="form-group" >
		<div class="input-group"style="padding-left: 10px;">
      	<input type="email" class="form-control text-right" name = "Email" id = "Email" placeholder="  ایمیل آدرس">
        <span class = "input-group-addon" id = "span-signin"><i class='fa fa-envelope'></i></span>
    </div>
  </div>
	<div class="form-group" style="margin-bottom: 20px;">
		<div>
  		<div class="col-sm-6">
            <a href="sign in.php">
            <button type="button" class="btn-signup-next" id="btn-next-back"> صفحه قبلی </button>
            </a> 
        </div>
  		<div class="col-sm-6">
            <button type="submit" class="btn-signup-next" style = "width: 100%;" id="btn-forgot-pass"> انجام شود </button>
  		</div>
  		</div>  
	</div>
  	<div class="form-group">
  		<span class = "empty" style = "display: none;"> ایمیل آدرس و اسم یوزر اشتباه است </span>
   		<span class = "error" style = "display: none;"> ایمیل و اسم یوزر مطابقت ندارد </span>
  	</div>
</form>
    
</div>
<script src="./js/tests/vendor/jquery.min.js"></script>
<script src="./js/transition.js"></script>
<script src="./js/tooltip.js"></script>
<script src="../js/OnlineQuiz.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>
</html>
