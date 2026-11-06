
<?php 
include('./_Partial Components/Header.php');
include('./_Partial Components/Conn.php');

?>
<?php 
            if(isset($_POST['submit'])){
                $Heading = mysqli_real_escape_string($con, $_POST['Heading']);
                $Body = mysqli_real_escape_string($con, $_POST['Body']);
                $Source = mysqli_real_escape_string($con, $_POST['Source']);
                $Category_ID = mysqli_real_escape_string($con, $_POST['Category_ID']);
                $File = $_FILES['File']['name'];
                $Image_tmp = $_FILES['File']['tmp_name'];

                // $chk_user = "select * from Users where Username = '$Username'";
                // $chk_run_user = mysqli_query($con, $chk_user);

                // $chk_email = "select * from Users where Email = '$Email'";
                // $chk_run_email = mysqli_query($con, $chk_email);

                if(empty($Heading) or empty($Body) or empty($Source) or empty($File) or empty($Category_ID)){
                    $error = "All fields required";
                    
                }
                /*else if($Username != $Username_trim){
                    $error = "Username Should not contain any spaces";
                }
                else if(mysqli_num_rows($chk_run_user)>0){
                    $error = "Username Already exist try new one";
                }
                else if(mysqli_num_rows($chk_run_email)>0){
                    $error_email = "Email Already exist try new one";
                 }*/
                else{
                    $insert_query = "insert into News(Heading, Body, Source, File, Language, Category_ID) values('$Heading', '$Body', '$Source', '$File', 'English', '$Category_ID')";
                    if(mysqli_query($con, $insert_query)){
                        move_uploaded_file($Image_tmp, "../img/$File");
                        $msg = "Registration Successfull";

                    }
                    else{
                        $error = "News Not Registred";
                    }
                }
            }
        ?>
<div class="container-fluid" style="margin-left: 0px; padding-left: 0px;">
    <div class="row" id="row">
            <div class="left-side-bar">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                 <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <div class="col-sm-9">
            
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
            <div calss = "right-side-bar">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-list-alt"> </i> <small> Add News </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Manage-News"> <i class = "fa fa-list-alt"></i> View News </a></li>
                </ol>
            </div>
            <div class="col-md-9">

                      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <label style="text-align: left;" class="col-sm-2 control-label"> Heading </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name = "Heading" id="" placeholder="Heading">
                        </div>
                      </div>
                      <div class="form-group">
                        <label style="text-align: left;" class="col-sm-2 control-label"> Body </label>
                        <div class="col-sm-10">
                          <textarea id="Body" col="30" rows="10" class="form-control" name="Body" ></textarea>
                        </div>
                      </div>
                        <div class="form-group">
                        <label style="text-align: left;" class="col-sm-2 control-label"> Source </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name = "Source" id="" placeholder="Sourse">
                        </div>
                      </div>
                     
                      
                      <div class="form-group">
                          <label for="Category" style="text-align: left;" class="col-sm-2 control-label"> Category </label>
                            <div class="col-sm-10">
                              <select name="Category_ID" id = "" class="form-control">
                              <?php $Category = $exm->getCategory();
                                  if(!$Category){
                                      echo "<option value=''> Subject table Not Exist! </option>";
                                    }
                                    else{
                                      if($Category->num_rows>0){
                                        while ($result = $Category->fetch_assoc()) { ?>
                                              
                                        <option value="<?php echo $result['Category_ID']; ?>"> <?php echo $result['Category']; ?> </option>
                                <?php }}
                                      else{
                                        echo "<option value=''> Category Table is empty </option>"; 
                                        }} ?>
                              </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="inputPassword3" style="text-align: left;" class="col-sm-2 control-label"> File </label>
                            <div class="col-sm-10">
                                <input type="file" name = "File" class="btn" id="File">
                            </div>
                        </div>  
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name = "submit" class="button-start-the-quiz" >Add News</button>
                          <span id="span-val" class="span-validation"></span> 
                        </div>

                      </div>
                      <div class="form-group col-sm-offset-2">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?php
                                if (isset($error)) {
                                    echo "<div class='alert alert-danger' role='alert' style = 'font-size: 16px;'> $error </div>";
                                }
                                else if (isset($msg)) {
                                    echo "<div class='alert alert-success' role='alert' style = 'font-size: 16px;'> $msg </div>";
                                }
                                ?>
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