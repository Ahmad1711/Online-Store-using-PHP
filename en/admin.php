<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>
<body>
<!-- header -->
<div class="agileits_header">
	<div class="container">
		<div class="product_list_header">
			<select id="lang" onchange="language();">
				<option value="en">English</option>
				<option value="ar">Arabic</option>
			</select>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
	<div class="logo_products">
		<div class="container">
			<img src="../images/logo.jpg" alt="" style="width:150px;height:125px;float:left;">
			<div class="w3ls_logo_products_left">
				<h1><a>Producing Families</a></h1>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<?php
if(isset($_POST["reg"]))
{
$name=$_POST["fn"];
$role=$_POST["role"];
$card_id="";
if(isset($_POST["card_id"]))
{
$card_id=$_POST["card_id"];	
}
$email=$_POST["emadd"];
$pass=$_POST["pass"];
register($name,$role,$card_id,$email,$pass);
}
if(isset($_POST["log"]))
{
$email=$_POST["em"];
$pass=$_POST["pas"];
login_admin($email,$pass);	
}
?>	
<!-- top-brands -->
<div class="top-brands">
	<div class="container">
		<h2>Administration</h2>
		<div class="grid_3 grid_5">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
						<div class="register">
							<h2>Register Form</h2>
								<div class="login-form-grids">
									<h6>profile information</h6>
									<form action="" method="post" autocomplete="off">
										<input type="text" name="fn" pattern="[A-Z _a-z]+" title="only characters" placeholder="First Name" required=" " >
										<label>Role Type :</label>
										<select name="role" id="role" onchange="test();" >
											<option value="Admin">Admin</option>
											<option value="Inspector">Inspector</option>
											<option value="Organizer">Organizer</option>
										</select></br>
										<span id="card_id"></span>
										<h6>Login information</h6>
										<input type="email" name="emadd" placeholder="Email" required=" " >
										<input type="password" onkeyup="check();" id="password" name="pass" placeholder="Password" required=" " >
										<input type="password" onkeyup="check();" id="confirm_password" placeholder="Password Confirmation" required=" " >
										<span id="message"></span></br>
										<input type="submit" name="reg" value="Register">
									</form>		
								</div>
						</div>
					</div>
					<!--						-->
					
				</div>
				<!--                             -->
			</div>
	</div>
</div>
</div>
<!-- //footer -->
<div class="footer">
		<div class="footer-copy">
			<div class="container">
				<p>Producing Families. All rights reserved &copy 2018</p>
			</div>
	   </div>
</div>	
	
<!-- //footer -->	

</body>
</html>