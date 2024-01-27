
<?php 

include('./_Partial Components/Header.php');
include('./_Partial Components/Conn.php');

?>
<?php 
            if(isset($_POST['submit'])){
                $Full_Name = mysqli_real_escape_string($con, $_POST['Full_Name']);
                $Username = mysqli_real_escape_string($con, $_POST['Username']);
                $Username_trim = preg_replace('/\s+/','', $Username);
                $Password = mysqli_real_escape_string($con,  md5($_POST['Password']));
                $Email = mysqli_real_escape_string($con, $_POST['Email']);
                $Gender = mysqli_real_escape_string($con, $_POST['Gender']);
                $Phone_No = mysqli_real_escape_string($con, $_POST['Phone_No']);
                $Role_ID = mysqli_real_escape_string($con, $_POST['Role_ID']);
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
                    $insert_query = "insert into Users(Full_Name, Username, Password, Email, Language, Gender, Phone_No, Image, Role_ID) values('$Full_Name', '$Username', '$Password', '$Email', 'English', '$Gender', '$Phone_No', '$Image', '$Role_ID')";
                    if(mysqli_query($con, $insert_query)){
                        move_uploaded_file($Image_tmp, "../img/_ProfilePicture/$Image");
                        $msg = "Registration Successfull";

                    }
                    else{
                        $error = "User Not Registred";
                    }
                }
            }
        ?>
    <div class="containe">
    	<div class="row" id="row">
            <div class="left-side-bar pull-right">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                 <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <div class="right-side-bar">
            
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
                <div calss = "col-md-9" style = "text-align: right;">
                    <h1> <small> درج نمودن یوزر </small><i class = "fa fa-user"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Manage-Users.php">   مدیریت یوزر ها  <i class = "fa fa-user"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            <?php 
                    if (isset($error)) {
                        echo "<span style = 'color: red; font-size: 15px;' class = 'pull-right'> $error </span>";
                    }
                    else if (isset($msg)) {
                        echo "<span style = 'color: green;' class = 'pull-right'> $msg </span>";
                    }
                    
                ?> 

            <div class="col-md-9 pull-right">
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Full Name " class="col-sm-2 text-right pull-right"> اسم مکمل </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="Full_Name" placeholder=" اسم مکمل ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Username" class="col-sm-2 text-right pull-right"> اسم یوزر</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="Username" placeholder=" اسم یوزر ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Password" class="col-sm-2 text-right pull-right"> پسورد </label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control text-right" name="Password" placeholder=" پسورد ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 text-right pull-right"> ایمیل </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control text-right" name="Email" placeholder=" ایمیل آدرس ">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="Language" class="col-sm-2 text-right pull-right"> زبان </label>
                            <div class="col-sm-10">
                              <select name="Language" class="form-control text-right">
                                <option value="English"> English </option>
                                <option value="Dari"> Dari </option>
                              </select>
                            </div>
                        </div>
                      <div class="form-group">
                          <label for="Gender" class="col-sm-2 text-right pull-right"> جنسیت </label>
                            <div class="col-sm-10">
                              <select name="Gender" class="form-control text-right">
                                <option value="Male"> Male </option>
                                <option value="Female"> Femal </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Phone No" class="col-sm-2 text-right pull-right"> شماره تماس </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-right" name="Phone_No" placeholder=" شماره تماس ">
                            </div>
                        </div>
                      <div class="form-group">
                          <label for="Role" class="col-sm-2 text-right pull-right"> رول </label>
                            <div class="col-sm-10 text-right">
                              <select name="Role_ID" class="form-control text-right">
                                <option value="2"> محصل </option>
                                <option value="1"> مدیر </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Profile Picture" class="col-sm-2 text-right pull-right"> عکس پروفایل </label>
                            <div class="col-sm-10 text-right pull-right">
                                <input type="file" id="image" name = "image">
                            </div>
                        </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" name = "submit" class="button-start-the-quiz pull-right" id = "create-user"> اجرا شود </button>
                            <span id="span-va" class="span-validation"></span>  
                        </div>
                      </div>
                    </form>
                </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    
    
    <!-- END QUICK SIDEBAR -->
</div> 
                	   	  
    		</div>
    	</div>
    </div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php 
include('./_Partial Components/Footer.php');
?>