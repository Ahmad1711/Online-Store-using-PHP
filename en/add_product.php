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
$result=get_category();
$fid=$_SESSION['family_id'];
$fname=$_SESSION['user_name'];
$sizeerr="";
if(isset($_POST["add"]))
{
	$pname=$_POST["name"];
	$price=$_POST["price"];
	$about=$_POST["about"];
	$cat=$_POST["category"];
	$image=$_FILES["image"]["name"];
	add_product($pname,$cat,$price,$about,$image,$fid);
}
echo '
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="family.php?id='.$fid.'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$fname.'</a></li>
				<li class="active">Add Product</li>
			</ol>
		</div>
	</div>';
echo '
<div class="register">
		<h2>New Product</h2>
		<div class="login-form-grids">
				<form action="" enctype="multipart/form-data" method="post">
				<input type="text" name="name"  pattern="[A-Z _a-z]+" title="only characters" placeholder="Product Name..." required=" " >
				<input type="text" name="price" pattern="[0-9]+" title="only numbers" placeholder="Price" required=" " >
				<textarea name="about" cols="20" rows="5" placeholder="Product Description" required ></textarea>
				<label class="select">Select Category :</label> <select name="category" >';
				
				while($row=mysqli_fetch_array($result))
				{
				echo '
				<option value="'.$row["id"].'">'.$row["name"].'</option>
				';
				}
				echo '</select>
				<label class="select">Select Product Image :</label>
				<input type="file" name="image"  accept=image/*  required=" " >
				<input type="submit" name="add" value="Add Product">
			</form>
		</div>
</div>';
?>
<!-- //footer -->
<?php include("include/test_footer.php"); ?>
<!-- //footer -->	
</body>
</html>