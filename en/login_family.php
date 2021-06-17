<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html");?>
</head>
<body>
<?php
include("include/test_header.php");
//include("include/navbar.php");
if(isset($_POST["log"]))
{
$email=$_POST["emadd"];
$pass=$_POST["pass"];
login_family($email,$pass);	
}
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Family Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Family Login Form</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="" method="post" autocomplete="off">
					<input type="email" name="emadd" placeholder="Email Address" required=" " >
					<input type="password" name="pass" placeholder="Password" required=" " >
					<input type="submit" name="log" value="Login">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="registered_family.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
<?php include("include/footer.php"); ?>
</body>
</html>