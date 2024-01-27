
<?php 

include('./_Partial Components/Header.php');
include('../_Partial Components/Conn.php');

if(isset($_GET['edit'])){
  // $Users = $exm->getTeacher();
   $User_ID = $_GET['edit'];
   $UserByID = $exm->getUserByID($User_ID);
   //if($TeacherByID){
   //     $msg = "Subject has deleted Successfully";
   //}
   //else{
   //    $error = "Subject Not Deleted!";
   //}
}
else{
   header('Location: index.php');
}
$result = $UserByID->fetch_assoc(); 
?>
<?php 
            if(isset($_POST['submit'])){
                $Full_Name = mysqli_real_escape_string($con, $_POST['Full_Name']);
                $Username = mysqli_real_escape_string($con, $_POST['Username']);
                $Username_trim = preg_replace('/\s+/','', $Username);
                $Password = mysqli_real_escape_string($con,  md5($_POST['Password']));
                $Email = mysqli_real_escape_string($con, $_POST['Email']);
                $Language = mysqli_real_escape_string($con, $_POST['Language']);
                $Gender = mysqli_real_escape_string($con, $_POST['Gender']);
                $Phone_No = mysqli_real_escape_string($con, $_POST['Phone_No']);
                $Role_ID = mysqli_real_escape_string($con, $_POST['Role_ID']);
                $Image = $_FILES['image']['name'];
                $Image_tmp = $_FILES['image']['tmp_name'];

                if(empty($Full_Name) or empty($Username) or empty($Password) or empty($Email) or empty($Gender) or empty($Phone_No)){
                    $error = "All fields required";
                    
                }
                else if($Username != $Username_trim){
                    $error = "Username Should not contain any spaces";
                }
                else{
                    
                    $update_query = "UPDATE `Users` SET `Full_Name` = '$Full_Name', `Username` = '$Username', `Password` = '$Password', `Email` = '$Email', `Language` = '$Language', `Gender` = '$Gender', `Phone_No` = '$Phone_No', `Image` = '$Image', `Role_ID` = '2' WHERE `Users`.`User_ID` = '$User_ID'";
                    
                    if(mysqli_query($con, $update_query)){
                        move_uploaded_file($Image_tmp, "./../img/_ProfilePicture/$Image");
                        $msg = "Updation Successfull";

                    }
                    else{
                        $error = "User Not Updated";
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
    <div class="containe">
    	<div class="row" id="row">
            <div class="left-side-bar pull-right">
                <!-- BEGIN SIDEBAR -->
                <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <div class="right-side-bar">
            
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
            <div calss = "col-md-9">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-user"> </i> <small> View All Users </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Manage-Users.php"> <i class = "fa fa-user"></i> Manage Users </a></li>
                </ol>
            </div>
            
            <div class="col-md-9">
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Full Name" class="col-sm-2">Full Name</label>
                        <div class="col-sm-10">
                          <input type="text"  value = "<?php echo $result['Full_Name']?>" class="form-control" name="Full_Name" placeholder="Frist Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Username" class="col-sm-2">Username</label>
                        <div class="col-sm-10">
                          <input type="text"  value = "<?php echo $result['Username']?>" class="form-control" name="Username" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Password" class="col-sm-2"> Password </label>
                        <div class="col-sm-10">
                          <input type="text"  value = "<?php echo $result['Password'] ?>" class="form-control" name="Password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Email" class="col-sm-2"> Email </label>
                        <div class="col-sm-10">
                          <input type="email"  value = "<?php echo $result['Email']?>" class="form-control" name="Email" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="input language" class="col-sm-2"> Language </label>
                        <div class="col-sm-10">
                          <select name="Language" class="form-control" id = "Language">
                          <option value="English" <?php if($result['Language']=='English'){echo "selected"; }?> > English </option>
                          <option value="Dari" <?php if($result['Language']=='Dari'){echo "selected"; }?> >  Dari </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="input Gender" class="col-sm-2"> Gender </label>
                        <div class="col-sm-10">
                          <select name="Gender" class="form-control" id = "Gender">
                          <option value="Male" <?php if($result['Gender']=='Male'){echo "selected"; }?> > Male </option>
                          <option value="Female" <?php if($result['Gender']=='Female'){echo "selected"; }?> >  Female </option>
                          </select>
                        </div>
                      </div>
                        <div class="form-group">
                            <label for="Phone No" class="col-sm-2"> Phone No </label>
                            <div class="col-sm-10">
                                <input type="text" name = "Phone_No"  value = "<?php echo $result['Phone_No']?>" class="form-control" placeholder="Phone No">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="Role_ID" class="col-sm-2"> Role </label>
                          <div class="col-sm-10">
                            <select name="Role_ID" class="form-control">
                            <option value="2" <?php if($result['Role_ID']=='2'){echo "selected"; }?> > Standard </option>
                            <option value="1" <?php if($result['Role_ID']=='1'){echo "selected"; }?> >  Administrator </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="Profile Picture" class="col-sm-2"> Profile Picture </label>
                            <div class="col-sm-10">
                                <input type="file" id="image" name = "image">
                            </div>
                        </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name = "submit" class="button-start-the-quiz" id = "">Update User</button>
                            <span id="span-va" class="span-validation"></span>  
                        </div>
                      </div>
                    </form>
                </div>
                <div class="col-md-3">
                  <?php 
                  $chk_img = $result ['Image'];
                   echo "<img src='../img/_ProfilePicture/$chk_img' alt='' class='img-cicle' width='250px' height='230px'/>";?>
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