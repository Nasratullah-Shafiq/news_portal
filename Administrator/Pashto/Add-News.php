
<?php include('./_Partial Components/Header.php');

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

                    <form class="form-horizontal" method="POST" action=""enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="Question" class="col-sm-2 control-label pull-right text-right"> سرلیک </label>
                            <div class="col-sm-10 pull-right Headingg" id = "Headingg">
                               <input type="text" class="form-control text-right" id="Heading" placeholder="  سرلیک  ">
                               <input type="text" class="form-control text-right" id="Heading">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right">  خبرونه  </label>
                            <div class="col-sm-10 ">
                                <textarea id="Body" col="30" rows="10" class="form-control text-right" name="Body" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label text-right pull-right">    منبع   </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-right" id="Source" placeholder="  منبع   ">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right text-right">  کټګوری  </label>
                            <div class="col-sm-10">
                                <select name="countr" id = "Category_ID" class="form-control pull-right text-right">
                                    <?php $Category = $exm->getCategory();
                                    if(!$Category){
                                        echo "<option value=''> کټګوری تشته! </option>";
                                    }
                                    else{
                                        if($Category->num_rows>0){
                                            while ($result = $Category->fetch_assoc()) { ?>

                                                <option value="<?php echo $result['Category_ID']; ?>"> <?php echo $result['Category']; ?> </option>
                                            <?php }}
                                        else{
                                            echo "<option value=''> کټګوری موجوده نه ده </option>";
                                        }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label text-right pull-right">    انځور   </label>
                            <div class="col-sm-10">
                                <input type="file" class="text-right" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="button-start-the-quiz pull-right" id = "btn-add-News" >  سیستم ته داخل شی  </button>
                                <span id="span-alid" class="span-validation"></span>
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