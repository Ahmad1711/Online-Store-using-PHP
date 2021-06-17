<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>
<body>
<!-- header -->
<div class="agileits_header">
	<div class="container">
		<div class="product_list_header">
			<select id="lang" onchange="language();">
				<option value="ar">Arabic</option>
				<option value="en">English</option>
			</select>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
	<div class="logo_products">
		<div class="container">
			<img src="../images/logo.jpg" alt="" style="width:150px;height:125px;float:right;">
			<div class="w3ls_logo_products_left">
				<h1><a>الأسر المنتجة</a></h1>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<?php
if(isset($_POST["reg"]))
{
$name=$_POST["fn"];
$role=$_POST["role"];
$card_id="";
if(isset($_POST["card_id"]))
{
$card_id=$_POST["card_id"];	
}
$email=$_POST["emadd"];
$pass=$_POST["pass"];
register($name,$role,$card_id,$email,$pass);
}
?>	
<!-- top-brands -->
<div class="top-brands">
	<div class="container">
		<h2>الادارة</h2>
		<div class="grid_3 grid_5">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
						<div class="register">
							<h2>تسجيل</h2>
								<div class="login-form-grids">
									<h6>معلومات حساب</h6>
									<form action="" method="post" autocomplete="off">
										<input type="text" name="fn" pattern="[A-Z _a-zأ-ي]+" title="only characters" placeholder="الاسم" required=" " >
										<label>نوع الوظيفة :</label>
										<select name="role" id="role" onchange="test();" >
											<option value="Admin">مدير</option>
											<option value="Inspector">مراقب</option>
											<option value="Organizer">منظم احداث</option>
										</select></br>
										<span id="card_id"></span>
										<h6>معلومات الدخول</h6>
										<input type="email" name="emadd" placeholder="البريد الالكتروني" required=" " >
										<input type="password" onkeyup="check();" id="password" name="pass" placeholder="كلمة المرور" required=" " >
										<input type="password" onkeyup="check();" id="confirm_password" placeholder="تأكيد كلمة المرور" required=" " >
										<span id="message"></span></br>
										<input type="submit" name="reg" value="تسجيل">
									</form>		
								</div>
						</div>
					</div>
					<!--						-->
					
				</div>
				<!--                             -->
			</div>
	</div>
</div>
</div>
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