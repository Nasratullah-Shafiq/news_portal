
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
            <div class = "col-md-12" style = "text-align: right;">
                    <h1 style = "color: #2C3E50" class="text-right">   <small> د بی بی سی په اړه  <i class = "fa fa-list-alt"> </i></small></h1><hr>
                    <ol class="breadcrumb" class = "text-right">

                        <li class = "activ">  <a href="Ablut.php"> زمونژ په اړه <i class = "fa fa-info"></i>  </a> </li>
                        <li><a href="index.php"> دشبورد <i class = "fa fa-tachometer"></i>  </a></li>
                    </ol>
                </div>
            	<div class="col-md-9 pull-right text-right">
                    <h1 id="text-index-page"> د بی بی سی په اړه</h1>
                د بی بی سی ویب پاڼه د نصرت الله شفیق لخوا جوړ شوی دی.
                یاد شوی ویب پاهڼه د CMS په بڼه جوړ شوی دی چیرته چی مدیر د ویب پاڼی کولای شی چی د ویب پاڼی ته خبرونه
                اضافه کړي خبرونه دیلیت کړي او خبرونو کی تغیرات راولی.
    			</div>
<!-- END QUICK SIDEBAR -->
			</div>             	   	  
		</div>
	</div>
</div>

<?php 
include('./_Partial Components/Footer.php');
?>