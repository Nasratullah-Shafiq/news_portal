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
            if(isset($_POST['submit'])){
                $Full_Name = mysqli_real_escape_string($con, $_POST['Full_Name']);
                $Username = mysqli_real_escape_string($con, $_POST['Username']);
                $Username_trim = preg_replace('/\s+/','', $Username);
                $Password = mysqli_real_escape_string($con,  md5($_POST['Password']));
                $Email = mysqli_real_escape_string($con, $_POST['Email']);
                $Gender = mysqli_real_escape_string($con, $_POST['Gender']);
                $Phone_No = mysqli_real_escape_string($con, $_POST['Phone_No']);
                $Image = $_FILES['image']['name'];
                $Image_tmp = $_FILES['image']['tmp_name'];

                $chk_user = "select * from Users where Username = '$Username'";
                $chk_run_user = mysqli_query($con, $chk_user);

                $chk_email = "select * from Users where Email = '$Email'";
                $chk_run_email = mysqli_query($con, $chk_email);

                if(empty($Full_Name) or empty($Username) or empty($Password) or empty($Email) or empty($Gender) or empty($Phone_No) or empty($Image)){
                    $error = "All fields required";
                    
                }
                else if($Username != $Username_trim){
                    $error = "Username Should not contain any spaces";
                }
                else if(mysqli_num_rows($chk_run_user)>0){
                    $error = "Username Already exist try new one";
                }
                else if(mysqli_num_rows($chk_run_email)>0){
                    $error_email = "Email Already exist try new one";
                 }
                else{
                    $insert_query = "insert into Users(Full_Name, Username, Password, Email, Language, Gender, Phone_No, Image, Role_ID, Status) values('$Full_Name', '$Username', '$Password', '$Email', 'English', '$Gender', '$Phone_No', '$Image', '2', '1')";
                    if(mysqli_query($con, $insert_query)){
                        move_uploaded_file($Image_tmp, "Assets/img/_Profile_Picture/$Image");
                        $msg = "Registration Successfull";

                    }
                    else{
                        $error = "User Not Registred";
                    }
                }
            }
        ?>      <?php 
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
                <input type="file" id="image" name = "image">
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn-signup-next" name = "submit" > Sign up </button>    
                </div>
                <div class="col-sm-6">
                    <a href="sign in.php">
                    <button type="button" class="btn-signup-next" name = "" id="bn-signup" > Sign in </button>
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
<script src="./tests/vendor/jquery.min.js"></script>
<script src="./js/transition.js"></script>
<script src="./js/tooltip.js"></script>
<script src="./js/affix.js"></script>
<script src="./js/alert.js"></script>
<script src="./js/button.js"></script>
<script src="./js/carousel.js"></script>
<script src="./js/collapse.js"></script>
<script src="./js/dropdown.js"></script>
<script src="./js/modal.js"></script>
<script src="./js/scrollspy.js"></script>
<script src="./js/tab.js"></script>
<script src="./js/transition.js"></script>
<script src="./js/OnlineQuiz.js"></script>
</body>
</html>
