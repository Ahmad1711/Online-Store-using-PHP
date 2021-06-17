<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>
<body> 	
<?php
include("include/test_header.php");
//include("include/navbar.php");
if(isset($_POST["reg"]))
{
$fname=$_POST["fn"];
$lname=$_POST["ln"];
$address=$_POST["add"];
$phone=$_POST["phn"];
$email=$_POST["emadd"];
$pass=$_POST["pass"];
register_customer($fname,$lname,$address,$phone,$email,$pass);
}
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Customer Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
			<h2>Customer Account</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form action="" method="post" autocomplete="off">
					<input type="text" name="fn" pattern="[A-Z _a-z]+" title="only characters" placeholder="First Name" required=" " >
					<input type="text" name="ln" pattern="[A-Z _a-z]+" title="only characters" placeholder="Last Name" required=" " >
					<input type="text" name="add" pattern="[A-Z _a-z0-9]+" placeholder="Address" required=" " >
					<input type="tel"  name="phn" pattern="[0-9]+" title="only numbers" placeholder="Phone Number" required=" " >
				 <h6>Login information</h6>
					<input type="email" name="emadd" placeholder="Email Address" required=" " >
					<input type="password" onkeyup="check();" id="password" name="pass" placeholder="Password" required=" " >
					<input type="password" onkeyup="check();" id="confirm_password" name="confirm" placeholder="Password Confirmation" required=" " >
					<span id="message"></span></br>
					Show Password : <input type="checkbox" onclick="myFunction();">
					<input type="submit" name="reg" value="Register">
				</form>
			</div>
	</div>
<!-- //register -->
<?php include("include/test_footer.php"); ?> 
</body>
</html>