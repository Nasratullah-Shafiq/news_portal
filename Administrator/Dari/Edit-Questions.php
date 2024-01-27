
<?php 

include('./_Partial Components/Header.php');

?>
<?php $Subject = $exm->getSubject();

if(isset($_GET['edit'])){
   $Question_ID = $_GET['edit'];
   
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
            
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
            <div calss = "col-md-9">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-question"> </i> <small> Edit Questions </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Manage-Questions.php"> <i class = "fa fa-question"></i> Manage Questions </a></li>
                </ol>
            </div>
            <div class="col-md-9">
    <!-- END CONTENT BODY -->

          <?php 
          if(isset($_GET['edit'])){
             $Question_ID = $_GET['edit'];
             $QuestionByID = $exm->getQuestionByID($Question_ID);
             }
             ?>
             
          <?php 
                        if (isset($error)) {
                            echo "<span style = 'color: red;' class = 'pull-right'> $error </span>";
                        }
                        else if (isset($msg)) {
                            echo "<span style = 'color: green;' class = 'pull-right'> $msg </span>";
                        }
                    ?>
                    <?php 
            $QuestionByID = $exm->getQuestionByID($Question_ID);
            $result = $QuestionByID->fetch_assoc();
          ?>
          <form class="form-horizontal" action = "" method = "POST">
            <div class="form-group" style = "display: none;">
              <label for="inputEmail3" class="col-sm-3 control-label"> Question ID </label>
              <div class="col-sm-9">
                <input type="text" value="<?php echo $result['Question_ID']; ?>" class="form-control" id = "Question_ID" name="Question_ID">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2"> Question </label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $result['Question']; ?>" class="form-control" id = "Question" name="Question" placeholder="Question">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2"> First_Answer </label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $result['Answer0']; ?>"class="form-control" id="Answer0" name="First_Answer" placeholder="First Answer">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2"> Second_Answer</label>
              <div class="col-sm-10">
                  <input type="text" value="<?php echo $result['Answer1']; ?>"class="form-control" id="Answer1" name="Second_Answer" placeholder="Second Answer">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2">Third_Answer</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $result['Answer2']; ?>"class="form-control" id="Answer2" name="Third_Answer" placeholder="Third Answer">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2"> Fourth_Answer </label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $result['Answer3']; ?>"class="form-control" id="Answer3" name="Fourth_Answer" placeholder="Fourth Answer">
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
              <label for="input Gender" class="col-sm-2 "> Right Answer </label>
              <div class="col-sm-10">
                <select name="Gender" class="form-control"  name = "Right_Answer" id = "Right_Answer">
                <option value="0" <?php if($result['Right_Answer']=='0'){echo "selected"; }?> > First Answer </option>
                <option value="1" <?php if($result['Right_Answer']=='1'){echo "selected"; }?> >  Second Answer </option>
                <option value="2" <?php if($result['Right_Answer']=='2'){echo "selected"; }?> > Third Answer </option>
                <option value="3" <?php if($result['Right_Answer']=='3'){echo "selected"; }?> >  Fourth Answer </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="input Teacher" class="col-sm-2"> Subject </label>
              <div class="col-sm-10">
                <select name="Teacher ID" class="form-control" name = "Subject_ID" id="Subject_ID">
                <?php $Subject = $exm->getSubject();
                  if(!$Subject){
                    echo "<option value=''> Subject table Not Exist! </option>";
                  }
                  else{
                    if($Subject->num_rows>0){
                    while ($row = $Subject->fetch_assoc()) { ?>
                        
                    <option value="<?php echo $row['Subject_ID']; ?>" > <?php echo $row['Subject']; ?> </option>
                <?php }}
                    else{
                    echo "<option value=''> Subject Table is empty </option>"; 
                    }} ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="input Status" class="col-sm-2"> Status </label>
              <div class="col-sm-10">
                <select name="Gender" class="form-control"  name = "Status" id = "Status">
                <option value="1" <?php if($result['Status']=='allow'){echo "selected"; }?> > Allow </option>
                <option value="0" <?php if($result['Status']=='deny'){echo "selected"; }?> >  Deny </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button-start-the-quiz" name="submit" id = "btn-edit-questions" style = "width: 200px;"> Update Question</button>
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