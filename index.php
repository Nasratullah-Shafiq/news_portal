<?php 
include_once('./Assets/_Partial Components/Header.php');

$Sport_News = $mtd->getSportNews();
$Science_News = $mtd->getScienceNews();
$Afg_News = $mtd->getAfghanistanNews();
$World_News = $mtd->getWorldNews();
?>

<div class="container">
	<div class="row">
		<div class="col-md-8 news-body">
			<div class = "col-md-12 news-detail"id = "resultNews">
				<div class = "col-md-8 pull-right" style="background:">
                	<form class=" "  method="POST">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name ="searchNews" id ="searchNews" autocomplete="off" placeholder="Search News here... ">
                            <span class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                	</form>
            	</div>
			<?php 
                    if(!$Afg_News){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
                        echo "<br>";
                    }
                    else{
			 	$Afg_rows = $Afg_News->fetch_array();
			 	$Afg_img = $Afg_rows['File'];

			 	$ecrypt_1 = (($Afg_rows['News_ID']*123456789*9999)/999999);
		    	$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
			?>
			
			<a href="<?=$link;?>" style = "color: black;">
			<div class="col-md-12" style="padding-left: 0px;">
				<h2 class = "heading"> <?php echo $Afg_rows['Heading'];?></h2>
			</div>
				
				
					<div class="row">
						<div class="col-md-4">
							<p> 
							<?php
							echo substr($Afg_rows['Body'], 0,200)."..."."Read More";	
							
							?>
							</p>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: black;"> <?php echo $Afg_rows['Category'];?> 
						</div>
					
						<div class="col-md-8 img-detais">
							<?php echo "<img alt='' width='100%' src='./Assets/img/$Afg_img '/>"; ?>
						</div>
					</div>
				</a> 
				<?php }?>
				</div>
			<!--- START OF DIV CONTAIN THREE DIV -->
			<div class = "col-xs-12 col-sm-12" style = "padding-top: 50px;">
<!--=========================================================================================================
	THIS IS THE FIRST DIV FOR DISPLAY OF AFGHANISTAN NEWS
========================================================================================================= -->
				<div class = "col-sm-6 col-lg-4 img-index">
				<a href="<?=$link;?>" style = "color: black;">
					<?php echo "<img alt='' width='100%' height = '110px' src='./Assets/img/$Afg_img '/>"; ?>
					
						<h4> <?php echo $Afg_rows['Heading'];?></h4>
					<p> 
						<?php
							echo substr($Afg_rows['Body'], 0,90)."..."."Read More";	
							
						?>
					</p>
					</a>
					<i class = "fa fa-clock-o"> </i> 34 min ago |  <i class = "fa fa-comment"> </i> 
					<?php 
						$News_ID = $Afg_rows['News_ID'];
						$cmnt = $mtd->getTotalComment($News_ID); 
						echo $cmnt;
					 ?> Comments | <a href="<?=$link;?>" style = "color: rgb(170,0,0);" > <?php echo $Afg_rows['Category'];?></a>
					
				</div>

<!--=========================================================================================================
	THIS IS THE SECOND DIV FOR DISPLAY OF WORLD NEWS
========================================================================================================= -->

				<?php
					if(!$World_News){
                        echo "No record Found!";
                    }
                    else{
                    	
					$world_rows = $World_News->fetch_array();
					$world_img = $world_rows['File'];

					$ecrypt_1 = (($world_rows['News_ID']*123456789*9999)/999999);
		    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
     			?>
     			
				<div class = "col-sm-6 col-lg-4 img-index">
				<a href="<?=$link;?>" style = "color: black;">
					<?php echo "<img alt='' width='100%' height = '110px' src='./Assets/img/$world_img '/>"; ?>
					
						<h4> <?php echo $world_rows['Heading'];?></h4>
					<p> 
						<?php
							echo substr($world_rows['Body'], 0,90)."..."."Read More";	
							
						?>
					</p>
					</a>
					<i class = "fa fa-clock-o"> </i> 34 min ago |  <i class = "fa fa-comment"> </i> 
					<?php 
						$News_ID = $world_rows['News_ID'];
						$cmnt = $mtd->getTotalComment($News_ID); 
						echo $cmnt;
					 ?> Comments |<a href="<?=$link;?>" style = "color: rgb(170,0,0);" > <?php echo $world_rows['Category'];?> </a>
					
				</div>
<!--=========================================================================================================
THIS IS THE THIRD DIV FOR DISPLAY OF SCIENCE NEWS
========================================================================================================= -->

				<?php
					}
					if(!$Science_News){
                        echo "No record Found!";
                    }
                    else{
                    	$Science_rows = $Science_News->fetch_array();
					    $Science_img = $Science_rows['File'];

					    $ecrypt_1 = (($Science_rows['News_ID']*123456789*9999)/999999);
		    		    $link = "Details?id=".urlencode(base64_encode($ecrypt_1));
		    	 
     			?>
     			
				<div class = "col-sm-6 col-lg-4 img-index" style="padding-right: 0px;">
				<a href="<?=$link;?>" style = "color: black;">
					<?php echo "<img alt='' width='100%' height = '110px' src='./Assets/img/$Science_img '/>"; ?>
					
						<h4> <?php echo $Science_rows['Heading'];?></h4>
					<p> 
						<?php
							echo substr($Science_rows['Body'], 0,90)."..."."Read More";	
							
						?>
					</p>
					</a>
					<i class = "fa fa-clock-o"> </i> 34 min ago |  <i class = "fa fa-comment"> </i> 
					<?php 
					$News_ID = $Science_rows['News_ID'];
					$cmnt = $mtd->getTotalComment($News_ID); 
						echo $cmnt;
					 ?> Comments  | <a href="<?=$link;?>" style = "color: rgb(170,0,0);" > <?php echo $Science_rows['Category'];?></a>
					
					
				</div>
				<?php } ?>
			</div>
			
<!--- =====================================================================================================================
	END OF DIV CONTAIN THREE DIV 
=========================================================================================================================-->


			<!--- START OF DIV CONTAIN THREE DIV -->
			<div class = "col-xs-12 col-sm-12" style = "padding-top: 50px;">
<!--=========================================================================================================
	THIS IS THE FIRST DIV FOR DISPLAY OF AFGHANISTAN NEWS
========================================================================================================= -->
				

			</div>

<!--- ////////////////////////////////////////////////////////////////////////////////////////////////  -->

			</div>
			</a>
			<!-- START OF TOP STORIES DIV-->
			<div class="col-md-4">
				<div class = "col-md-12 right-nav" style = "padding-left: 0px; margin-left: 0px;">
				<?php 
				
                if(!$World_News){
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
                    echo "<br>";
                }
                else{
                	$world_rows = $World_News->fetch_array();

					$ecrypt_1 = (($world_rows['News_ID']*123456789*9999)/999999);
		    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
				 	$news_img = $world_rows['File'];

				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div " style=" padding-left: 0px;">
						<?php echo "<img alt='' width='100%' height = '80px' src='./Assets/img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
						<h4> <?php echo $world_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 minutes ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $world_rows['Category'];?></a>
					</div>
					</a> 
					<?php }?>	
		</div>
		<div class="col-md-12 right-nav">
			<?php 
                if(!$Afg_News){
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
                    echo "<br>";
                }
                else{
                	$Afg_rows = $Afg_News->fetch_array();

					$ecrypt_1 = (($Afg_rows['News_ID']*123456789*9999)/999999);
    				$Afglink = "Details?id=".urlencode(base64_encode($ecrypt_1));
			 		$news_img = $Afg_rows['File'];

				?>
				<a href="<?=$Afglink;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./Assets/img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
						<h4> <?php echo $Afg_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$Afglink;?>" style = "color: rgb(170,0,0);" > <?php echo $Afg_rows['Category'];?></a>
					</div>
					</a>
					<?php }?>	
		</div>
		<div class="col-md-12 right-nav">
				<?php   
	  
				 if(!$Sport_News){
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
                    echo "<br>";
                }
                else{
				 	$sprt_rows = $Sport_News->fetch_array();

				$ecrypt_1 = (($sprt_rows['News_ID']*123456789*9999)/999999);
	    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
				 	$news_img = $sprt_rows['File'];
				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='.Assets/img/$news_img '/>"; ?>
					</div>
					
					<div class="col-md-7">
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
					</div>
					
					<?php }?>	
		</div>
		 
					
		<div class="col-md-12 right-nav">
				<?php 
				if(!$Science_News){
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
                    echo "<br>";
                }
                else{
				 	$Science_rows = $Science_News->fetch_array();

				$ecrypt_1 = (($sprt_rows['News_ID']*123456789*9999)/999999);
	    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
				 	$news_img = $sprt_rows['File'];
				?>
				<a href="<?=$link;?>" style = "color: black;">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./Assets/img/$news_img '/>"; ?>
					</div>
					
					<div class="col-md-7">
						
							<h4> <?php echo $Science_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $Science_rows['Category'];?></a>
						
					</div>
				<?php }?>
	
		</div>
	
		<div class="col-md-12 right-nav">
				<?php 

                if(!$Sport_News){
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
                    echo "<br>";
                }
                else{
				 	$sprt_rows = $Sport_News->fetch_array();

				$ecrypt_1 = (($sprt_rows['News_ID']*123456789*9999)/999999);
	    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
				 	$news_img = $sprt_rows['File'];

				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./Assets/img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
	
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
					</div>
					<?php }?>	
		</div>
		<div class="col-md-12 right-nav">
				<?php 
				
                    if(!$Sport_News){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
                        echo "<br>";
                    }
                    else{
			 		$sprt_rows = $Sport_News->fetch_array();

					$ecrypt_1 = (($sprt_rows['News_ID']*123456789*9999)/999999);
		    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
			 		$news_img = $sprt_rows['File'];

				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./Assets/img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
	
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
					</div>	
				<?php }?>	
		</div>
		
		<div class="col-md-12 right-nav">
				<?php 
                if(!$Sport_News){
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... Sport News Not Found </div>';
                    echo "<br>";
                }
                else{
                	$sprt_rows = $Sport_News->fetch_array();
		 			$news_img = $sprt_rows['File'];

		 			$ecrypt_1 = (($sprt_rows['News_ID']*123456789*9999)/999999);
					$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./Assets/img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
	
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
					</div>
					<?php }	?>	
		</div>
		
		</div>
		<!-- END OF TOP STORIES DIV-->

		<!-- STRAT OF ANOTHER DIV-->
		
		<!--- ============================================================================================================
		===============================================================================================================-->

		<div class = "col-md-12" style = "padding-top: 50px;">
			<div class="row" style = "padding-bottom: 30px;">
				<div class = "col-md-2" style = "font-size: 21px; margin-top: -20px;"> Most Read News</div>
				<div class = "col-md-10" style = "border-bottom: 1px solid black;">
					 
				</div>
			</div>
			<div class = "row">
				<?php 
				$most_read_News = $mtd->getMostReadNews();
				$i = 1;
			 	while($most_read_rows = $most_read_News->fetch_array()){ 
			 		$ecrypt_1 = (($most_read_rows['News_ID']*123456789*9999)/999999);
		    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
					
			 		?>
					<div class = "col-md-1" style="background: red;display: none;">
						<h2 style="color: rgb(170,0,0);"> <?php ?></h2>
					</div>
					<a href="<?=$link;?>" style = "color: black;">
						<div class = "col-md-6"style = "border-bottom: 1px solid rgb(210,210,210);">
						<h2 style="color: rgb(170,0,0); float: left; margin-top: 10px;"> <?php echo $i++;?> </h2> <h4 style = "float: left; padding-left: 10px; margin-top: 15px;"> <?php echo $most_read_rows['Heading'];?></h4> 
						</div>
					</a>
				<?php }?>
			</div>
				
		</div>
			<!--========================================================================================================
			This part belongs to World News
			=========================================================================================================-->
			<div class = "col-md-12" style = "padding-top: 40px;">
			<div class="row" style = "padding-bottom: 30px;">
				<div class = "col-md-1" style = "font-size: 24px; margin-top: -20px;"> World </div>
				<div class = "col-md-11" style = "border-bottom: 1px solid black;">
					 
				</div>
			</div>
			<?php 
				if(!$World_News){
                echo "<br>";
                echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... Afghanistan News Not Found </div>';
                echo "<br>";
                }
                else{
			 	while($world_rows = $World_News->fetch_array()){ 
			 		$ecrypt_1 = (($world_rows['News_ID']*123456789*9999)/999999);
		    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));

			 		$world_img = $world_rows['File'];?>
			 		<a href="<?=$link;?>" style = "color: black;">
					<div class = "col-md-3 right-line">
					<?php echo "<img alt='' width='100%' height = '130px' src='./Assets/img/$world_img'/>"; ?>
					
						<h4> <?php echo $world_rows['Heading'];?></h4> </a>
					<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $world_rows['Category'];?></a>
				</div>
				<?php }}?>
			</div>
	
		<!-- END OF ANOTHER DIV-->
		<!-- ================================================================================================================
		This Parts Belongs to sports
		=====================================================================================================================-->

			<div class = "col-md-12" style = "padding-top: 50px;">
			<div class="row" style = "padding-bottom: 30px;">
				<div class = "col-md-1" style = "font-size: 24px; margin-top: -20px;"> Sports </div>
				<div class = "col-md-11" style = "border-bottom: 1px solid black;">
					 
				</div>
			</div>
			 <?php 
			 $SportNews = $mtd->getSportNews();
			if(!$SportNews){
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... Afghanistan News Not Found </div>';
                    echo "<br>";
                }
                else{
				 	while($sport_rows = $SportNews->fetch_array()){ 
				 		$ecrypt_1 = (($sport_rows['News_ID']*123456789*9999)/999999);
			    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));

				 		$sprt_img = $sport_rows['File'];?>
				 		<a href="<?=$link;?>" style = "color: black;">
						<div class = "col-md-3 right-line">
						<?php echo "<img alt='' width='100%' height = '130px' src='./Assets/img/$sprt_img'/>"; ?>
						
							<h4> <?php echo $sport_rows['Heading'];?></h4> </a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $sport_rows['Category'];?></a>
					</div>
				<?php }}?>
			</div>
		<!-- =============================================================================================================
		==================================================================================================================-->
	
			<div class = "col-md-12" style = "padding-top: 50px;">
			<div class="row" style = "padding-bottom: 30px;">

				<div class = "col-md-2" style = "font-size: 24px; margin-top: -20px;"> Afghanistan </div>
				<div class = "col-md-10" style = "border-bottom: 1px solid black;">
					 
				</div>
			</div>
				<?php 
				
				if(!$Afg_News){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... Afghanistan News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
			
			 	while($Afg_rows = $Afg_News->fetch_array()){ 
			 		$ecrypt_1 = (($Afg_rows['News_ID']*123456789*9999)/999999);
		    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));

			 		$Afg_img = $Afg_rows['File'];?>
			 		
					<a href="<?=$link;?>" style = "color: black;">
					<div class = "col-md-3 right-line">
					<?php echo "<img alt='' width='100%' height = '130px' src='./Assets/img/$Afg_img'/>"; ?>
					
						<h4> <?php echo $Afg_rows['Heading'];?></h4> </a>
					<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $Afg_rows['Category'];?></a>
				</div>
				<?php }}?>
			</div>
		<!--===============================================================================================================
		This part belongs to Science News
		=================================================================================================================-->

		<div class = "col-md-12 news-deails" style = "padding-top: 50px;">
			<div class="row" style = "padding-bottom: 30px;">
				<div class = "col-md-1" style = "font-size: 22px; margin-top: -20px;"> Science </div>
				<div class = "col-md-11" style = "border-bottom: 1px solid black;">
					 
				</div>
			</div>
				<?php 
				$ScienceNews = $mtd->getScienceNews();
				
				if(!$ScienceNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... Science News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	                    	
						// $Science_rows = $Science_News->fetch_array();
					    //$Science_img = $Sciencerows['File'];

					    //$ecrypt_1 = (($Science_rows['News_ID']*123456789*9999)/999999);
		    		    //$link = "Details?id=".urlencode(base64_encode($ecrypt_1));

					// $Science_row = $Science_News->fetch_array();
					// print_r($Science_row);
			 	while($Sciencerows = $ScienceNews->fetch_array()){
			 		$ecrypt_1 = (($Sciencerows['News_ID']*123456789*9999)/999999);
		    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
 
			 		$Scienc_img = $Sciencerows['File'];?>
			 		<a href="<?=$link;?>" style = "color: black;"> 
					<div class = "col-md-3 right-line">
					<?php echo "<img alt='' width='100%' height = '130px' src='./Assets/img/$Scienc_img'/>"; ?>
					
						<h4> <?php echo $Sciencerows['Heading'];?></h4> </a>
					<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $Sciencerows['Category'];?></a> | <i class = "fa fa-comment"> </i> 44
					</div>
					<?php }}?>
			</div>
		
			<!--=============================================================================================================================
			This part belongs to Technology News
			===============================================================================================================================-->

			<div class = "col-md-12" style = "padding-top: 40px;">
			<div class="row" style = "padding-bottom: 30px;">
				<div class = "col-md-2" style = "font-size: 24px; margin-top: -20px;"> Technology </div>
				<div class = "col-md-10" style = "border-bottom: 1px solid black;">
					 
				</div>
			</div>
				<?php 
				$Tech_News = $mtd->getTechnologyNews();
				if(!$Tech_News){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... Science News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
				
			 	while($Tech_rows = $Tech_News->fetch_array()){
			 		$ecrypt_1 = (($Tech_rows['News_ID']*123456789*9999)/999999);
		    		$link = "Details?id=".urlencode(base64_encode($ecrypt_1));

			 		$Tech_img = $Tech_rows['File'];?>
			 		<a href="<?=$link;?>" style = "color: black;"> 
					<div class = "col-md-3 right-line">
					<?php echo "<img alt='' width='100%' height = '130px' src='./Assets/img/$Tech_img'/>"; ?>
					
						<h4> <?php echo $Tech_rows['Heading'];?></h4> </a>
					<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $Tech_rows['Category'];?></a>
				</div>
				<?php }} ?>
			</div>


	</div>
	
</div>

<?php 
include_once('./Assets/_Partial Components/Footer.php');
?>