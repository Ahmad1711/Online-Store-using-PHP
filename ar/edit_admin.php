<?php
include("include/init.php");
test_admin_session()
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>
<body>
<?php
include("include/test_header.php");
$aid=$_SESSION['admin_id'];
$result=get_admin($aid);
$row=mysqli_fetch_array($result);
if(isset($_POST["edit"]))
{
$fname=$_POST["fn"];
$email=$_POST["emadd"];
$pass=$_POST["pass"];
edit_admin($aid,$fname,$email,$pass);
$result=get_admin($aid);
$row=mysqli_fetch_array($result);
}
echo '
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="control_panel.php?id='.$aid.'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>لوحة التحكم</a></li>
			<li class="active">تعديل الحساب</li>
		</ol>
	</div>
</div>';
echo '
<div class="register">
		<h2>تعديل حساب مدير</h2>
		<div class="login-form-grids">
			<h6>معلومات حساب</h6>
			<form action="" method="post">
		    <input type="text" name="fn" pattern="[A-Z _a-zأ-ي]+" title="only characters" value="'.$row["name"].'" required=" " >
  			<h6>معلومات الدخول</h6>
				<input type="email" name="emadd" value="'.$row["email"].'" required=" " >
				<input type="password" name="pass" value="'.$row["password"].'" required=" " >
				<input type="submit" name="edit" value="تعديل">
			</form>
		</div>
 </div>';
?>
<!-- //top-brands -->
<!-- //footer -->
<?php include("include/test_footer.php"); ?> 	
<!-- //footer --> 
</body>
</html>