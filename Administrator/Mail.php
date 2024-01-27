
<?php 

include('./_Partial Components/Header.php');

$contact = $exm->getContactUs();
if(isset($_GET['del'])){
   $Contact_ID = $_GET['del'];
   $deleteContact = $exm->delContactUs($Contact_ID);
   if($deleteContact){
        $msg = "Mail has deleted Successfully";
        // header("Location: inbox.php");
   }
   else{
        $error = "Mail Not Deleted!";
   }
}


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
                <h1 style = "color: #2C3E50"> <i class = "fa fa-envelope"> </i> <small> View All Mails </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="#"> <i class = "fa fa-envelope"></i> Mails </a></li>
                </ol>
            </div>
            <div class = "col-sm-9">
            </div>
            <div class = "col-sm-3 text-right">
                <form class=" " action="index.php" method="POST">
                        <div class="form-group">
                            <label> Search Subject Here</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id ="Search_Subject" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn green" type="button">Go!</button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </div>
                    </form>
            </div>
             <div class="col-md-12">
                <form method = "POST" action = "">
                    <?php 
                    if(!$contact){
                        echo "<h2> No Subjects Table exists </h2>";
                    }
                    else{

                    if($contact->num_rows>0){
                           
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
                            <th> Email </th>
                            <th> Phone_No </th>
                            <th> Date </th>
                            <th> View Mail</th>
                            <th> Delete </th> 
                        </tr>
                    </thead>
                <?php while($row = $contact->fetch_array()){ ?>
                    <tr>
                        <td> <?php echo $row['User_ID'];?></td>
                        <td> <?php echo $row['Full_Name'];?> </td>
                        <td> <?php echo $row['Email'];?> </td>
                        <td> <?php echo $row['Phone_No'];?> </td>
                        <td> <?php echo $row['Date'];?> </td>
                        <td> <a href="view-mail.php?id=<?php echo $row['User_ID'];?>" style="color: #32C5D2;"> view Mail </a> </td>
                         <td> <a href="Mail.php?del=<?php echo $row['User_ID'];?>" style="color: #D05454;"> <i class = "fa fa-times"></i> Delete </a></td> 
                    </tr>
                
                <?php }} 
                else{
                    echo "<h2> No Subjects Available ! </h2> ";
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

<?php 
include('./_Partial Components/Footer.php');
?>