<?php
ob_start();
include('./Assets/_Partial Components/Conn.php');
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./Assets/_Partial Components/Database.php');
include_once($filepath.'./Assets/_Partial Components/Format.php');

include_once($filepath.'./Assets/_Partial Components/Users.php');

spl_autoload_register(function($class){
include_once "Assets/_Partial Components/".$class.".php";
});
?>

<!DOCTYPE html>
<html>

<head> 
   <meta name="viewport" content=" width=device-width, initial-scale=1" />
   <link rel = "Stylesheet" type = "text/css" href = "./Assets/CSS/signin-style.css" />
   <link rel = "Stylesheet" type = "text/css" href ="./Assets/css/bootstrap.min.css" />
   <link rel = "Stylesheet" type = "text/css" href ="./Assets/css/bootstrap.css" rel=" stylesheet" />

   <script src = "./Assets/js/bootstrap.min.js"></script>
   <script src = "./Assets/js/bootstrap.js"></script>
   <script src = "./Assets/js/jquery.js" type="text/javascript" ></script>
   <script src = "./Assets/js/NewsPortal.js"></script>

</head>
<body class = "body"> 

    <div class = "col-sm-3 box-signup" id="signup-form">

        <div class = "font">
            <p class="p-signin"> Sign up</p>
        </div>
        <?php 
                    if (isset($error)) {
                        echo "<span style = 'color: orange; font-size: 15px;' class = 'pull-right'> $error </span>";
                    }
                    else if (isset($msg)) {
                        echo "<span style = 'color: green;' class = 'pull-right'> $msg </span>";
                    }
                    
                ?> 
        <form action = "" method="POST" enctype="multipart/form-data">
            <div class="form-group inputBox">
                <input type="text" class="form-control" id="Full_Name" name = "Full_Name" placeholder="Full Name">
                
            </div>
            <div class="form-group inputBox">
                <input type="text" class="form-control" id="Username" name = "Username" placeholder="Username">
            </div>
            <div class="form-group inputBox">
                <input type="password" class="form-control" id="Password" name = "Password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="Email" name = "Email" placeholder="E-mail">
                <?php if (isset($error_email)) {
                        echo "<span style = 'color: orange;' class = 'pull-right'> $error_email </span>";
                    }?>
            </div>
            <div class="form-group">
                <select class = "form-control" id = "Gender" name = "Gender" value = "Select Gender" >
                    <option value = "Male" id = "gender-select" >Male</option>
                    <option value = "Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="Phone_No" name = "Phone_No" placeholder="Phone_No">
            </div>
            <div class="form-group">
                <label for = "image"> Profile Picture </label>
                <?php
                    $Image = $_FILES['image']['name'];
                    $Image_tmp = $_FILES['image']['tmp_name']; ?>
                <input type="file" id="image" name = "image">
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn-signup-next" id = "btn_signup" > Sign up </button>    
                </div>
                <div class="col-sm-6">
                    <a href="sign in.php">
                    <button type="button" class="btn-signup-next" name = "" id="bn-signu" > Sign in </button>
                    </a>  
                </div>
            </div>
            </div>      
            <div class="form-group">
                 <span id="span-valid" class="span-validation"></span>
            </div>
                
            <div class="form-group" style = "padding-top: 20px; font-size: 16px;">
                
            </div>
        </form>
    </div>
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
<script src="./Assets/js/OnlineQuiz.js"></script>
</body>
</html>
