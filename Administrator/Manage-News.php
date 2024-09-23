
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
 foreach ($_GET as $key => $data) {
    $data2 = $_GET[$key] = base64_decode(urldecode($data));
    $News_ID = ((($data2*999999)/9999)/123456789);
  }

if (isset($_GET['pendg'])) {
  $data = $_GET['pendg'];

    $pendgNews = $usr->pendingNews($News_ID);
  }
else{
    //header('Location: index.php');
} 

if (isset($_GET['pblsh'])) {
  $data = $_GET['pblsh'];

    $pblshNews = $usr->publishNews($News_ID);
  }
else{
    //header('Location: index.php');
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
                  <form method = "POST" action = "">
                    <?php 
                    $News = $exm->getNews();
                    if(!$News){
                        echo "<h2> No News Table exists </h2>";
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
                while($row = $News->fetch_array()){ 
                    $ecrypt_1 = (($row['News_ID']*123456789*9999)/999999);
                    $Newslink = "View-News.php?N=".urlencode(base64_encode($ecrypt_1));
                    $pendglink = "?pendg=".urlencode(base64_encode($ecrypt_1));
                    $pblshlink = "?pblsh=".urlencode(base64_encode($ecrypt_1));
                    $Dltlink = "Delete/DeleteNews.php?del=".urlencode(base64_encode($ecrypt_1));
                    $edtlink = "Edit-News.php?edt=".urlencode(base64_encode($ecrypt_1));
                    ?>
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
                            <a href="<?php echo $Newslink?>">
                            <?php 
                            
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This News is Locked">'.$row['Heading'].'</div>';
                                }
                                else{
                                    echo $row['Heading'];
                                }
                            ?>
                            </a>
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
                        <td> <a onclick="return confirm('Are you sure you want to Publish This News')" href="<?php echo $pblshlink?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Publish this News?"> Publish </a> </td>
                        <?php } 
                        else{?>
                        <td> <a onclick="return confirm('Are you sure to change status to Pending')" href="<?php echo $pendglink?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Change Status to Pending?"> Pending </a> </td>
                        <?php 
                        }?>
                        <td> <a  href="<?php echo $edtlink?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit News"> <i class = "fa fa-pencil"></i> </a></td>
                        <td> <a onclick="return confirm('are you sure you want to delete')" href="<?php echo $Dltlink?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete News"> <i class = "fa fa-times"></i> </a> </td>
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