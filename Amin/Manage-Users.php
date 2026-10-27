
<?php 

include('./_Partial Components/Header.php');

if(isset($_GET['del'])){
   $del_id = $_GET['del'];
   $deleteUser = $exm->delUsers($del_id);
   if($deleteUser){
        $msg = "User has deleted Successfully";
   }
   else{
        $error = "User Not Deleted!";
   }
}

if(isset($_GET['dsbl'])){
   $User_ID = $_GET['dsbl'];
   $dsblUser = $usr->disableUser($User_ID);
}

if(isset($_GET['enbl'])){
   $User_ID = $_GET['enbl'];
   $enblUser = $usr->enableUser($User_ID);
}

if(isset($_GET['admn'])){
   $User_ID = $_GET['admn'];
   $admnUser = $usr->adminUser($User_ID);
}

if(isset($_GET['std'])){
   $User_ID = $_GET['std'];
   $stdUser = $usr->standardUser($User_ID);
}
?>
    <div class="containe">
    	<div class="row" id="row">
            <div class="left-side-bar">
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
                    <li class = ""> <a href="#"> <i class = "fa fa-user"></i> Users </a></li>
                </ol>
            </div>
            <div class = "col-sm-9">
                      
            </div>
            <div class = "col-sm-3 text-right">
                <form class=" " action="index.php" method="POST">
                        <div class="form-group">
                            <label> Search Users Here</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id ="searchUser" placeholder="Search for Users...">
                                <span class="input-group-btn">
                                    <button class="btn green" type="button">Go!</button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </div>
                    </form>
            </div>
            <div class="col-md-12" id = "resultUsers">
                <form method = "POST" action = "">
                    <?php 
                    $AdminUser = $exm->getAdminUsers();
                    if(!$AdminUser){
                        echo "<h2> No Users Table exists </h2>";
                    }
                    else{

                    if($AdminUser->num_rows>0){
                           
                    ?>
                    <?php 
                        if (isset($error)) {
                            echo "<span style = 'color: red;' class = 'pull-right'> $error </span>";
                        }
                        else if (isset($msg)) {
                            echo "<span style = 'color: green;' class = 'pull-right'> $msg </span>";
                        }
                    ?>
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Full Name </th>
                            <th> Username </th>
                            <th> Email </th>
                            <th> Gender </th>
                            <th> Status </th>
                            <th> Role </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                <?php while($row = $AdminUser->fetch_array()){ ?>
                    <tr>
                        
                        <td> 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.' <i class = "fa fa-lock"></i> '.$row['User_ID'].'</div>';
                                }
                                else{
                                    echo $row['User_ID'];
                                }
                            ?>
                        </td>
                        <td > 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.$row['Full_Name'].'</div>';
                                }
                                else{
                                    echo $row['Full_Name'];
                                }
                            ?>
                        </td>
                        <td > 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.$row['Username'].'</div>';
                                }
                                else{
                                    echo $row['Username'];
                                }
                            ?>
                        </td>
                        <td > 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.$row['Email'].'</div>';
                                }
                                else{
                                    echo $row['Email'];
                                }
                            ?>
                        </td>
                        <td > 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.$row['Gender'].'</div>';
                                }
                                else{
                                    echo $row['Gender'];
                                }
                            ?>
                        </td>
                        <?php if($row['Status']=='0'){ ?>
                        <td> <a onclick="return confirm('Are you sure you want to Enable the User')" href="?enbl=<?php echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="User is Disabled are you wanna enable?"> <i class = "fa fa-check"></i> Enable </a> </td>
                        <?php } else{?>
                        <td> <a onclick="return confirm('Are you sure you want to disable he User')" href="?dsbl=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="User is enable are you wanna disabl?"> <i class = "fa fa-times"></i> Disable </a> </td>
                        <?php }?>
                        <?php if($row['Role_ID']=='1'){ ?>
                        <td> <a onclick="return confirm('Are you sure you want change this User To Admin')" href="?std=<?php echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="This is Administrator User. change to Standard?"> <i class = "fa fa-check-circle"></i> Administrator </a> </td>
                        <?php } else{?>
                        <td> <a onclick="return confirm('Are you sure you want change this User To Standard')" href="?admn=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="This is Standard User. change to Administrator?"> <i class = "fa fa-check-circle"></i> Standard </a> </td>
                        <?php }?>
                        <td> <a onclick="return confirm('Are you sure you want to Delete User')" href="Manage-Users.php?del=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="Delete User"> <i class = "fa fa-times"></i> Delete </a> </td>
                    </tr>
                
                <?php }} 
                else{
                    echo "<h2>  هیڅ کوم یوزر موجود ندی ! </h2> ";
                    echo "<br>";
                    }
                    }
                  
                    ?>
                    </table>
              </form> 
            <!-- END CONTENT BODY -->
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