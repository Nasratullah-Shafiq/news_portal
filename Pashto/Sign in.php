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
<!DOCTYPE html>
<title> Sign in </title>
<head>
    <meta http-equiv="content-type" content="text/html; charset = UTF8"/>
    <meta charset="utf-8"> 
	<meta name = "viewport" content = " width=device-width, initial-scale=1" />
   	<link href = "../CSS/signin-style.css" rel = "Stylesheet" type = "text/css"/>
  	<link href = "../CSS/bootstrap.min.css" rel = " stylesheet" type = "text/css"/>
    <link href = "../CSS/bootstrap.css" rel = " stylesheet" type = "text/css"/>
 	<link href = "../CSS/animated.css" rel = "stylesheet" type = "text/css">
	<link href = "../img/Graduation Cap_48px.png" rel = "icon" type="image/png">
  	<link href = "../CSS/font-awesome.css" rel = "stylesheet">

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
   
    <script src="../js/jquery.js" type="text/javascript" ></script>
    <script src= "./js/OnlineQuiz.js"></script>

</head>
<body class="body"> 
<script type="text/javascript">
  
  $('#Password').keyup(function(){
  var val=$(this).val();
  if(val.length>5){
  $('.message').html('Password must be at least 5 characters');

  }
  });
</script>
<div class = "form-control" id="signin-form">

<div class = "font">
<p class="p-signin" style="text-align: right;"> پاڼي ته ننوتل</p>
</div>

<form method = "POST" action = "" class="form-horizontal">

  <div class="form-group" >
	<div class="input-group " style="padding-left: 10px;">
		
      	<input type="text" class="form-control text-right" name = "Username" id = "Username"placeholder=" د یوزر نوم">
        <span class = "input-group-addon" id = "span-signin"><i class="fa fa-user" aria-hidden="true"></i></span>
    </div>
  </div>
  
  <div>
  	<div class="form-group" >
		<div class="input-group"style="padding-left: 10px;">
        <input type="password" class="form-control text-right" name = "Password" id = "Password" placeholder=" پسورد ">
		    <span class = "input-group-addon" id = "span-signin"><i class='fa fa-lock'></i></span>
    </div>
  </div>
  </div>

  <div class="form-group" style="padding-left: 10px;">
      <button type="submit" class="btn-signup-next" data-toggle="tooltip" id = "btn-signin" value = "Lgin here" data-placement="right" title="Insert Email & Password to Sign in">سایت ته ننوتل
	<i class='fa fa-user'></i>
	 </button>
  </div>


<div class="form-group text-right" style = "padding-left: 15px; margin-top: 10px;">
      <span class = "empty" style = "display: none; font-size: 18px;"> د یوزر نوم او پسورد غلط دی  </span>
      <span class = "incorrect" style = "display: none; color: red; font-size: 18px;"> ټول باید مکمل دک شی </span>
      <span class = "failed" style = "display: none; font-size: 18px;"> پسورد غلط دی صحیح پسورد ولیکی </span>
      <span class = "error" style = "display: none; font-size: 18px;"> د یوزر نوم او پسورد مطابقت نلری </span>
      <span class = "disable" style = "display: none; font-size: 18px;"> یوزر فقل است!</span>    
  </div>
  <div class = "message" style="background-color: red;"> </div>
</form>
<div class = "form_footer">
    <div class="row" style="float: right;">
        <div class="col-sm-4 text-right">
            <a href = "../sign in.php" class="language-signin-Dr"> English </a>

        </div>
        <div class="col-sm-4 text-right">
            <a href = "sign in.php" class="language-signin-Dr"> پښتو </a>
        </div>

        <div class="col-sm-4 text-right">
            <a href = "../Dari/sign in.php" class="language-signin-Dr"> دری </a>
        </div>
    </div>

<br><br>
<!-- <hr style = "width: 100%;"> -->
<label> <a href = "forgot-password.php" > خپل پسورد مو هیر شوی دی?</a> </label>

<a href = "signup.php" class="create-accountDr text-right"> حساب جو‌ړول </a>

</div>
</div>
<script src="../js/tests/vendor/jquery.min.js"></script>
<script src="../tests/vendor/jquery.min.js"></script>
<script src="../js/transition.js"></script>
<script src="../js/tooltip.js"></script>
<script src="../js/affix.js"></script>
<script src="../js/alert.js"></script>
<script src="../js/button.js"></script>
<script src="../js/carousel.js"></script>
<script src="../js/collapse.js"></script>
<script src="../js/dropdown.js"></script>
<script src="../js/modal.js"></script>
<script src="../js/scrollspy.js"></script>
<script src="../js/tab.js"></script>
<script src="../js/transition.js"></script>
<script src="./js/OnlineQuiz.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>
</html>
