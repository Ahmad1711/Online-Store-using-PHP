<?php
include("include/init.php");
test_inspector_session();
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
if(isset($_POST["send"]))
{
	$pname=$_POST["name"];
	$task_id=$_POST["task_id"];
	$desc=$_POST["desc"];
	send_report($pname,$task_id,$desc);
}
echo '
<div class="register">
		<h2>تقرير منتج مخالف</h2>
		<div class="login-form-grids">
        <p><a href="logout.php">خروج</a></p></br>
				<form action="" enctype="multipart/form-data" method="post">
				<input type="text" name="name" pattern="[A-Z _a-zأ-ي]+" placeholder="اسم المنتج" required=" " >
                <input type="text" name="task_id" placeholder="رقم المهمة" pattern="[0-9]+" required=" " ></br>
                <textarea name="desc" placeholder="كتابة تقرير حول المنتج" rows="10" cols="30" required=""></textarea>
				<input type="submit" name="send" value="ارسال التقرير">
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