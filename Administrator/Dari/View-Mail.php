
<?php 

include('./_Partial Components/Header.php');
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Users.php');
$usr = new Users();

?>
<?php 
$Teacher = $exm->getTeacher();

if(isset($_GET['id'])){
   $Contact_ID = $_GET['id'];
   $ContactByID = $exm->getContactUsByID($Contact_ID);
}
else{
    header('Location: ../sign in.php');
}

if(isset($_GET['id'])){
   $Contact_ID = $_GET['id'];
   $dsblSubject = $usr->approveMail($Contact_ID);
}
?>
    <div class="containe">
    	<div class="row" id="row">
            <!-- BEGIN SIDEBAR -->
            <div class="left-side-bar pull-right">
                
                 <?php include('./_Partial Components/Navigation.php');?>
    
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN DIV CONTENT -->
            <div class="right-side-bar">

            <div class="row">
            <div calss = "col-md-9">
                <h1> <i class = "fa fa-envelope"> </i> <small> View All Mails </small></h1><hr>
                <ol class="breadcrumb">
                    <li ><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="#"> <i class = "fa fa-envelope"></i> Mails </a></li>
                </ol>
            </div>
             <div class="col-md-9">
                    <?php 
                    $ContactByID = $exm->getContactUsByID($Contact_ID);
                    if(!$ContactByID){
                        echo "<h2> No Contacts exist! </h2>";
                    }
                    else{

                    if($ContactByID->num_rows>0){
                        $result = $ContactByID->fetch_assoc();
                    ?>
                <table class="table" style="padding-bottom: 300px;">
                    <tbody>
                        <tr>
                            <th class="col-md-3"> Full Name </th>
                            <td> <?php echo $result['Full_Name']; ?> </td>
                        </tr>
                        <tr>
                            <th> Email </th>
                            <td> <?php echo $result['Email']; ?> </td>
                        </tr>
                        <tr>
                            <th> Message </th>
                            <td> <?php echo $result['Message']; ?> </td>
                        </tr>
                    </tbody>
                    </table>
                    <?php } 
                else{
                    echo "<h2> No Contacts Available ! </h2> ";
                    echo "<br>";
                    }
                    }
                    ?>
                </div>
            </div> 
            	   	  
		</div>
        <!-- END OF DIV CONTENT -->
	</div>
    <!-- END OF DIV ROW -->
</div>
<!-- END OF DIV CONTAINE -->
<?php 
include('./_Partial Components/Footer.php');
?>