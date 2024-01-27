
<?php 
include('./_Partial Components/Header.php');

if(isset($_GET['edit'])){
   $Faculty_ID = $_GET['edit'];
   $FacultyByID = $exm->getFacultyByID($Faculty_ID);
}
else{
   header('Location: ../sign in.php');
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
                <div calss = "col-md-9 text-right" style = "text-align: right;">
                    <h1> <small> تغیر دادن پوهنځۍ </small><i class = "fa fa-home"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Manage-Faculty.php">  مدیریت پوهنځۍ ها  <i class = "fa fa-home"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            <div class="col-md-9 pull-right">
             <!-- END CONTENT BODY -->
                    
                    <?php 
                        $FacultyByID = $exm->getFacultyByID($Faculty_ID);
                        $result = $FacultyByID->fetch_assoc();
                    ?>
                    <form class="form-horizontal" method="POST" action="">
                        <div class="form-group" style="display: none;">
                            <label for="Faculty_ID" class="col-sm-2">Faculty_ID</label>
                            <div class="col-sm-10">
                              <input type="text" value="<?php echo $result['Faculty_ID']; ?>" name = "Faculty_ID" class="form-control" id="Faculty_ID" placeholder="Teacher">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Faculty" class="col-sm-2 text-right pull-right"> پوهنڅۍ </label>
                            <div class="col-sm-10">
                              <input type="text" value="<?php echo $result['Faculty']; ?>" name = "Faculty" class="form-control text-right" id="Faculty" placeholder=" پوهنڅۍ ">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="input language" class="col-sm-2 text-right pull-right"> زبان </label>
                            <div class="col-sm-10">
                              <select name="Language" class="form-control"  name = "Language" id = "Language">
                                <option value="English" <?php if($result['Language']=='English'){echo "selected"; }?> > انگلیسی </option>
                                <option value="Dari" <?php if($result['Language']=='Dari'){echo "selected"; }?> >  دری </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="button-start-the-quiz pull-right" name = "submit" id = "btn-edit-faculties" style = "width: 200px;"> تغیر شود </button>
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