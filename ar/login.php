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
if(isset($_POST["log"]))
{
$pass=$_POST["pas"];
if($_POST["role"]=="Admin"){
$email=$_POST["em"];
login_admin($email,$pass);	
}
if($_POST["role"]=="Inspector"){
$card_id=$_POST["card_id"];
login_inspector($card_id,$pass);	
}
}
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
				<li class="active">صفحة الدخول</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
<div class="login">
	<h2>تسجيل دخول</h2>
	<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
	<form action="" method="post" autocomplete="off">
	<select name="role" id="role" onchange="login();">
		<option>نوع الحساب</option>
		<option value="Admin">مدير</option>
		<option value="Inspector">مراقب</option>
	</select><br/>
	<span id="card_id"></span>
	<input type="password" name="pas" placeholder="كلمة المرور" required=" " >
	<input type="submit" name="log" value="دخول">
	</form>
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