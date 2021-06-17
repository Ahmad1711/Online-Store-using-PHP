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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
				<li class="active">تسجيل زبون</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
			<h2>حساب زبون</h2>
			<div class="login-form-grids">
				<h5>معلومات حساب</h5>
				<form action="" method="post" autocomplete="off">
					<input type="text" name="fn" pattern="[A-Z _a-z]+" title="only characters" placeholder="الاسم الاول" required=" " >
					<input type="text" name="ln" pattern="[A-Z _a-z]+" title="only characters" placeholder="الاسم الاخير" required=" " >
					<input type="text" name="add" pattern="[A-Z _a-z0-9]+" placeholder="العنوان" required=" " >
					<input type="tel"  name="phn" pattern="[0-9]+" title="only numbers" placeholder="رقم الهاتف" required=" " >
				 <h6>معلومات الدخول</h6>
					<input type="email" name="emadd" placeholder="البريد الالكتروني" required=" " >
					<input type="password" onkeyup="check();" id="password" name="pass" placeholder="كلمة المرور" required=" " >
					<input type="password" onkeyup="check();" id="confirm_password" name="confirm" placeholder="تأكيد كلمة المرور" required=" " >
					<span id="message"></span></br>
					<input type="checkbox" onclick="myFunction();"> عرض كلمة المرور :
					<input type="submit" name="reg" value="تسجيل">
				</form>
			</div>
	</div>
<!-- //register -->
<?php include("include/test_footer.php"); ?> 
</body>
</html>