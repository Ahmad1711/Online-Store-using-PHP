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
$name=$_POST["fn"];
$address=$_POST["add"];
$phone=$_POST["phn"];
$image=$_FILES["image"]["name"];
$email=$_POST["emadd"];
$delivery_city=$_POST["dc"];
$payment_type=$_POST["payment"];
$driver=$_POST["driver"];
$pass=$_POST["pass"];
register_family($name,$address,$image,$email,$phone,$delivery_city,$payment_type,$driver,$pass);
}
?>
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Family Register Page</li>
		</ol>
	</div>
</div>
<div class="register">
		<h2>Family Account</h2>
		<div class="login-form-grids">
			<h5>profile information</h5>
			<form action="" enctype="multipart/form-data" method="post" autocomplete="off" >
				<input type="text" name="fn" pattern="[A-Z _a-z]+" title="only characters" placeholder="Family Name" required=" " >
				<input type="text" name="add" pattern="[A-Z _a-z0-9]+" placeholder="Address" required=" " >
				<input type="tel" name="phn" pattern="[0-9]+" title="only numbers" placeholder="Phone Number" required=" " ><br>
				<select name="dc">
				<option >Delivery City</option>
				<option value="All Cities in Saudia Arabia">All Cities in Saudia Arabia</option>
				<option value="Riyadh">Riyadh</option>
                <option value="Jeddah">Jeddah</option>
                <option value="Medina">Medina</option>
                <option value="Mecca">Mecca</option>
                <option value="Dammam">Dammam</option>
				</select><br>
				<select name="payment">
				<option>Payment Type</option>
				<option value="Cash and Credit">Cash and Credit</option>
				<option value="Cash">Cash</option>
				<option value="Credit">Credit</option>
				</select><br>
				<label>Do you have a delivery representative : </label>
				<input type="radio" name="driver" value="Yes"> Yes
				<input type="radio" name="driver" value="No"> No
				<label class="select">Select Family Image :</label>
				<input type="file" name="image" accept="image/*" required=" ">
			<h6>Login information</h6>
				<input type="email"  name="emadd" placeholder="Email Address" required=" " >
				<input type="password" onkeyup="check();" id="password" name="pass" placeholder="Password" required=" "> 
				<input type="password" onkeyup="check();" id="confirm_password" name="confirm" placeholder="Password Confirmation" required=" " >
				<span id="message"></span></br>
				Show Password : <input type="checkbox" onclick="myFunction();">
				<input type="submit" name="reg" value="Register">
			</form>
		</div>
</div>

<?php include("include/test_footer.php"); ?>
</body>
</html>