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
if(isset($_POST["send"]))
{
	$user=$_POST["user"];
	$account=$_POST["account"];
	$desc=$_POST["desc"];
	$date=$_POST["date"];
	send_problem($user,$account,$desc,$date);
}
echo '
<div class="register">
		<h2>Problem Report</h2>
		<div class="login-form-grids">
				<form action="" enctype="multipart/form-data" method="post">
				<input type="text" name="user" placeholder="User Name" required=" " ><br>
                <select name="account">
                <option value="">Account Type</option>
                <option value="Customer">Customer</option>
                <option value="Family">Family</option>
                </select><br>
                <textarea name="desc" placeholder="write Description about Problem" rows="10" cols="30"></textarea>
				<label>Problem Date :</label>
                <input type="date" name="date" required=" " >
				<input type="submit" name="send" value="Send Report">
			</form>
		</div>
</div>';
?>

<!-- //footer -->
<?php include("include/test_footer.php"); ?>	
<!-- //footer -->
</body>
</html>