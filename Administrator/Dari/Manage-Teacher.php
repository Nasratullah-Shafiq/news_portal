
<?php 

include('./_Partial Components/Header.php');

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
                    <h1> <small> مدیریت نمودن اساتید </small><i class = "fa fa-user"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Add-Teacher.php"> ثبت نمودن اساتید <i class = "fa fa-user"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-right" name ="searchTeacher" id ="searchTeacher" autocomplete="off" placeholder="جستجو نمودن اساتید ">
                            <span class="input-group-btn">
                                <button class="btn btn-green"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </form>
            </div>
            <div class="col-md-12" id = "resultTeacher">
                <form method = "POST" >
                    <?php 
                    $Teacher = $exm->getTeacher();
                    if(!$Teacher){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Teachers Found </div>';
                        echo "<br>";
                    }
                    else{

                    if($Teacher->num_rows>0){
                           
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
                            <th class = "text-right"> تغیر دادن </th>
                            <th class = "text-right"> اوقات کاری </th>
                            <th class = "text-right"> شماره تماس </th>
                            <th class = "text-right"> جنسیت </th>
                            <th class = "text-right"> ایمیل آدرس </th>
                            <th class = "text-right"> استاد </th>
                            <th class = "text-right"> آی دی </th>
                        </tr>
                    </thead>
                <?php while($row = $Teacher->fetch_array()){ ?>
                    <tr>
                        <td class = "text-right"> <a onclick="return confirm('are you sure you want to delete')" href="Delete/DeleteTeacher.php?del=<?php echo $row['Teacher_ID'];?>" style="color: #D05454;"> حذف <i class = "fa fa-times"></i>  </a> </td>
                        <td class = "text-right"> <a href="Edit-Teacher.php?edit=<?php echo $row['Teacher_ID'];?>" style="color: #32C5D2;"> تغیر دادن <i class = "fa fa-pencil"></i> </a></td>
                        <td class = "text-right"> <?php echo $row['Time'];?> </td>
                        <td class = "text-right"> <?php echo $row['Mobile_No'];?> </td>
                        <td class = "text-right"> <?php echo $row['Gender'];?> </td>
                        <td class = "text-right"> <?php echo $row['Email'];?> </td>
                        <td class = "text-right"> <?php echo $row['Teacher_Name'];?> </td>
                        <td class = "text-right"> <?php echo $row['Teacher_ID'];?></td>
                    </tr>
                
                <?php }} 
                else{
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Teachers Found </div>';
                    echo "<br>";
                    }
                    }
                  
                    ?>
                    </table>
                </form> 
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