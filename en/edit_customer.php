<?php
include("include/init.php");
test_customer_session()
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>
<body>
<?php
include("include/test_header.php");
$cid=$_SESSION['customer_id'];
$cname=$_SESSION['user_name'];
$result=get_customer($cid);
$row=mysqli_fetch_array($result);
if(isset($_POST["edit"]))
{
$fname=$_POST["fn"];
$lname=$_POST["ln"];
$address=$_POST["add"];
$phone=$_POST["phn"];
$email=$_POST["emadd"];
$pass=$_POST["pass"];
edit_customer($cid,$fname,$lname,$address,$phone,$email,$pass);
$result=get_customer($cid);
$row=mysqli_fetch_array($result);
}
echo '
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="customer.php?id='.$cid.'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$cname.'</a></li>
			<li class="active">Edit Account</li>
		</ol>
	</div>
</div>';
echo '
<div class="register">
	<div class="container">
		<h2>Edit Customer Account</h2>
		<div class="login-form-grids">
			<h6>profile information</h6>
			<form action="" method="post">
				<input type="text" name="fn" pattern="[A-Z _a-z]+" title="only characters" value="'.$row["fname"].'" required=" " >
                <input type="text" name="ln" pattern="[A-Z _a-z]+" title="only characters" value="'.$row["lname"].'" required=" " >
				<input type="text" name="add" pattern="[A-Z _a-z0-9]+" value="'.$row["address"].'" required=" " >
				<input type="tel"  name="phn" pattern="[0-9]+" title="only numbers" value="'.$row["phone"].'" required=" " >
			<h6>Login information</h6>
				<input type="email" name="emadd" value="'.$row["email"].'" required=" " >
				<input type="password" name="pass" value="'.$row["password"].'" required=" " >
				<input type="submit" name="edit" value="Edit">
			</form>
		</div>
	</div>
 </div>';
?>
<!-- //footer -->
<?php include("include/test_footer.php"); ?> 
<!-- //footer --> 
</body>
</html>