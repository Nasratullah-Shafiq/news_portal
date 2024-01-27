
<?php 

include('./_Partial Components/Header.php');

if(isset($_GET['edit'])){
   $User_ID = $_GET['edit'];
   $UserByID = $exm->getUserByID($User_ID);
   //if($TeacherByID){
   //     $msg = "Subject has deleted Successfully";
   //}
   //else{
   //    $error = "Subject Not Deleted!";
   //}
}
else{
   header('Location: ../index.php');
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
                <h1 style = "color: #2C3E50"> <i class = "fa fa-book"> </i> <small> View All Subjects </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="#"> <i class = "fa fa-book"></i> Subjects </a></li>
                </ol>
            </div>
            <div class = "col-sm-9">
                      <h3> Here you can Manage Subjects </h3>
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
            <div class="col-md-9">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">First Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Frist Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">Last Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">Username</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2"> Password </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2"> Email </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPassword3" placeholder="Email">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2"> Address </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPassword3" placeholder="Address">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2"> City </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPassword3" placeholder="City">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2"> Gender </label>
                            <div class="col-sm-10">
                              <select name="Gender" class="form-control">
                                <option value="0"> Male </option>
                                <option value="1"> Femal </option>
                              </select>
                            </div>
                        </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success" style = "width: 200px;">Insert Users</button>
                            <span id="span-valid" class="span-validation"></span>  
                        </div>
                      </div>
                    </form>
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