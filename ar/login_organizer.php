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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
				<li class="active">دخول منظم</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>دخول منظم</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="" method="post" autocomplete="off">
					<input type="email" name="emadd" placeholder="البريد الالكتروني" required=" " >
					<input type="password" name="pass" placeholder="كلمة المرور" required=" " >
					<input type="submit" name="log" value="دخول">
				</form>
			</div>
		</div>
	</div>
<!-- //login -->
<!-- //footer -->
<div class="footer">
		
		<div class="footer-copy">
			
			<div class="container">
				<p>الأسر المنتجة جميع الحقوق محفوظة &copy 2018</p>
			</div>
		</div>
		
</div>	
	
<!-- //footer -->
</body>
</html>