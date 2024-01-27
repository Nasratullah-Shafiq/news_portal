
<?php 

include('./_Partial Components/Header.php');

?>
    <div class="containe">
    	<div class="row" id="row">
            <div class="left-side-bar">
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
            <div calss = "col-md-9">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-user"> </i> <small> Add Users </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="#"> <i class = "fa fa-user"></i> Users </a></li>
                </ol>
            </div>
            <div class="col-md-9">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" placeholder="Frist Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2"> Password </label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputEmail3" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2"> Email </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputPassword3" placeholder="Email">
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
                        <label for="inputPassword3" class="col-sm-2"> Phone No </label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputPassword3" placeholder="Address">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2"> City </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPassword3" placeholder="City">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="button-start-the-quiz" id = ""  style = "width: 200px;">Add Users</button>
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