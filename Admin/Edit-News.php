
<?php 

include('./_Partial Components/Header.php');

 $Category = $exm->getCategory();

 foreach ($_GET as $key => $data) {
    $data2 = $_GET[$key] = base64_decode(urldecode($data));
    $News_ID = ((($data2*999999)/9999)/123456789);
  }

if (isset($_GET['edit'])) {
  $data = $_GET['edit'];

    $NewsByID = $exm->getNewsByID($News_ID);
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
            
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
            <div calss = "col-md-9">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-list-alt"> </i> <small> Edit News </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Manage-News.php"> <i class = "fa fa-list-alt"></i> View News </a></li>
                </ol>
            </div>
            <div class="col-md-12">
    <!-- END CONTENT BODY -->

          	<?php 
                if (isset($error)) {
                    echo "<span style = 'color: red;' class = 'pull-right'> $error </span>";
                }
                else if (isset($msg)) {
                    echo "<span style = 'color: green;' class = 'pull-right'> $msg </span>";
                }
           
            $NewsByID = $exm->getNewsByID($News_ID);
            $result = $NewsByID->fetch_assoc();
          ?>
          <form class="form-horizontal" action = "" method = "POST">
            <div class="form-group" style = "display: none;">
              <label class="col-sm-3 control-label"> News ID </label>
              <div class="col-sm-9">
                <input type="text" value="<?php echo $result['News_ID']; ?>" class="form-control" id = "News_ID" name="News_ID">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2"> Heading </label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $result['Heading']; ?>" class="form-control" id = "Heading" name="Heading" placeholder="Question">
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2"> Body </label>
                <div class="col-sm-10">
                	<textarea id="Body" col="30" rows="10" class="form-control" id = "Body" name="Body" > <?php echo $result['Body']; ?> </textarea>
              	</div>                
            </div>
            <div class="form-group">
              <label class="col-sm-2"> Source</label>
              <div class="col-sm-10">
                  <input type="text" value="<?php echo $result['Source']; ?>"class="form-control" id = "Source" name="Second_Answer" placeholder="Second Answer">
              </div>
            </div>
            <div class="form-group">
              <label for="input Teacher" class="col-sm-2"> Category </label>
              <div class="col-sm-10">
                <select name="Category ID" class="form-control" name = "Category_ID" id="Category_ID">
                <?php $Category = $exm->getCategory();
                  if(!$Category){
                    echo "<option value=''> Category table Not Exist! </option>";
                  }
                  else{
                    if($Category->num_rows>0){
                    while ($row = $Category->fetch_assoc()) { ?>
                        
                    <option value="<?php echo $row['Category_ID']; ?>" > <?php echo $row['Category']; ?> </option>
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
                    <input type="file" class="btn" id="File">
                </div>
            </div> 
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button-start-the-quiz" name="btn-edit-news" id = "btn-edit-news" > Update News </button>
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