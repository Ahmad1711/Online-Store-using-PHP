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
			<li><a href="control_panel.php?id='.$aid.'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Control Panel</a></li>
			<li class="active">Edit Account</li>
		</ol>
	</div>
</div>';
echo '
<div class="register">
		<h2>Edit Admin Account</h2>
		<div class="login-form-grids">
			<h6>profile information</h6>
			<form action="" method="post">
		    <input type="text" name="fn" pattern="[A-Z _a-z]+" title="only characters" value="'.$row["name"].'" required=" " >
  			<h6>Login information</h6>
				<input type="email" name="emadd" value="'.$row["email"].'" required=" " >
				<input type="password" name="pass" value="'.$row["password"].'" required=" " >
				<input type="submit" name="edit" value="Edit">
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