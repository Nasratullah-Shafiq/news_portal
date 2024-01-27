<?php
ob_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Database.php');
include_once($filepath.'./_Partial Components/Format.php');
include_once($filepath.'./_Partial Components/Exam.php');
$exm = new Exam();
include_once($filepath.'./_Partial Components/Users.php');
spl_autoload_register(function($class){
include_once "_Partial Components/".$class.".php";
});
// if(!isset($_SESSION['Email'])){
//     header('Location: sign in.php');
// }
?>
<?php 
session_start();
$Email = $_SESSION['Email'];
if(isset($_SESSION['Username']) && isset($_SESSION['Email'])){
    $Username = $_SESSION['Username'];
    $UsersByUsername = $exm->getUsersByUsername($Username);
    $row = $UsersByUsername->fetch_assoc();
}
else{
    header("location: sign in.php");
}
?>
<!DOCTYPE html>
<html>
<title> Reset Password </title>
<head>
    <meta name="viewport" content=" width=device-width, initial-scale=1" /> 
    <link rel = "Stylesheet" type = "text/css" href = "./CSS/signin-style.css"/>
    <link href ="./CSS/bootstrap.min.css" rel=" stylesheet" />
    <link href ="./CSS/bootstrap.css" rel=" stylesheet" />
    <link href="./CSS/font-awesome.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src = "./js/OnlineQuiz.js"></script>
</head>
<body class="body">
    <div class = "form-control" id="reset-form">

        <div class = "font">
        <p class="reset-signin"> Reset Your password</p>
        </div>
        <form method = "POST">
        <div class="form-group" >
                <input type="text" style = "display: none;" value = "<?php echo $row['User_ID']; ?>" id = "User_ID" class="form-control " name = "User_ID" placeholder="New Password">
            <div class="form-group" >
                <div class="input-group"style="padding-left: 10px;">
                    <span class = "input-group-addon" id = "span-signin"><i class='fa fa-lock'></i></span>
                    <input type="password" class="form-control " name = "Password" id = "Password" placeholder="New Password">
                </div>
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn-signup-next" name = "submit" id = "btn-update-password"> Update</button>    
                </div>
                <div class="col-sm-6">
                    <a href="sign in.php">
                    <button type="button" class="btn-signup-next" name = "" id="bn-signup" > Sign in </button>
                    </a>  
                </div>
            </div>
            <span id="span-valid" class="span-validation"></span> 
            </div>
        </form>
    </div>

<script src="./js/tests/vendor/jquery.min.js"></script>
<script src="./js/transition.js"></script>
<script src="./js/tooltip.js"></script>
<script src = "./js/OnlineQuiz.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>
</html>
