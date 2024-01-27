<?php 
include_once('./_Partial Components/Header.php');
?>

<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
							<h2> Here you can contact to BBC </h2>
					</div>
					<div class="col-md-9">
				<form action="" method = "POST">
                    <div class="form-group">
                            <?php 
                                if (isset($error)) {
                                    echo "<div class='alert alert-danger' role='alert' style = 'font-size: 16px;'> $error </div>";
                                }
                                else if (isset($msg)) {
                                    echo "<div class='alert alert-success' role='alert' style = 'font-size: 16px;'> $msg </div>";
                                }
                            ?>  
                    </div>
                    <div class="form-group">
                        <label for="ful-name"> Full Name </label>
                        <input type="text" id="Full_Name" name = "Full_Name" class="form-control" placeholder="full Name">
                    </div>

                    <div class="form-group">
                        <label for="Email"> Email </label>
                        <input type="text" id="Email" class="form-control" name = "Email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="ful-name"> Phone No </label>
                        <input type="text" id="Phone_No" class="form-control" name = "Phone_No" placeholder="Phone No">
                    </div>

                    <div class="form-group">
                        <label for="Message"> Message </label>
                        <textarea id="Message" col="30" rows="5" class="form-control" name="Message" placeholder="your message here..."> </textarea>
                    </div>
                    <input type="submit" name="submit" class="button-start-the-quiz" value="Send Message" id = "btn-send-messe">
                    <div class="form-group" style = "padding-top: 20px; font-size: 16px;">
                        <span id="span-valid" class="span-validation"></span>  
                    </div>

                </form>

				</div>
						
				</div>

			</div>
		</div>
	 
</div>

<?php 
include_once('./_Partial Components/Footer.php');
?>