
<?php 

include('./_Partial Components/Header.php');
//include('./_Partial Components/Conn.php');

// $QuizResult = $exm->getQuizResult();
// $rows = $QuizResult->fetch_assoc();

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
                <div calss = "col-md-9" style = "text-align: right;">
                    <h1> <small> مدیریت نمودن یوزر ها </small><i class = "fa fa-user"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Add-Users.php"> ثبت نمودن یوزر <i class = "fa fa-user"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
                
            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-right" name ="searchUser" id ="searchUser" autocomplete="off" placeholder="جستجو نمودن یوزر ها">
                            <span class="input-group-btn">
                                <button class="btn green"><i class = "fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </form>
            </div>
               
            <div class="col-md-12" id = "resultUser">
                <form method = "POST" >
                    <?php 
                    $AdminUser = $exm->getAdminUsers();
                    if(!$AdminUser){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Users Available </div>';
                        echo "<br>";
                    }
                    else{

                    if($AdminUser->num_rows>0){
                           
                    ?>

                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th class = "text-right"> حذف </th>
                            <th class = "text-right"> تغیر دادن </th>
                            <th class = "text-right"> دیدن نتیجه </th>
                            <th class = "text-right"> رول </th>
                            <th class = "text-right"> عملیه </th>
                            <th class = "text-right"> حالت </th>
                            <th class = "text-right"> جنسیت </th>
                            <th class = "text-right"> ایمیل آدرس </th>
                            <th class = "text-right"> اسم یوزر </th>
                            <th class = "text-right"> عکس </th>
                            <th class = "text-right"> آی دی </th>
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
                        <td>
                            <?php 
                            $profile_img = $row['Image'];
                            echo "<img alt='' class='img-circle' width='30px;' height = '30px' src='../img/_ProfilePicture/$profile_img ' style = 'margin-top: -5px; margin-bottom: -5px;' />"; ?>
                        </td>
                        <!-- <td > 
                            <?php 
                                ///if($row['Status']==0){
                                  //  echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.$row['Full_Name'].'</div>';
                                //}
                               // else{
                             //       echo $row['Full_Name'];
                                //}
                            ?>
                        </td> -->
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
                        <!-- <td> 
                            <?php// if($row['Status']==0){?>
                        </td> -->
                        <?php if($row['Status']=='0'){ ?>
                        <td style = "color: #D05454;"> Disabled </td>
                        <?php } else{?>
                        <td style="color: black;"> <i class="fa fa-circle" style="font-size: 10px; color: rgb(29,179,5);"></i> Active </td>
                        <?php }?>

                        <?php if($row['Status']=='0'){ ?>
                        <td> <a onclick="return confirm('Are you sure you want to Enable the User')" href="Enable/EnableUser.php?enbl=<?php echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="User is Disabled are you wanna enable?"> <i class = "fa fa-check"></i> Enable </a> </td>
                        <?php } else{?>
                        <td> <a onclick="return confirm('Are you sure you want to disable he User')" href="Enable/DisableUser.php?dsbl=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="User is enable are you wanna disabl?"> <i class = "fa fa-times"></i> Disable </a> </td>
                        <?php }?>
                        <?php if($row['Role_ID']=='1'){ ?>
                        <td> <a onclick="return confirm('Are you sure you want change this User To Admin')" href="Enable/StandardUser.php?std=<?php echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="This is Administrator User. change to Standard?"> <i class = "fa fa-check-circle"></i> Administrator </a> </td>
                        <?php } else{?>
                        <td> <a onclick="return confirm('Are you sure you want change this User To Standard')" href="Enable/AdministratorUser.php?admn=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="This is Standard User. change to Administrator?"> <i class = "fa fa-check-circle"></i> Standard </a> </td>
                        <?php }?>
                        <td> <a href = "Quiz-Result.php?id=<?php echo $row['User_ID'];?>" style="color: #32C5D2;"> Quiz Result </a> </td>
                        <td> <a href="Edit-Users.php?edit=<?php echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="Edit User"> <i class = "fa fa-pencil"></i> Edit </a></td>
                        <td> <a onclick="return confirm('Are you sure you want to Delete User')" href="Delete/DeleteUser.php?del=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="Delete User"> <i class = "fa fa-times"></i> Delete </a> </td>
                    </tr>
                
                <?php }} 
                else{
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Users Available </div>';
                    echo "<br>";
                    }
                    }
                  
                    ?>
                    </table>
              </form> 
            <!-- END CONTENT BODY -->
            </div>
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