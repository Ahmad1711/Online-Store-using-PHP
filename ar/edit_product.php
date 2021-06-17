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
$pid=$_GET["id"];
$res=get_product($pid);
$row=mysqli_fetch_array($res);
$sizeerr="";
if(isset($_POST["edit"]))
{
	$pname=$_POST["name"];
	$price=$_POST["price"];
	$cat=$_POST["category"];
	$image=$_FILES["image"]["name"];
	edit_product($pid,$pname,$cat,$price,$image);
    $res=get_product($pid);
    $row=mysqli_fetch_array($res);
}
echo '
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="family.php?id='.$fid.'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$fname.'</a></li>
				<li class="active">تعديل منتج</li>
			</ol>
		</div>
	</div>';
echo '
<div class="register" >
		<h2>تعديل منتج</h2>
		<div class="login-form-grids">
				<form action="" enctype="multipart/form-data" method="post">
				<input type="text" name="name" value="'.$row["pname"].'"  pattern="[A-Z _a-zأ-ي]+" title="only characters" placeholder="اسم المنتج" required=" " >
				<input type="text" name="price" value="'.$row["price"].'" pattern="[0-9]+" title="only numbers" placeholder="السعر" required=" " >
				<label class="select">اختر فئة المنتج :</label> <select name="category" >';
				
				while($row=mysqli_fetch_array($result))
				{
				echo '
				<option value="'.$row["id"].'">'.$row["ar_name"].'</option>
				';
				}
				echo '</select>
				<label class="select">اختر صورة المنتج :</label>
				<input type="file" name="image"  accept=image/*  required=" " >
				<input type="submit" name="edit" value="تعديل منتج">
			</form>
		</div>
</div>';
?>
<!-- //footer -->
<?php include("include/test_footer.php"); ?> 
<!-- //footer -->	
</body>
</html>