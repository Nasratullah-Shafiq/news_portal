<?php
ob_start();
// $filepath = realpath(dirname(__FILE__));
include_once('./Assets/_Partial Components/Database.php');
include_once('./Assets/_Partial Components/Format.php');

include_once('./Assets/_Partial Components/Users.php');
spl_autoload_register(function($class){
include_once "Assets/_Partial Components/".$class.".php";
});

?>
<!DOCTYPE html>
<title> Sign in </title>
<head> 
  <meta name="viewport" content=" width=device-width, initial-scale=1" />
    <link rel = "Stylesheet" type = "text/css" href = "./Assets/CSS/signin-style.css"/>
    <link rel = "stylesheet" type = "text/css" href = "./Assets/CSS/bootstrap.min.css"/>
    <link rel = "stylesheet" type = "text/css" href = "./Assets/CSS/bootstrap.css"/>
    <link rel = "stylesheet" type = "text/css" href = "./Assets/CSS/animated.css">
    <link rel = "stylesheet" href="Assets/css/font-awesome.css">
    <link rel = "icon" type="image/png" href="img/Graduation Cap_48px.png">
    

   <script type="text/javascript" src="./Assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="./Assets/js/bootstrap.js"></script>
   
   <script type="text/javascript" src="./Assets/js/jquery.js"  ></script>
   <script type="text/javascript" src = "./Assets/js/NewsPortal.js"></script>

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
<div class = "form-control box" id="signin-form">

<div class = "font">
<p class="p-signin"> Sign in </p>
</div>

<form method = "POST" action = "" class="form-horizontal">

  <div class="form-group" >
  <div class="input-group inputBox" style="padding-left: 10px;">
    <span class = "input-group-addon" id = "span-signin"><i class="fa fa-user" aria-hidden="true"></i></span>
        <input  type="Email" class="form-control" name = "Email" id = "Email" required="">
        <label> Email </label>
    </div>
  </div>
  
    <div class="form-group" >
    <div class="input-group inputBox"style="padding-left: 10px;">
    <span class = "input-group-addon" id = "span-signin"><i class='fa fa-lock'></i></span>
        <input type="password" class="form-control" name = "Password" id = "Password" required="">
        <label> Password </label>
    </div>
  </div>

  <div class="form-group" style="padding-left: 10px;">
      <button type="submit" class="btn-signup-next" data-toggle="tooltip" id = "btn-signin" value = "Login here" data-placement="right" title="Insert Email & Password to Sign in">Sign in
  <i class='fa fa-user'></i>
   </button>
  </div>


<div class="form-group animated shake" style = "padding-left: 15px; margin-top: 10px;">
      <span class = "empty" style = "display: none;"> Wrong Username and Password </span>
      <span class = "incorrect" style = "display: none; color: red;"> Fields are empty! </span>
      <span class = "failed" style = "display: none;"> Password field empty! </span>
      <span class = "error" style = "display: none;"> Email and password not matched </span>
      <span class = "disable" style = "display: none;">User is Disable !</span>    
  </div>
  <div class = "message" style="background-color: red;"> </div>
</form>
<div class = "form_footer">
    <div class="row">
        <div class="col-sm-6">
            <p>Languge you sign with?</p>
        </div>
        <div class="col-xs-4 col-sm-2">
            <a href = "sign in.php" class="language-signin"> English </a>
        </div>
        
        <div class="col-xs-4 col-sm-2">
            <a href = "Pashto/sign in.php" class="language-signin"> پښتو </a>
        </div>

        <div class="col-xs-4 col-sm-2">
            <a href = "Dari/sign in.php" class="language-signin"> دری </a>
        </div>
    </div>
<!-- <hr style = "width: 100%;"> -->
<label> <a href = "forgot-password.php" > forgot Password?</a> </label> 
<p class="signin-footer"> Don't have account yet?</p>
<a href = "signup.php" class="create-account"> Create an acount? </a>

</div>
</div>
<script src="./Assets/js/tests/vendor/jquery.min.js"></script>
<script src="./Assets/tests/vendor/jquery.min.js"></script>
<script src="./Assets/js/transition.js"></script>
<script src="./Assets/js/tooltip.js"></script>
<script src="./Assets/js/affix.js"></script>
<script src="./Assets/js/alert.js"></script>
<script src="./Assets/js/button.js"></script>
<script src="./Assets/js/carousel.js"></script>
<script src="./Assets/js/collapse.js"></script>
<script src="./Assets/js/dropdown.js"></script>
<script src="./Assets/js/modal.js"></script>
<script src="./Assets/js/scrollspy.js"></script>
<script src="./Assets/js/tab.js"></script>
<script src="./Assets/js/transition.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>
</html>
