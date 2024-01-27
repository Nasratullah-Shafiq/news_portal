
<?php 
include('./_Partial Components/Header.php');

if(isset($_GET['edit'])){
   $Teacher_ID = $_GET['edit'];
   $TeacherByID = $exm->getTeacherByID($Teacher_ID);
}
else{
   header('Location: ../index.php');
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
            <div calss = "col-md-9">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-user"> </i> <small> Edit Teachers </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Manage-Teacher.php"> <i class = "fa fa-user"></i> Manage Teachers </a></li>
                </ol>
            </div>
            <div class="col-md-9">
          <?php 
            $TeacherByID = $exm->getTeacherByID($Teacher_ID);
            $result = $TeacherByID->fetch_assoc();
          ?>
          <form class="form-horizontal" method="POST" action="">
            <div class="form-group" style="display: none;">
              <label for="Teacher" class="col-sm-2">Teacher ID</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $result['Teacher_ID']; ?>" name = "Teacher_Name" class="form-control" id="Teacher_ID" placeholder="Teacher">
              </div>
            </div>
            <div class="form-group">
              <label for="Teacher" class="col-sm-2">Teacher</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $result['Teacher_Name']; ?>" name = "Teacher_Name" class="form-control" id="Teacher_Name" placeholder="Teacher">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2">Email</label>
              <div class="col-sm-10">
                <input type="email" value="<?php echo $result['Email']; ?>" name = "Email" class="form-control" id="Email" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="input language" class="col-sm-2"> Language </label>
              <div class="col-sm-10">
                <select name="Language" class="form-control"  name = "Language" id = "Language">
                <option value="English" <?php if($result['Language']=='English'){echo "selected"; }?> > English </option>
                <option value="Dari" <?php if($result['Language']=='Dari'){echo "selected"; }?> >  Dari </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="input Gender" class="col-sm-2"> Gender </label>
              <div class="col-sm-10">
                <select name="Gender" class="form-control"  name = "Gender" id = "Gender">
                <option value="Male" <?php if($result['Gender']=='Male'){echo "selected"; }?> > Male </option>
                <option value="Female" <?php if($result['Gender']=='Female'){echo "selected"; }?> >  Female </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="input Phone No" class="col-sm-2"> Phone No </label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $result['Mobile_No']; ?>"  name = "Mobile_No" class="form-control" id="Mobile_No" placeholder="Phone No">
              </div>
            </div>
            <div class="form-group">
              <label for="input Time" class="col-sm-2"> Time </label>
              <div class="col-sm-10">
                <select name="Time" class="form-control" name = "Time" id = "Time">
                <option value="Morning" <?php if($result['Time']=='Morning'){echo "selected"; }?> > Morning </option>
                <option value="Evining" <?php if($result['Time']=='Evining'){echo "selected"; }?>> Evining </option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="button-start-the-quiz" name = "submit" id = "btn-edit-teachers" style = "width: 200px;"> Update Teacher </button>
                <span id="span-valid" style = "padding-left: 3%;" class="span-validation"></span>  
              </div>
            </div>
          </form>
        </div>
    <!-- END QUICK SIDEBAR -->
</div> 
                	   	  
    		</div>
    	</div>
    </div>

<?php 
include('./_Partial Components/Footer.php');
?>