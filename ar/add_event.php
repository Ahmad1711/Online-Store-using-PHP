<?php
include("include/init.php");
test_organizer_session()
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>
<body>
<div class="logo_products">
    <div class="container">
		<img src="../images/logo.jpg" alt="" style="width:150px;height:125px;float:right;">
        <div class="w3ls_logo_products_left">
            <h1><a>الأسر المنتجة</a></h1>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<?php
if(isset($_POST["add"]))
{
	$ename=$_POST["ename"];
	$desc=$_POST["desc"];
	$date=$_POST["date"];
	$image=$_FILES["image"]["name"];
	add_event($ename,$desc,$date,$image);
}
echo '
<div class="register">
		<h2>حدث جديد</h2>
		<div class="login-form-grids">
		<p><a href="logout.php">خروج</a></p></br>
				<form action="" enctype="multipart/form-data" method="post">
				<input type="text" name="ename" placeholder="اسم الحدث" required=" " ></br>
                <textarea name="desc" placeholder="كتابة وصف حول الحدث" rows="10" cols="30"></textarea>
				<label>تاريخ الحدث :</label>
                <input type="date" name="date" required=" " >
				<label class="select">اختر صورة الحدث :</label>
				<input type="file" name="image"  accept="image/*"  required=" " >
				<input type="submit" name="add" value="اضافة حدث">
			</form>
		</div>
</div>';
?>

<!-- //footer -->
<div class="footer">
<div class="footer-copy">
	<div class="container">
		<p>الأسر المنتجة جميع الحقوق محفوظة &copy 2018</p>
	</div>
</div>
</div>	
<!-- //footer -->
</body>
</html>