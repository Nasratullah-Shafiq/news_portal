<?php 
include_once('./Assets/_Partial Components/Header.php');

	foreach ($_GET as $key => $data) {
		$data2 = $_GET[$key] = base64_decode(urldecode($data));
		$News_ID = ((($data2*999999)/9999)/123456789);
	}

if (isset($_GET['id'])) {
 	$data = $_GET['id'];
 	$NewsByID = $mtd->getNewsByID($News_ID);
    $rows = $NewsByID->fetch_array();
	}
else{
    header('Location: index.php');
} 
	if(isset($_SESSION['$Email'])){
	    $Email = $_SESSION['Email'];

		$UsersByUsername = $mtd->getUsersByUsername($Email);
		$userRow = $UsersByUsername->fetch_assoc();        
    }
$userRow = $UsersByUsername->fetch_assoc();   

$Like = $mtd->getLike($News_ID);

	
?>
<div class="container">
		<div class="row">
			<div class="col-md-12 news-active-title">
				<span class = "active-title">
				<?php
				    echo $rows['Category'];	
				?>
				</span>
			</div>
			<div class="col-md-8">
			<?php 
			$NewsBID = $mtd->getNewsByID($News_ID);
                    if(!$NewsBID){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No News Found </div>';
                        echo "<br>";
                    }
                    else{
  
			 if($NewsBID->num_rows>0){
			 	
			 	$news_img = $rows['File'];
			 	//$News_ID = $rows['News_ID'];

			?>

				<div class="col-md-12" style=" padding-left: 0px; padding-right: 0px;">
					<h2 class="heading"> <?php echo $rows['Heading'];?></h2>
					<i class = "fa fa-clock-o"> </i> 34 minutes ago |  <i class = "fa fa-comment"> </i> 
					<?php $cmnt = $mtd->getTotalComment($News_ID); 
						echo $cmnt;
					 ?> Comments
					
					<div class = "col-md-12 " style="padding-left: 0px; padding-right: 0px;">
						<div class = "col-md-6" style="padding-left: 0px; padding-right: 0px;">
							<h3> Share this story </h3>
						</div>
						<div class="col-sm-6 pull-right" style="padding-right: 0px; text-align: right; padding: 0px; margin: 0px;">
							<h2 class = "icons" style = "color: rgb(0,112,192);">
								<div class = "col-xs-1 col-sm-2"> <i class = "fa fa-facebook"> </i> </div>
								<div class = "col-xs-1 col-sm-2"> <i class = "fa fa-twitter"> </i></div>
								<div class = "col-xs-1 col-sm-2"><i class = "fa fa-instagram"> </i></div>
								<div class = "col-xs-6 col-sm-6" style="padding-right: 0px;"><i class = "fa fa-share"> </i> share </div>
							</h2>
						</div>
					</div>	
					
				</div>
					
					<div id = "btnAdike" class="col-md-12 img-details" style="padding-left: 0px; padding-right: 0px;">
						<?php echo "<img width = '100%' alt='' src='./Assets/img/$news_img '/>"; ?>
					</div>
					<div class = "col-md-4">
					<!-- <span class="input-group-btn"> -->
					<?php
					if(!$Like){?>
						<button type = "submit" id = "btnAddLike" class="btn btn-primary"><img alt='' height = "25px" src="./Assets/img/facebook-like.png"/> </button>
						
	                   <?php }else{
					
	                    $like_row = $Like->fetch_array();
	                    if($like_row['News_ID']!='$News_ID'){?> 
			            <button type = "submit" style = "background-color: rgb();" id = "btndislike" class="btn btn-primary"><img alt='' height = "25px" src="./Assets/img/facebook-like-filled.png"/></button>
			         	Just you like this news
			         	
			         	<input style = "display: none;" type="text" value="<?php echo $like_row['Like_ID']; ?>" class="form-control" id ="Like_ID" autocomplete="off" placeholder=" News ID here... ">
			         <?php }} ?>
			         
                        <?php //print_r($like_row['News_ID']); ?>       <!-- </span> -->
                    <!-- <span class="input-group-btn"> -->
                       
                       
	                   <script type="text/javascript">
							$(document).ready(function(){
							  $('#btndislike').click(function(){
						          if($('#btndislike').is(':visibled')){
						            $('#btnAddLike').prop('visibled',false);
						            
						          }
						        });
						        $('#btnAddLike').click(function(){
						          if($('#btnAddLike').is(':visibled')){
						            $('#btndislike').prop('visibled',false);
						          }
						        });

							       // $('#btndislike').click(function(){
							       //    $('#btndislike').prop('enabled',true);
							       //      $('#btnAddLike').prop('disabled',true);
							            
							       //  });
							       //  $('#btnAddLike').click(function(){
							          
							       //      $('#btnAddLike').prop('enabled',true);
							       //      $('#btndislike').prop('disabled',true);
							        
							          
							       //  });
	                   </script>     	
                       <span id = "e_ID">
                       		 <?php// echo $like_row['Like_ID']; ?>
                       </span> 
                    <!-- </span> -->
					<!-- <img style = "background-color: rgb(200,200,200);" alt='' width="10%" height = "25px" src="./img/facebook-like-filled.png "/> like -->
						<!-- <p> Like <button type = "submit" id = "btnComment" class="btn btn-default"><i class="fa fa-comment"></i></button> </p>  -->
					</div>
					<div class = "col-md-4">
						<p> Comment <button type = "submit" id = "btnComment" class="btn btn-default"><i class="fa fa-comment"></i></button> </p> 
					</div>
					<div class = "col-md-4">
						<p> Share <button type = "submit" id = "btnComment" class="btn btn-default"><i class="fa fa-comment"></i></button></p>
					</div>
					<div class = "col-md-12">
						
	                        <div class="input-group input-group-sm">
	                        	<input style = "display: none;" type="text" value="<?php echo $rows['News_ID'];?> " class="form-control" id ="News_ID" autocomplete="off" placeholder=" News ID here... ">
	                        	<input style = "display: none;" type="text" value="<?php echo $userRow['User_ID'];?>" class="form-control" id ="User_ID" autocomplete="off" placeholder=" User ID here... ">
	                        	
	                            <input type="text" class="form-control" id ="Comment" autocomplete="off" placeholder=" Comment here... ">
	                            <span class="input-group-btn">
	                               <button type = "submit" id = "btnAddComment" class="btn btn-default"><i class="fa fa-comment"></i></button>
	                            </span> 

	                        </div>
                		
                		<br>
                		<span id="span-valid" class="span-validation"></span>

					</div>
					<br><br>
					<div>  </div>
					<div class="col-md-12">
						 
						<p>	<?php echo $rows['Body']; ?></p>

					</div>	
							
				
			<?php 
					}
					else{
						echo "not exist";
					}
				}

				?>
			
			</div>
			</a>
			<div class="col-md-4" style="padding-left: 0px; padding-right: 0px;">
				<div class = "col-md-12 right-nav">
				<?php 
				$WorldNews = $mtd->getWorldNews();
				

				
		    	$link = "Details?id=".urlencode(base64_encode($ecrypt_1));

	                    if(!$WorldNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($WorldNews->num_rows>0){
				 	$world_rows = $WorldNews->fetch_array();
				 	$ecrypt_1 = (($world_rows['News_ID']*123456789*9999)/999999);
				 	$news_img = $world_rows['File'];

				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
						<h4> <?php echo $world_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 minutes ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $world_rows['Category'];?></a>
					</div>
					</a>
					<?php 
						}
						else{
							echo "not exist";
						}
					}

				?>	
		</div>
		<div class="col-md-12 right-nav">
				<?php 
				$AfgNews = $mtd->getAfghanistanNews();
				$Afg_rows = $AfgNews->fetch_array();

				$ecrypt_1 = (($Afg_rows['News_ID']*123456789*9999)/999999);
		    	$link = "Details?id=".urlencode(base64_encode($ecrypt_1));

	                    if(!$AfgNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($AfgNews->num_rows>0){
				 	
				 	$news_img = $Afg_rows['File'];

				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
						<h4> <?php echo $Afg_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);" > <?php echo $Afg_rows['Category'];?></a>
					</div>
					</a>
					<?php 
						}
						else{
							echo "not exist";
						}
					}

				?>	
		</div>
		<div class="col-md-12 right-nav">
				<?php 
				$SportNews = $mtd->getSportNews();
				

	                    if(!$SportNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($SportNews->num_rows>0){
				 $sprt_rows = $SportNews->fetch_array();

				$ecrypt_1 = (($sprt_rows['News_ID']*123456789*9999)/999999);
		    	$link = "Details?id=".urlencode(base64_encode($ecrypt_1)); 	
				 	$news_img = $sprt_rows['File'];

				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					
					<div class="col-md-7">
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
					</div>
					
					<?php 
						}
						else{
							echo "not exist";
						}
					}

				?>	
		</div>
		
		<div class="col-md-12 right-nav">
				<?php 
				foreach ($_GET as $key => $data) {
					$data2 = $_GET[$key] = base64_decode(urldecode($data));
					$News_ID = ((($data2*999999)/9999)/123456789);
				}
                $FoodNews = $mtd->getFoodNews();
				
	                    if(!$FoodNews){


                    // $Tech_row = $TechNews->fetch_assoc();
				// $Tech_row = $TechNews->fetch_array();

				$ecrypt_1 = (($FoodNews['News_ID']*123456789*9999)/999999);
		    	$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... Food News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  $Food_row = $FoodNews->fetch_array();
				 // if($FoodNews->num_rows>0){
				 	
				 	$news_img = $Food_row['File'];

				?>
				<a href="<?=$link;?>" style = "color: black;">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					
					<div class="col-md-7">
						
							<h4> <?php echo $Food_row['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $Food_row['Category'];?></a>
					</div>
					
					<?php 
						
					}

				?>	
		</div>
		<div class="col-md-12 right-nav">
				<?php 

				$ScinceNews = $mtd->getScienceNews();
				

				

	                   if(!$ScinceNews){
	                       echo "<br>";
	                       echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... Science News Not Found </div>';
	                       echo "<br>";
	                   }
	                   else{
				// if($Science_row->num_rows>0){
	                   	$Science_row = $ScinceNews->fetch_assoc();
	                   	$ecrypt_1 = (($Science_row['News_ID']*123456789*9999)/999999);
		    	$link = "Details?id=".urlencode(base64_encode($ecrypt_1));
				 	
				 	$news_img = $Science_row['File'];

				?>
	            	<a href="<?=$link;?>" style = "color: black;"> 
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					
					<div class="col-md-7">
						
							<h4> <?php echo $Science_row['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $Science_row['Category'];?></a>
					</div>
					
					<?php 
						
					}

				?>	
		</div>
		<div class="col-md-12 right-nav">
				<?php 
				$SportNews = $mtd->getSportNews();
				

	                    if(!$SportNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($SportNews->num_rows>0){
				$sprt_rows = $SportNews->fetch_array();

				$ecrypt_1 = (($sprt_rows['News_ID']*123456789*9999)/999999);
		    	$link = "Details?id=".urlencode(base64_encode($ecrypt_1)); 	
				 	$news_img = $sprt_rows['File'];

				?>
				<a href="<?=$link;?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
	
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
					</div>
					
					<?php 
						}
						else{
							echo "not exist";
						}
					}
				?>	
		</div>
		
		
		</div>

		</div>
	 
</div>

<?php 
include_once('./Assets/_Partial Components/Footer.php');
?>