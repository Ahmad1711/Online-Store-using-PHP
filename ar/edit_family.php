<?php
include("include/init.php");
test_family_session()
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>
<body>
<?php
include("include/test_header.php");
$fid=$_SESSION['family_id'];
$fname=$_SESSION['user_name'];
$result=get_family($fid);
$row=mysqli_fetch_array($result);
if(isset($_POST["edit"]))
{
$name=$_POST["fn"];
$address=$_POST["add"];
$phone=$_POST["phn"];
$email=$_POST["emadd"];
$pass=$_POST["pass"];
edit_family($fid,$name,$address,$email,$phone,$pass);
$result=get_family($fid);
$row=mysqli_fetch_array($result);
}
echo '
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="family.php?id='.$fid.'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$fname.'</a></li>
			<li class="active">تعديل حساب</li>
		</ol>
	</div>
</div>';
echo '
<div class="register">
		<h2>تعديل حساب عائلة</h2>
		<div class="login-form-grids">
			<h6>معلومات الحساب</h6>
			<form action="" method="post">
				<input type="text" name="fn" pattern="[A-Z _a-zأ-ي]+" title="only characters" value="'.$row["name"].'" required=" " >
				<input type="text" name="add" pattern="[A-Z _a-z0-9أ-ي]+" value="'.$row["address"].'" required=" " >
				<input type="tel"  name="phn" pattern="[0-9]+" title="only numbers" value="'.$row["phone"].'" required=" " >
			<h6>معلومات الدخول</h6>
				<input type="email" name="emadd" value="'.$row["email"].'" required=" " >
				<input type="password" name="pass" value="'.$row["password"].'" required=" " >
				<input type="submit" name="edit" value="تعديل">
			</form>
		</div>
 </div>';
?>
<!-- //footer -->
<?php include("include/test_footer.php"); ?> 
<!-- //footer -->
</body>
</html>