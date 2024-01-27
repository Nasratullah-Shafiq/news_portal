
<?php include('./_Partial Components/Header.php');
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Users.php');
$usr = new Users();

?>
<?php 
$Teacher = $exm->getTeacher();

if(isset($_GET['edit'])){
   $Subject_ID = $_GET['edit'];
   $SubjectByID = $exm->getSubjectByID($Subject_ID);
}
else{
   header('Location: index.php');
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
                <h1 style = "color: #2C3E50"> <i class = "fa fa-book"> </i> <small> Edit Subject </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Manage-Subject.php"> <i class = "fa fa-book"></i> Manage Subject </a></li>
                </ol>
            </div>
                <div class="col-md-9">
		<!-- END CONTENT BODY -->
					
                    <?php 
						$SubjectByID = $exm->getSubjectByID($Subject_ID);
						$result = $SubjectByID->fetch_assoc();
					?>
					<form class="form-horizontal" action = "" method = "POST">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2">Subject_ID</label>
							<div class="col-sm-10">
							  <input type="text" value="<?php echo $result['Subject_ID']; ?>" class="form-control" id = "Subject_ID" name="Subject" placeholder="Subject">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2">Subject</label>
							<div class="col-sm-10">
							  <input type="text" value="<?php echo $result['Subject']; ?>" class="form-control" id = "Subject" name="Subject" placeholder="Subject">
							</div>
						</div>
						<div class="form-group">
						  <label for="input language" class="col-sm-2"> Language </label>
							<div class="col-sm-10">
							  <select name="Gender" class="form-control"  name = "Language" id = "Language">
								<option value="English" <?php if($result['Language']=='English'){echo "selected"; }?> > English </option>
								<option value="Dari" <?php if($result['Language']=='Dari'){echo "selected"; }?> >  Dari </option>
							  </select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2">Credit Hours</label>
							<div class="col-sm-10">
							  <input type="text" value="<?php echo $result['Credit_Hours']; ?>"class="form-control" id = "Credit_Hours" name="Credit_Hours" placeholder="Credit Hours">
							</div>
						</div>
						<div class="form-group">
						  <label for="input Teacher" class="col-sm-2 ">Teacher</label>
							<div class="col-sm-10">
							  <select name="Teacher ID" class="form-control" name = "Teacher_ID" id="Teacher">
							  <?php $Teacher = $exm->getTeacher();
								  if(!$Teacher){
									  echo "<option value=''> Teacher table Not Exist! </option>";
									}
									else{
									  if($Teacher->num_rows>0){
										while ($row = $Teacher->fetch_assoc()) { ?>
											  
										<option value="<?php echo $row['Teacher_ID']; ?>" 
										<?php 
										if($row['Teacher_Name']=='Nasratullah Shafiq'){echo "selected";} 
										 if($row['Teacher_Name']=='Fereshta Sama'){echo "selected";}
										?>> 
										<?php echo $row['Teacher_Name']; ?> </option>
								<?php }}
									  else{
										echo "<option value=''> Teacher Table is empty </option>"; 
										}} ?>
							  </select>
							</div>
						</div>
						<div class="form-group">
						  <label for="input Teacher" class="col-sm-2"> Faculty </label>
							<div class="col-sm-10">
							  <select name="Faculty" class="form-control" id="Faculty">
							  <?php $Faculty = $exm->getFaculty();
								  if(!$Faculty){
									  echo "<option value=''> Faculty table Not Exist! </option>";
									}
									else{
									  if($Faculty->num_rows>0){
										while ($rows = $Faculty->fetch_assoc()) { ?>
											  
										<option value="<?php echo $rows['Faculty_ID']; ?>" 
										<?php 
											if($rows['Faculty_ID']=='1'){echo "selected";}?>> <?php echo $rows['Faculty']; ?> </option>
								<?php }}
									  else{
										echo "<option value=''> Faculty Table is empty </option>"; 
										}} ?>
							  </select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2"> Time Allow </label>
							<div class="col-sm-10">
							  <input type="text" value="<?php echo $result['Time']; ?>" class="form-control" id = "Time" name="Time" placeholder="Time Should givin in Seconds">
							</div>
						</div>
						<div class="form-group">
						  <label for="input Status" class="col-sm-2"> Status </label>
							<div class="col-sm-10">
							  <select name="Gender" class="form-control"  name = "Status" id = "Status">
								<option value="1" <?php if($result['Status']=='1'){echo "selected"; }?> > Allow </option>
								<option value="0" <?php if($result['Status']=='0'){echo "selected"; }?> >  Deny </option>
							  </select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="button-start-the-quiz" name="submit" id = "btn-edit-subjects" style = "width: 200px;"> Update Subject</button>
								<span id="span-valid" class="span-validation"></span>
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