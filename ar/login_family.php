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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
				<li class="active">دخول عائلة</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>دخول عائلة</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="" method="post" autocomplete="off">
					<input type="email" name="emadd" placeholder="البريد الالكتروني" required=" " >
					<input type="password" name="pass" placeholder="كلمة المرور" required=" " >
					<input type="submit" name="log" value="دخول">
				</form>
			</div>
		<h4>من أجل الزوار</h4>
		<p><a href="registered_customer.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>التسجيل من هنا</a> أو عودة الى <a href="index.php">الرئيسية</a></p>
		</div>
	</div>
<!-- //login -->
<?php include("include/footer.php"); ?>
</body>
</html>