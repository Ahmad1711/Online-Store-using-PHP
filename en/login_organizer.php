<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html");?>
</head>
<body>
<!-- header -->
<?php
include("include/test_header.php");
if(isset($_POST["log"]))
{
$email=$_POST["emadd"];
$pass=$_POST["pass"];
login_organizer($email,$pass);	
}
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Organizer Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Organizer Login Form</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="" method="post" autocomplete="off">
					<input type="email" name="emadd" placeholder="Email Address" required=" " >
					<input type="password" name="pass" placeholder="Password" required=" " >
					<input type="submit" name="log" value="Login">
				</form>
			</div>
		</div>
	</div>
<!-- //login -->
<!-- //footer -->
<?php
include("include/test_footer.php");
?> 	
<!-- //footer -->
</body>
</html>