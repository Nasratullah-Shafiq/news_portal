
<?php 

include('./_Partial Components/Header.php');

if(isset($_GET['del'])){
   $Facutly_ID = $_GET['del'];
   $deleteFaculty = $exm->delFaculty($Facutly_ID);
   if($deleteFaculty){
        $msg = "Faculty has deleted Successfully";
   }
   else{
        $error = "Faculty Not Deleted!";
   }
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
                <div calss = "col-md-9" style = "text-align: right;">
                    <h1> <small> پوهنڅۍ </small><i class = "fa fa-home"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Add-Faculty.php"> اضافه نمودن پوهنڅۍ <i class = "fa fa-home"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            <div class = "col-sm-9">
                     
            </div>
            <div class="col-md-12">
                <form method = "POST" action = "">
                    <?php 
                    $Faculty = $exm->getFaculty();
                    if(!$Faculty){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Faculty Found </div>';
                        echo "<br>";
                    }
                    else{

                    if($Faculty->num_rows>0){
                           
                    ?>
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th class = "text-right"> خذف </th>
                            <th class = "text-right"> تغیر دادن </th>
                            <th class = "text-right"> زبان </th>
                            <th class = "text-right"> پوهنڅۍ </th>
                            <th class = "text-right"> آی دی </th>
                        </tr>
                    </thead>
                <?php while($row = $Faculty->fetch_array()){ ?>
                    <tr>
                        <td class = "text-right"> <a onclick="return confirm('are you sure you want to delete Faculty')" href="Delete/DeleteFaculty.php?del=<?php echo $row['Faculty_ID'];?>" style="color: #D05454;"> حذف <i class = "fa fa-times"></i> </a> </td>
                        <td class = "text-right"> <a href="Edit-Faculty.php?edit=<?php echo $row['Faculty_ID'];?>" style="color: #32C5D2;"> تغیر دادن <i class = "fa fa-pencil"></i> </a></td>
                        <td class = "text-right"> <?php echo $row['Language'];?> </td>
                        <td class = "text-right"> <?php echo $row['Faculty'];?> </td>
                        <td class = "text-right"> <?php echo $row['Faculty_ID'];?></td>
                    </tr>
                
                <?php }} 
                else{
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Faculty Found </div>';
                    echo "<br>";
                    }
                    }
                  
                    ?>
                    </table>
              </form> 
            <!-- END CONTENT BODY -->
            </div>
    <!-- END QUICK SIDEBAR -->
</div> 
                	   	  
    		</div>
    	</div>
    </div>

<?php 
include('./_Partial Components/Footer.php');
?>