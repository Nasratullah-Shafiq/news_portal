<?php
ob_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Database.php');
include_once($filepath.'./_Partial Components/Format.php');

include_once($filepath.'./_Partial Components/Users.php');
spl_autoload_register(function($class){
include_once "_Partial Components/".$class.".php";
});
include('./_Partial Components/conn.php');
?>
<html>
<title> forgot Password </title>
<head>
   <meta name="viewport" content=" width=device-width, initial-scale=1" /> 
   <link rel = "Stylesheet" type = "text/css" href = "./CSS/signin-style.css"/>
   <link href ="./css/bootstrap.min.css" rel=" stylesheet" />
   <link href ="./css/bootstrap.css" rel=" stylesheet" />
   <link rel="stylesheet" href="css/font-awesome.css">
   <script src="./js/bootstrap.min.js"></script>
   <script src="./js/bootstrap.js"></script>
   <script src="./js/OnlineQuiz.js"></script> 

   <script src="./js/jquery.js" type="text/javascript" ></script>
   <script src = "./js/main.js"></script>

</head>
<body class="body"> 

<div class = "form-control" id="forgot-form">

<div class = "font">
<p class="p-forgot" > Insert your Email to reset your password </p>
</div>

<form method = "POST" action = "">
 <div class="form-group" >
	<div class="input-group " style="padding-left: 10px;">
		<span class = "input-group-addon" id = "span-signin"><i class="fa fa-user"></i></span>
      	<input  type="text" class="form-control " name = "Username" id = "Username"placeholder="Username">
    </div>
  </div>
  <div class="form-group" >
		<div class="input-group"style="padding-left: 10px;">
		<span class = "input-group-addon" id = "span-signin"><i class='fa fa-envelope'></i></span>
      	<input type="email" class="form-control " name = "Email" id = "Email" placeholder="Email">
    </div>
  </div>
	<div class="form-group" style="margin-bottom: 20px;">
		<div>
  		<div class="col-sm-6">
  			<button type="submit" class="btn-signup-next"  id="btn-forgot-pass"> Next </button>
  		</div>
  		<div class="col-sm-6">
			<a href="sign in.php">
  			<button type="button" class="btn-signup-next" id="btn-next-back"> back </button>
  			</a>  		
  		</div>
  		</div>  
	</div>
  	<div class="form-group">
  		<span class = "empty" style = "display: none;"> incorrect Username or Email Address </span>
   		<span class = "error" style = "display: none;"> Email and Username not matched </span>
  	</div>
</form>
    
</div>
<script src="./js/tests/vendor/jquery.min.js"></script>
<script src="./js/transition.js"></script>
<script src="./js/tooltip.js"></script>
<script src="./js/OnlineQuiz.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>
</html>
