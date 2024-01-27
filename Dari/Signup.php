<?php
ob_start();
include('../_Partial Components/Conn.php');
// $filepath = realpath(dirname(__FILE__));
include('./_Partial Components/Database.php');
include('./_Partial Components/Format.php');

include('./_Partial Components/Users.php');

// spl_autoload_register(function($class){
// include_once "../_Partial Components/".$class.".php";
// });
?>

<!DOCTYPE html>
<html>

<head> 
   <meta name="viewport" content=" width=device-width, initial-scale=1" />
   <link href = "../CSS/signin-style.css" rel = "Stylesheet" type = "text/css"/>
   <link href ="../css/bootstrap.min.css" rel=" stylesheet" />
   
   <link href ="../css/bootstrap.css" rel=" stylesheet" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/bootstrap.js"></script>
   <script src="../js/jquery.js" type="text/javascript" ></script>
   <script src = "./js/OnlineQuiz.js"></script>

</head>
<body class = "body"> 

    <div class = "col-sm-3" id="signup-form">

        <div class = "font">
            <p class="p-signup text-right"> اکونت بسازید</p>
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
                mysqli_set_charset($con, 'UTF8');
                $chk_user = "select * from Users where Username = '$Username'";
                $chk_run_user = mysqli_query($con, $chk_user);

                $chk_email = "select * from Users where Email = '$Email'";
                $chk_run_email = mysqli_query($con, $chk_email);

                if(empty($Full_Name) or empty($Username) or empty($Password) or empty($Email) or empty($Gender) or empty($Phone_No) or empty($Image)){
                    $error = "تمام فورم خانه پوری شود";
                    
                }
                else if($Username != $Username_trim){
                    $error = "فاصله برای اسم یوزر استفاده نکنید";
                }
                else if(mysqli_num_rows($chk_run_user)>0){
                    $error = "حساب ";
                }
                else if(mysqli_num_rows($chk_run_email)>0){
                    $error_email = "ایمل از قبل موجود است";
                 }
                else{
                    $insert_query = "insert into Users(Full_Name, Username, Password, Email, Language, Gender, Phone_No, Image) values('$Full_Name', '$Username', '$Password', '$Email', 'Dari','$Gender', '$Phone_No', '$Image')";
                    if(mysqli_query($con, $insert_query)){
                        move_uploaded_file($Image_tmp, "../img/_ProfilePicture/$Image");
                        $msg = "اکونت موفقانه ساخته شد";

                    }
                    else{
                        $error = "یوزر درج نشد";
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
            <div class="form-group">
                <input type="text" class="form-control text-right" id="Full_Name" name = "Full_Name" placeholder=" اسم مکمل ">
            </div>
            <div class="form-group">
                <input type="text" class="form-control text-right" id="Username" name = "Username" placeholder=" اسم یوزر ">
            </div>
            <div class="form-group">
                <input type="password" class="form-control text-right" id="Password" name = "Password" placeholder=" پسورد ">
            </div>
            <div class="form-group">
                <input type="text" class="form-control text-right" id="Email" name = "Email" placeholder=" ایمیل آدرس ">
                <?php if (isset($error_email)) {
                        echo "<span style = 'color: orange;' class = 'pull-right'> $error_email </span>";
                    }?>
            </div>
            <div class="form-group">
                <select class = "form-control text-right" id = "gender-select" name = "Gender" value = "Select Gender" >
                    <option value = "مرد" id = "gender-select" > مرد </option>
                    <option value = "زن"> زن</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control text-right" id="Phone_No" name = "Phone_No" placeholder=" شماره تماس ">
            </div>
            <div class="form-group text-right">
                <label for = "image" class="text-right"> عکس پروفایل</label>
                <input type="file" id="image" name = "image">
            </div>
            <div class="row">
                <div class="col-sm-6">
                     <button type="submit" class="btn-signup-next"  name = "submit" id="bn-signup" > ساختن حساب </button>
                </div>
                <div class="col-sm-6">
                    <a href="sign in.php">
                        <button type="button" class="btn-signup-next" > ورود به سیستم </button>
                    </a>
                </div>
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

</body>
</html>
