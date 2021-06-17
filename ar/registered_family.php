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
			<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
			<li class="active">تسجيل عائلة</li>
		</ol>
	</div>
</div>
<div class="register">
		<h2>حساب عائلة</h2>
		<div class="login-form-grids">
			<h5>معلومات الحساب</h5>
			<form action="" enctype="multipart/form-data" method="post" autocomplete="off" >
				<input type="text" name="fn" pattern="[A-Z _a-z]+" title="only characters" placeholder="اسم العائلة" required=" " >
				<input type="text" name="add" pattern="[A-Z _a-z0-9]+" placeholder="العنوان" required=" " >
				<input type="tel" name="phn" pattern="[0-9]+" title="only numbers" placeholder="رقم الهاتف" required=" " ><br>
				<select name="dc">
				<option >مدينة التوصيل</option>
				<option value="All Cities in Saudia Arabia">جميع المدن في المملكة العربية السعودية</option>
				<option value="Riyadh">الرياض</option>
                <option value="Jeddah">جدة</option>
                <option value="Medina">المدينة</option>
                <option value="Mecca">مكة</option>
                <option value="Dammam">الدمام</option>
				</select><br>
				<select name="payment">
				<option>نوع الدفع</option>
				<option value="Cash and Credit">نقدي وبطاقة</option>
				<option value="Cash">نقدي</option>
				<option value="Credit">بطاقة</option>
				</select><br>
				<label>هل تملك مندوب توصيل :</label>
				<input type="radio" name="driver" value="Yes"> نعم
				<input type="radio" name="driver" value="No"> لا
				<label class="select">اختر صورة للعائلة</label>
				<input type="file" name="image" accept="image/*" required=" ">
			    <h6>معلومات الدخول</h6>
				<input type="email"  name="emadd" placeholder="البريد الالكتروني" required=" " >
				<input type="password" onkeyup="check();" id="password" name="pass" placeholder="كلمة المرور" required=" "> 
				<input type="password" onkeyup="check();" id="confirm_password" name="confirm" placeholder="تأكيد كلمة المرور" required=" " >
				<span id="message"></span></br>
				<input type="checkbox" onclick="myFunction();"> عرض كلمة المرور :
				<input type="submit" name="reg" value="تسجيل">
			</form>
		</div>
</div>

<?php include("include/test_footer.php"); ?>
</body>
</html>