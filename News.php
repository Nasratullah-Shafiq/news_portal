<?php 
include_once('./Assets/_Partial Components/Header.php');

	
	foreach ($_GET as $key => $data) {
		$data2 = $_GET[$key] = base64_decode(urldecode($data));
		$Category_ID = ((($data2*999999)/9999)/123456789);
	}


	if (isset($_GET['id'])) {
	 	$data = $_GET['id'];
		$CategoryByID = $mtd->getCategoryByID($Category_ID);
	    $row = $CategoryByID->fetch_assoc();
	}
	else{
        header('Location: index.php');
	// } 
		

	if (isset($_GET['id'])) {
	 	$data = $_GET['id'];
		}
	else{
	    header('Location: index.php');
	} 
	
?>
<div class="container">
		<div class="row">
			<div class="col-md-8">
				<span class = "active-title">
				<?php
				    echo $row['Category'];	
				?>
				</span>
				<div class = "col-xs-12 col-md-8 pull-right" style = "padding-left: 0px; padding-right: 0px;">
                	<form class=" "  method="POST">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name ="searchNews" id ="searchNews" autocomplete="off" placeholder="Search News here... ">
                            <span class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                	</form>
            	</div>
			</div>

			<div class="col-md-8  news-body" id = "resultNews" >
			<?php 
			$NewsBID = $mtd->getNewsByCategory($Category_ID);
                    if(!$NewsBID){
                        echo "<br>";
                        //echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No News Found </div>';
                        echo '<div class = "col-md-12" style = "background: rgb(210,210,201); height: 300px;"></div>';
                        echo "<br>";
                    }
                    else{
  
			 if($NewsBID->num_rows>0){
			 	$rows = $NewsBID->fetch_assoc();
			 	$news_img = $rows['File'];

			?>
			<?php
				$ecrypt_1 = (($rows['News_ID']*123456789*9999)/999999);
                $link = "Details?id=".urlencode(base64_encode($ecrypt_1));
                ?>
			<a href="<?=$link;?>" style = "color: black;">
				<div class="col-md-12">
					<h2> <?php echo $rows['Heading'];?></h2>
				</div>
				<div class="row">

					<div class="col-md-4">
						<div class="col-md-12">
							<p> 
							<?php
							echo substr($rows['Body'], 0,200)."..."."Read More";	
							
							?>
							</p>
						</div>
						</a>
						<div class="col-md-12">
							<i class = "fa fa-clock-o"> </i> 34 min ago | <a href="<?=$link;?>" style = "color: rgb(170,0,0);" > <?php echo $row['Category'];?>
						</div>
						<div class="col-md-12">
							<img style = "background-color: blue;" alt='' width="10%" height = "25px" src="./img/facebook-like-filled.png "/> like
							<i class = "fa fa-comment" style = "color: blue;"> </i> comment
							<i class = "fa fa-share" style = "color: blue;"> </i> share
						</div>
						
					</div>
					
					<div class="col-md-8">
						<?php echo "<img alt='' width='100%' height = '240px' src='./Assets/img/$news_img '/>"; ?>
					</div>
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
			</a>

			<div class="col-md-4">
				<div class = "col-md-12 right-nav">
				<?php 
				$WorldNews = $mtd->getWorldNews();
				$world_rows = $WorldNews->fetch_array();
				$ecrypt_1 = (($world_rows['News_ID']*123456789*9999)/999999);
                $link = "Details?id=".urlencode(base64_encode($ecrypt_1));
                
				
	                    if(!$WorldNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($WorldNews->num_rows>0){
				 	
				 	$news_img = $world_rows['File'];

				?>
				<a href = "<?php echo $link?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
						<h4> <?php echo $world_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 minutes ago | <a href = "<?php echo $link?>" style = "color: rgb(170,0,0);"> <?php echo $world_rows['Category'];?></a>
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
	                    if(!$AfgNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($AfgNews->num_rows>0){
				 	
				 	$news_img = $Afg_rows['File'];

				?>
				<a href = "<?php echo $link?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
						<h4> <?php echo $Afg_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href = "<?php echo $link?>" style = "color: rgb(170,0,0);" > <?php echo $Afg_rows['Category'];?></a>
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
				$sprt_rows = $SportNews->fetch_array();
	                    if(!$SportNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($SportNews->num_rows>0){
				 	
				 	$news_img = $sprt_rows['File'];

				?>
				<a href = "<?php echo $link?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					
					<div class="col-md-7">
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
				</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href = "<?php echo $link?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
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
				$TechNews = $mtd->getTechnologyNews();
				$Tech_rows = $TechNews->fetch_array();
	                    if(!$TechNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($TechNews->num_rows>0){
				 	
				 	$news_img = $Tech_rows['File'];

				?>
				<a href = "<?php echo $link?>" style = "color: black;">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					
					<div class="col-md-7">
						
							<h4> <?php echo $Tech_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href = "<?php echo $link?>" style = "color: rgb(170,0,0);"> <?php echo $Tech_rows['Category'];?></a>
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

				$ScinceNews = $mtd->getScienceNews();
				
	 
				 if(!$ScinceNews){
				 	echo "NOT Exist Record Found!";
				 }
				 else{
				 	$Science_rows = $ScinceNews->fetch_array();
				 	$news_img = $Science_rows['File'];

				?>
				<a href = "<?php echo $link?>" style = "color: black;">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					
					<div class="col-md-7">
						
							<h4> <?php echo $Science_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href = "<?php echo $link?>" style = "color: rgb(170,0,0);"> <?php echo $Science_rows['Category'];?></a>
					</div>
					
					<?php }	?>	
		</div>
		<div class="col-md-12 right-nav">
				<?php 
				$SportNews = $mtd->getSportNews();
				$sprt_rows = $SportNews->fetch_array();
	                    if(!$SportNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($SportNews->num_rows>0){
				 	
				 	$news_img = $sprt_rows['File'];

				?>
				<a href = "<?php echo $link?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
	
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href = "<?php echo $link?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
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
				$SportNews = $mtd->getSportNews();
				$sprt_rows = $SportNews->fetch_array();
	                    if(!$SportNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($SportNews->num_rows>0){
				 	
				 	$news_img = $sprt_rows['File'];

				?>
				<a href = "<?php echo $link?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
	
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href = "<?php echo $link?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
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
				$SportNews = $mtd->getSportNews();
				$sprt_rows = $SportNews->fetch_array();
	                    if(!$SportNews){
	                        echo "<br>";
	                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... News Not Found </div>';
	                        echo "<br>";
	                    }
	                    else{
	  
				 if($SportNews->num_rows>0){
				 	
				 	$news_img = $sprt_rows['File'];

				?>
				<a href = "<?php echo $link?>" style = "color: rgb(0,0,0);">
					<div class="col-md-5 small-div">
						<?php echo "<img alt='' width='130px' height = '80px' src='./img/$news_img '/>"; ?>
					</div>
					<div class="col-md-7">
	
							<h4> <?php echo $sprt_rows['Heading'];?></h4>
						</a>
						<i class = "fa fa-clock-o"> </i> 34 min ago | <a href = "<?php echo $link?>" style = "color: rgb(170,0,0);"> <?php echo $sprt_rows['Category'];?></a>
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