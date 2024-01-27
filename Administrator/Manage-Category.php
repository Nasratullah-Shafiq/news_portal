
<?php 

include('./_Partial Components/Header.php');




?>    <div class="containe">
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
                <h1 style = "color: #2C3E50"> <i class = "fa fa-list"> </i> <small> View All Categories </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Add-Category.php"> <i class = "fa fa-list"></i> Add Category </a></li>
                </ol>
            </div>
            <div class = "col-sm-9">
            </div>
            <div class = "col-sm-3 text-right">
                <form class=" " method="POST">
                        <div class="form-group">
                            <label> Search Category Here</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id ="SearchCategory" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn green" type="button">Go!</button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </div>
                    </form>
            </div>
            <div class="col-md-12" id = "resultCategory">
                <!-- <form method = "POST" action = ""> -->
                    <?php 
                    $Category = $exm->getCategory();
                    if(!$Category){
                        echo "<h2> No Subjects Table exists </h2>";
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
                            <th> ID </th>
                            <th> Category </th>
                            <th> Edit </th>
                            <th> Delete </th>
                            
                        </tr>
                    </thead>
                <?php 
                $i=1;
                while($row = $Category->fetch_array()){ 
                    $ecrypt_1 = (($row['Category_ID']*123456789*9999)/999999);
                    $dltlink = "Delete/DeleteCategory.php?del=".urlencode(base64_encode($ecrypt_1));
                    $edtlink = "Edit-Category.php?edt=".urlencode(base64_encode($ecrypt_1));
                    ?>
                    <tr>
                        <td> 
                            <?php 
                                echo $i;
                            ?>
                        </td>
                        <td> <?php echo $row['Category'];?> </td>
                         
                        <td> <a href="<?php echo $edtlink?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Category"> <i class = "fa fa-pencil"></i> Edit</a></td>
                        <td> <a onclick="return confirm('are you sure you want to delete')" href="<?php echo $dltlink?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Category"> <i class = "fa fa-times"></i> Delete </a> </td>
                    </tr>
                
                <?php $i++; }} 
                else{
                    echo "<h2> No Category Available ! </h2> ";
                    echo "<br>";
                    }
                    }
                  
                    ?>
                    </table>
              <!-- </form>  -->
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