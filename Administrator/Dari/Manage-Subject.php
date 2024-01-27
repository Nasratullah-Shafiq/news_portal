
<?php 

include('./_Partial Components/Header.php');

?>    <div class="containe">
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
                    <h1> <small> مضامین </small><i class = "fa fa-book"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Add-Subject.php"> اضافه نمودن مضمون <i class = "fa fa-book"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-right" name ="searchSubject" id ="searchSubject" autocomplete="off" placeholder="جستجو مضامین ">
                            <span class="input-group-btn">
                                <button class="btn btn-green"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </form>
            </div>
            <div class="col-md-12" id = "resultSubject">
                <form method = "POST">
                    <?php 
                    $Subject = $exm->getSubject();
                    if(!$Subject){
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Subjects Found </div>';
                    }
                    else{

                    if($Subject->num_rows>0){
                           
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
                            <th class = "text-right"> حذف </th>
                            <th class = "text-right"> ایدیت </th>
                            <th class = "text-right"> عملیه </th>
                            <th class = "text-right"> حالت </th>
                            <th class = "text-right"> پوهنزی </th>
                            <th class = "text-right"> استاد </th>
                            <th class = "text-right"> وقت </th>
                            <th class = "text-right"> کریدیت </th>
                            <th class = "text-right"> مضمون </th>
                            <th class = "text-right"> آی دی </th>
                        </tr>
                    </thead>
                <?php 
                    $i=1;
                    while($row = $Subject->fetch_array()){ ?>
                        <tr class = "text-right">
                            <td  class = "text-right"> <a onclick="return confirm('شما مطمن هستید که انی مضمون را حذف میکنید')" href="Delete/DeleteSubject.php?del=<?php echo $row['Subject_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Subject">حذف <i class = "fa fa-times"></i>  </a> </td>
                            <td  class = "text-right"> <a href="Edit-Subject.php?edit=<?php echo $row['Subject_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Subject"> ایدیت <i class = "fa fa-pencil"></i> </a></td>
                            <?php if($row['Status']=='0'){ ?>
                                <td class = "text-right"> <a onclick="return confirm('آیا شما مطمن هستید که به این مضمون اجازه دهید')" href="Actions/EnableSubject.php?enbl=<?php echo $row['Subject_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Subject is Locked You wnat to Unlock?"> فعال <i class = "fa fa-check"></i>    </a> </td>
                            <?php } else{?>
                                <td  class = "text-right"> <a onclick="return confirm('آیا شما مطمن هستید که این مضمون را قفل نمایید')" href="Actions/DisableSubject.php?dsbl=<?php echo $row['Subject_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Subject is Unlock you want to Lock This?">غیر فعال <i class = "fa fa-lock"></i>   </a> </td>
                            <?php }?>
                            <?php if($row['Status']=='0'){ ?>
                                <td  class = "text-right" style = "color: #D05454;"> Lock </td>
                            <?php } else{?>
                                <td  class = "text-right" style="color: #32C5D2;"> Unlock </td>
                            <?php }?>
                            <!-- <td> <?php //echo $row['Teacher_Name'];?> </td> -->
                            <!-- <td> <?php //echo $row['Faculty'];?> </td> -->
                            <td class = "text-right">
                                <?php
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Subject is Locked">'.$row['Faculty'].'</div>';
                                }
                                else{
                                    echo $row['Faculty'];
                                }
                                ?>
                            </td>
                            <!-- <td> <?php //echo $row['Time'].' Sec';?> </td> -->
                            <td class = "text-right">
                                <?php
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Subject is locked">'.$row['Teacher_Name'].'</div>';
                                }
                                else{
                                    echo $row['Teacher_Name'];
                                }
                                ?>
                            </td>
                            <!-- <td> <?php //echo $row['Credit_Hours'];?> </td> -->
                            <td class = "text-right">
                                <?php
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Subject is Locked">'.$row['Time'].' دقیقه  '.'</div>';
                                }
                                else{
                                    echo $row['Time'].' دقیقه ';
                                }
                                ?>
                            </td>
                            <!-- <td> <?php //echo $row['Subject'];?> </td>  -->
                            <td class = "text-right">
                                <?php
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Subject is Locked">'.$row['Credit_Hours'].'</div>';
                                }
                                else{
                                    echo $row['Credit_Hours'];
                                }
                                ?>
                            </td>
                            <td class = "subject text-right">
                                <a href="View-Questions.php?sb=<?php echo $row['Subject']?>" data-toggle="tooltip" data-placement="top" title="View all Questions for this subject?"  style="color: black;">
                                    <?php
                                    if($row['Status']==0){
                                        echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Subject is Locked">'.$row['Subject'].'</div>';
                                    }
                                    else{
                                        echo $row['Subject'];
                                    }
                                    ?>
                                </a>
                            </td>
                            <td class = "text-right">
                                <?php
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Subject is Locked">'.$i.' <i class = "fa fa-lock"></i> '.'</div>';
                                }
                                else{
                                    echo $i;
                                }
                                ?>
                            </td>
                    </tr>
                
                <?php $i++; }} 
                else{
                    echo "<br>";
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Subjects Available ! </div>';
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