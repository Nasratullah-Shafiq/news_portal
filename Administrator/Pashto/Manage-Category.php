
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
                    <h1> <small> کټګوری </small><i class = "fa fa-list"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Add-Category.php"> د کټګوری جوړول <i class = "fa fa-list"></i>  </a></li>
                        <li ><a href="index.php"> کورپاڼه <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-right" name ="searchCategory" id ="searchCategory" autocomplete="off" placeholder="د کټګورۍ لټول ">
                            <span class="input-group-btn">
                                <button class="btn btn-green"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </form>
            </div>
            <div class="col-md-12" id = "resultCategory">
                <form method = "POST">
                    <?php 
                        $Category = $exm->getCategory();
                    if(!$Category){
                        echo '<div class="alert alert-danger text-right" role="alert" style = "font-size: 16px;"> !د کټګورۍ هیڅ کومه پاڼه و نه موندل شوه </div>';
                    }
                    else{

                    if($Category->num_rows>0){
                           
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
                            <th class = "text-right"> پاکول </th>
                            <th class = "text-right"> ایډیټ </th>
                            <th class = "text-right"> کټګوری </th>
                            <th class = "text-right"> آی دی </th>
                        </tr>
                    </thead>
                <?php 
                    $i=1;
                    while($row = $Category->fetch_array()){ ?>
                        <tr class = "text-right">
                            <td  class = "text-right"> <a onclick="return confirm('شما مطمن هستید که انی مضمون را حذف میکنید')" href="Delete/DeleteCategory.php?del=<?php echo $row['Category_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title=" کټګوري دیلیت شي ">حذف <i class = "fa fa-times"></i>  </a> </td>
                            <td  class = "text-right"> <a href="Edit-Category.php?edit=<?php echo $row['Category_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title=" کټګوري اصلاح شي "> ایدیت <i class = "fa fa-pencil"></i> </a></td>
                            
                            <td class = "subject text-right"> <?php echo $row['Category']; ?>  </td>
                            
                            <td class = "text-right"><?php  echo $i; ?>  </td>
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