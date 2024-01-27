
<?php 

include('./_Partial Components/Header.php');

?>
<?php $Category = $exm->getCategory();

if(isset($_GET['edit'])){
   $News_ID = $_GET['edit'];
   
}
else{
   header('Location: ../sign in.php');
}
?>
    <div class="containe">
    	<div class="row" id="row">
            <div class="left-side-bar pull-right">
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
                <div calss = "col-md-9" style = "text-align: right;">
                    <h1> <small> د خبرونو جوړول </small><i class = "fa fa-list-alt"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Manage-news.php">   د خبرونو لیدل  <i class = "fa fa-list-alt"></i>  </a></li>
                        <li ><a href="index.php"> کور پاڼه<i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>

                
                <div class="col-md-9 pull-right ">
                    <?php 
          if(isset($_GET['edit'])){
             $News_ID = $_GET['edit'];
             $NewsByID = $exm->getNewsByID($News_ID);
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
            $NewsByID = $exm->getNewsByID($News_ID);
            $result = $NewsByID->fetch_assoc();
          ?>
                    <form class="form-horizontal" method="POST" action="">

                        <div class="form-group" style="display: none;">
                            <label class="col-sm-2 control-label pull-right text-right"> آی دی </label>
                            <div class="col-sm-10 pull-right">
                                <input type="text" value = "<?php echo $result['News_ID'] ?>" class="form-control text-right" id="News_ID" placeholder="  آی دی  ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right text-right"> سرلیک </label>
                            <div class="col-sm-10 pull-right">
                                <input type="text" value = "<?php echo $result['Heading'] ?>" class="form-control text-right" id="Heading" placeholder="  سرلیک  ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right">  خبرونه  </label>
                            <div class="col-sm-10 ">
                                <textarea id="Body" col="30" rows="10" class="form-control text-right" name="Body" id = "Body" > <?php echo $result['Body'] ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label text-right pull-right">    منبع   </label>
                            <div class="col-sm-10">
                                <input type="text" value = "<?php echo $result['Source'] ?>" class="form-control text-right" id = "Source" placeholder="  منبع   ">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right text-right">  کټګوری  </label>
                            <div class="col-sm-10">
                                <select name="countr" id = "Category_ID" class="form-control pull-right text-right">
                                    <?php $Category = $exm->getCategory();
                                    if(!$Category){
                                        echo "<option value=''> د کټګوری ټیبل هیڅ وجود نلری! </option>";
                                    }
                                    else{
                                        if($Category->num_rows>0){
                                            while ($result = $Category->fetch_assoc()) { ?>

                                                <option value="<?php echo $result['Category_ID']; ?>"> <?php echo $result['Category']; ?> </option>
                                            <?php }}
                                        else{
                                            echo "<option value=''> کټګوری ټیبل خالی دی </option>";
                                        }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="button-start-the-quiz pull-right" id = "btn-update-News" >  سیستم ته داخل شی  </button>
                                <span id="spa-valid" class="span-validation"></span>
                                <span id="span-valid" class="span-validation alert alert-success" role="alert"> </span>
                            </div>
                        </div>
                    </form>
                </div>
                        
        </div>
      </div>
    </div>

<?php 
include('./_Partial Components/Footer.php');
?>