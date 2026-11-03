
<?php 

include('./_Partial Components/Header.php');

if(isset($_GET['del'])){
   $News_ID = $_GET['del'];
   $deleteNews = $exm->delNews($News_ID);
   if($deleteNews){
        $msg = "News has deleted Successfully";
   }
   else{
        $error = "News Not Deleted!";
   }
}

if(isset($_GET['pendg'])){
   $News_ID = $_GET['pendg'];
   $pendgNews = $usr->pendingNews($News_ID);
}

if(isset($_GET['pblsh'])){
   $News_ID = $_GET['pblsh'];
   $pblshNews = $usr->publishNews($News_ID);
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
                <h1 style = "color: #2C3E50"> <i class = "fa fa-list-alt"> </i> <small> View All News </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Create-News.php"> <i class = "fa fa-list-alt"></i> Create News </a></li>
                </ol>
            </div>
            <div class = "col-sm-9">

            </div>
            
            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name ="searchNews" id ="searchNews" autocomplete="off" placeholder="Search for Questions">
                            <span class="input-group-btn">
                                <button class="btn btn-green"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </form>
            </div>

            <div class = "col-sm-3 text-right">
                <form class=" "  method="POST">
                        <div class="form-group">
                            <label> Search News Here</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" name ="searchNews" id ="searchNews" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn green" type="button">Go!</button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </div>
                    </form>
            </div>
            <div class="col-md-12" id = "resultNews">
                 <?php 
                        if (isset($error)) {
                            echo "<span style = 'color: red;' class = 'pull-right'> $error </span>";
                        }
                        else if (isset($msg)) {
                            echo "<span style = 'color: green;' class = 'pull-right'> $msg </span>";
                        }
                    ?>
                  <form method = "POST" action = "QuizAnswer.php">
                    <?php 
                    $News = $exm->getNews();
                    if(!$News){
                        echo "<h2> No Question Table exists </h2>";
                    }
                    else{

                    if($News->num_rows>0){
                           
                    ?>

                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th> ID_No </th>
                            <th> Heading </th>
                            <th> Source </th>
                            <th> Date </th>
                            <th> Category </th>
                            <th> Visit</th>
                            <th> Status</th>
                            <th> Action </th>
                            <th> Edt </th>
                            <th> Dlt </th>
                        </tr>
                    </thead>
                <?php 
                $i=1;
                while($row = $News->fetch_array()){ ?>
                    <tr>
                        <td> 
                            <?php 
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This News is Locked">'.' <i class = "fa fa-lock"></i> '.$i.'</div>';
                                }
                                else{
                                    echo $i;
                                }
                            ?>
                        </td>
                        <td> 
                            <?php 
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This News is Locked">'.$row['Heading'].'</div>';
                                }
                                else{
                                    echo $row['Heading'];
                                }
                            ?>
                        </td>
                        <td> 
                            <?php 
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This News is Locked">'.$row['Source'].'</div>';
                                }
                                else{
                                    echo $row['Source'];
                                }
                            ?>
                        </td>
                        <td> 
                            <?php 
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This News is Locked">'.$row['Date'].'</div>';
                                }
                                else{
                                    echo $row['Date'];
                                }
                            ?>
                        </td>
                        <td> 
                            <?php 
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This News is Locked">'.$row['Category'].'</div>';
                                }
                                else{
                                    echo $row['Category'];
                                }
                            ?>
                        </td>
                        <td> 
                            <?php 
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This News is Locked">'.$row['Visits'].'</div>';
                                }
                                else{
                                    echo $row['Visits'];
                                }
                            ?>
                        </td>
                        <td> 
                            <?php 
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This News is Locked">'.$row['Status'].'</div>';
                                }
                                else{
                                    echo $row['Status'];
                                }
                            ?>
                        </td>                     
                        <?php if($row['Status']=="Pending"){ ?>
                        <td> <a onclick="return confirm('Are you sure you want to Publish This News')" href="?pblsh=<?php echo $row['News_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Publish this News?"> Publish </a> </td>
                        <?php } 
                        else{?>
                        <td> <a onclick="return confirm('Are you sure to change status to Pending')" href="?pendg=<?php echo $row['News_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Change Status to Pending?"> Pending </a> </td>
                        <?php 
                        }?>
                        <td> <a href="Edit-News.php?edit=<?php echo $row['News_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit News"> <i class = "fa fa-pencil"></i> </a></td>
                        <td> <a onclick="return confirm('are you sure you want to delete')" href="Delete/DeleteNews.php?del=<?php echo $row['News_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete News"> <i class = "fa fa-times"></i> </a> </td>
                    </tr>
                
                <?php $i++; }} 
                else{
                    echo "<h2> No News Available ! </h2> ";
                    echo "<br>";
                    }
                    }
                  
                    ?>
                    </table>
                    </form>
            <!-- END CONTENT BODY -->
            </div>
    <!-- END CONTENT -->
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