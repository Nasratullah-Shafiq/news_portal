
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
                    <h1> <small> د یوزر مدیریت </small><i class = "fa fa-user"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Add-Users.php"> د یوزر جوړول <i class = "fa fa-user"></i>  </a></li>
                        <li ><a href="index.php"> کورپاڼه <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
                
            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-right" name ="searchUser" id ="searchUser" autocomplete="off" placeholder=" د یوزر لټول ">
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

                <table class="table table-stripped table-hover" style="text-direction: right;">
                    <thead>
                        <tr>
                            <th class = "text-right"> دیلیت </th>
                            <th class = "text-right"> اصلاح کول </th>
                            <th class = "text-right"> رول </th>
                            <th class = "text-right"> عملیه </th>
                            <th class = "text-right"> حالت </th>
                            <th class = "text-right"> جنسیت </th>
                            <th class = "text-right"> ایمیل آدرس </th>
                            <th class = "text-right"> یوزر نوم </th>
                            <th class = "text-right"> تصویر </th>
                            <th class = "text-right"> آی دی </th>
                        </tr>
                    </thead>
                <?php while($row = $AdminUser->fetch_array()){ ?>
                    <tr>

                        <td class="text-right"> <a onclick="return confirm('Are you sure you want to Delete User')" href="Delete/DeleteUser.php?del=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title=" یوزر دیلیت شی "> دیلیت <i class = "fa fa-times"></i> </a> </td>
                        <td class="text-right"> <a href="Edit-Users.php?edit=<?php echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title=" یوزر اصلاح شی ">  اصلاح <i class = "fa fa-pencil"></i> </a></td>
                        
                        <?php if($row['Role_ID']=='1'){ ?>
                        <td class="text-right"> <a onclick="return confirm('آیا غواړۍ را یوزر عمومی مدیر شی؟')" href="Enable/StandardUser.php?std=<?php echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="This is Administrator User. change to Standard?"> <i class = "fa fa-check-circle"></i> Administrator </a> </td>
                        <?php } else{?>
                        <td class="text-right"> <a onclick="return confirm('آیا غواړۍ را یوزر صلاحیتونه کم کړۍ؟')" href="Enable/AdministratorUser.php?admn=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="This is Standard User. change to Administrator?"> <i class = "fa fa-check-circle"></i> Standard </a> </td>
                        <?php }?>
                         

                        <?php if($row['Status']=='0'){ ?>
                        <td class="text-right"> <a onclick="return confirm('آیا غواړۍ دا یوزر فعال شی؟')" href="Enable/EnableUser.php?enbl=<?php echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="User is Disabled are you wanna enable?"> فعال <i class = "fa fa-check"></i>  </a> </td>
                        <?php } else{?>
                        <td class="text-right"> <a onclick="return confirm('آیا غواړۍ دا یوزر غیر فعال شی؟')" href="Enable/DisableUser.php?dsbl=<?php echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="User is enable are you wanna disabl?"> غیر فعال <i class = "fa fa-times"></i>  </a> </td>
                        <?php }?>

                        <?php if($row['Status']=='0'){ ?>
                        <td class="text-right" style = "color: #D05454;"> غیر فعال </td>
                        <?php } else{?>
                        <td class="text-right" style="color: black;"> فعال <i class="fa fa-circle" style="font-size: 10px; color: rgb(29,179,5);"></i> </td>
                        <?php }?>
                    
                        <td class="text-right"> 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.$row['Gender'].'</div>';
                                }
                                else{
                                    echo $row['Gender'];
                                }
                            ?>
                        </td>

                        <td class="text-right"> 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.$row['Email'].'</div>';
                                }
                                else{
                                    echo $row['Email'];
                                }
                            ?>
                        </td>

                        <td class="text-right"> 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.$row['Username'].'</div>';
                                }
                                else{
                                    echo $row['Username'];
                                }
                            ?>
                        </td>


                        <td class="text-right">
                            <?php 
                            $profile_img = $row['Image'];
                            echo "<img alt='' class='img-circle' width='30px;' height = '30px' src='../img/_ProfilePicture/$profile_img ' style = 'margin-top: -5px; margin-bottom: -5px;' />"; ?>
                        </td>

                        <td class="text-right"> 
                            <?php 
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This User has Locked">'.' <i class = "fa fa-lock"></i> '.$row['User_ID'].'</div>';
                                }
                                else{
                                    echo $row['User_ID'];
                                }
                            ?>
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
                        
                        
                        
                        <!-- <td> 
                            <?php// if($row['Status']==0){?>
                        </td> -->
                        

                        
                        <!-- <td> <a href = "Quiz-Result.php?id=<?php //echo $row['User_ID'];?>" style="color: #32C5D2;"> Quiz Result </a> </td>
                        <td> <a href="Edit-Users.php?edit=<?php //echo $row['User_ID'];?>" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="Edit User"> <i class = "fa fa-pencil"></i> Edit </a></td>
                        <td> <a onclick="return confirm('Are you sure you want to Delete User')" href="Delete/DeleteUser.php?del=<?php //echo $row['User_ID'];?>" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="Delete User"> <i class = "fa fa-times"></i> Delete </a> </td>
                     --></tr>
                
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